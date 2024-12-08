<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Utility\Text;


/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 */
class RequestsController extends AppController
{

    private $session;
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->Drivers = TableRegistry::getTableLocator()->get('Drivers');
        //$this->Contact = $this->fetchTable('Contact');
        //$this->loadModel('Drivers');

        $this->session = $this->request->getSession();
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $request = $this->Requests->newEmptyEntity();

        $this->set(compact('request'));
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $request = $this->Requests->get($id, contain: []);

        if ($this->request->is('post')) {
            //debug($this->request->getData());

            $request->administration_comment = $this->request->getData('administration_comment'); // assuming 'comment' is the field name in the form
            $request->driver_id = $this->request->getData('driver_id');

            // Speichern des Request mit dem Kommentar
            if ($this->Requests->save($request)) {
                $this->Flash->success('Der Kommentar wurde erfolgreich gespeichert.');
            } else {
                $this->Flash->error('Es gab ein Problem beim Speichern des Kommentars.');
            }

            // Die Seite aktualisieren
            $drivers = $this->Drivers->find('list', limit: 200)->all();
            $this->set(compact('request', 'drivers'));

            // Statt Redirect: Die gleiche Seite rendern, um den Kommentar anzuzeigen.
            // Keine Umleitung, nur das gleiche View erneut laden.
            return $this->render('/Requests/view');
        }

        $request = $this->Requests->get($id, contain: []);
        $drivers = $this->Drivers->find('list', limit: 200)->all();
        //$this->set(compact('contact', 'users'));
        $this->set(compact('request', 'drivers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $request = $this->Requests->newEmptyEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }

        $requests = $this->Requests->find();
        $this->set(compact('requests'));
    }

    public function entries()
    {
        $requests = $this->Requests->find();
        $drivers = $this->Drivers->find('list', limit: 200)->all();
        //$this->set(compact('contact', 'users'));
        $this->set(compact('requests'));
    }

    public function accept($id = null)
    {
        $this->viewBuilder()->enableAutoLayout(false);
        // Sicherstellen, dass die ID vorhanden ist
        $request = $this->Requests->get($id);

        if ($request->status !== 'pending') {
            $this->Flash->error('Dieser Request kann nicht akzeptiert werden.');
            return $this->redirect(['action' => 'index']);
        }

        // Status ändern
        $request->status = 'accepted';

        if ($this->Requests->save($request)) {
            $this->Flash->success('Der Request wurde erfolgreich akzeptiert.');
        } else {
            $this->Flash->error('Es gab ein Problem beim Akzeptieren des Requests.');
        }

        $requests = $this->Requests->find();
        $this->set(compact('requests'));
        return $this->render('/Requests/elements');
    }

    public function remove($id = null)
    {
        $this->viewBuilder()->enableAutoLayout(false);
        // Sicherstellen, dass die ID vorhanden ist
        $request = $this->Requests->get($id);

        // Löschen des Requests
        if ($this->Requests->delete($request)) {
            $this->Flash->success('Der Request wurde erfolgreich gelöscht.');
        } else {
            $this->Flash->error('Es gab ein Problem beim Löschen des Requests.');
        }

        $requests = $this->Requests->find('all');
        $this->set(compact('requests'));
        return $this->render('/Requests/elements');
    }


    public function personal()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $request = $this->Requests->newEmptyEntity();

        if ($this->request->is('post')) {

            $this->Requests->patchEntity($request, $this->request->getData(), [
                'validate' => 'personal'
            ]);

            if ($request->hasErrors()) {
                debug($request->getErrors());
            } else {
                $this->session->write('PersonalFormData', $this->request->getData());
                return $this->redirect(['action' => 'contact']);
            }
        }

        $this->set(compact('request'));
    }

    public function contact()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $request = $this->Requests->newEmptyEntity();

        if ($this->request->is('post')) {
            $this->Requests->patchEntity($request, $this->request->getData(), [
                'validate' => 'personal'
            ]);

            if ($request->hasErrors()) {
                debug($request->getErrors());
            } else {
                $this->session->write('ContactFormData', $this->request->getData());
                return $this->redirect(['action' => 'summary']);
            }
        }

        $this->set(compact('request'));
    }

    public function sendTestEmail()
    {
        $email = 's.emre.yildirim@outlook.de'; // Empfängeradresse (kann deine eigene sein)

        $mailer = new \App\Mailer\RequestMailer();
        try {
            $mailer->sendTestEmail($email);
            $this->Flash->success('Die Test-E-Mail wurde erfolgreich gesendet.');
        } catch (\Exception $e) {
            $this->Flash->error('Fehler beim Senden der E-Mail: ' . $e->getMessage());
        }

        return $this->redirect(['action' => 'index']);
    }

    public function info($uuid = null)
    {
        // Sicherstellen, dass eine UUID übergeben wurde
        if (!$uuid) {
            $this->Flash->error('Keine gültige UUID angegeben.');
            return $this->redirect(['action' => 'index']);
        }

        // Den Request mit der angegebenen UUID suchen
        $request = $this->Requests->find('all')->where(['uuid' => $uuid])->first();

        // Wenn kein Request mit dieser UUID gefunden wurde
        if (!$request) {
            $this->Flash->error('Kein Request mit dieser UUID gefunden.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('post')) {
            //debug($this->request->getData());

            $request->client_comment = $this->request->getData('client_comment'); // assuming 'comment' is the field name in the form

            // Speichern des Request mit dem Kommentar
            if ($this->Requests->save($request)) {
                $this->Flash->success('Der Kommentar wurde erfolgreich gespeichert.');
            } else {
                $this->Flash->error('Es gab ein Problem beim Speichern des Kommentars.');
            }

            // Die Seite aktualisieren
            $this->set('request', $request);

            // Statt Redirect: Die gleiche Seite rendern, um den Kommentar anzuzeigen.
            // Keine Umleitung, nur das gleiche View erneut laden.
            return $this->render('/Requests/info');
        }

        // Den Request an die View übergeben
        $this->set(compact('request'));
    }

    public function elements()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $requests = $this->Requests->find();
        $this->set(compact('requests'));
    }

    public function summary()
    {

        if ($this->request->is('post')) {
            //debug($this->session->read('PersonalFormData'));
            //debug("post!");
            $personalFormData = $this->session->read('PersonalFormData');
            $contactFormData = $this->session->read('ContactFormData');
            debug($personalFormData);
            debug($contactFormData);

            $requestData = array_merge($personalFormData, $contactFormData);
            $request = $this->Requests->newEmptyEntity();

            // Patchen der zusammengeführten Daten in die Entität
            $request = $this->Requests->patchEntity($request, $requestData);
            $request->uuid = Text::uuid();
            $request->client_comment = "";
            $request->administration_comment = "";

            if ($this->Requests->save($request)) {
                $this->Flash->success('Die Anfrage wurde erfolgreich gespeichert. -> ' . $request->uuid);
                //$this->sendTestEmail();
            } else {
                debug($request->getErrors());
                $this->Flash->error('Es gab ein Problem beim Speichern der Anfrage.');
            }
        }

        $this->set([
            "personal" => $this->session->read("PersonalFormData"),
            "contact" => $this->session->read("ContactFormData")
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $this->set(compact('request'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
