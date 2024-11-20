<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ModelAwareTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class FormularController extends Controller
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

        $this->session = $this->request->getSession();

        //$this->Users = $this->fetchTable('Users');
        $this->Users = TableRegistry::getTableLocator()->get('Users');
        $this->Contact = $this->fetchTable('Contact');
        $userData = $this->Users->find()
            ->contain(['Contact']) // Includes associated Contact data
            ->enableHydration(false)
            ->toArray();
        //$platoonsTable = TableRegistry::getTableLocator()->get('Users');
        //debug($userData);
        //debug($this->Users->getUsersWithContact());
    }

    public function index() {}

    public function list()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        //$user = $usersTable->newEmptyEntity();
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $user = $usersTable->newEmptyEntity();

        if ($this->request->is('post')) {
            //debug($this->request->getData());
            // Es handelt sich um eine DELETE-Anfrage
            $usersTable->patchEntity($user, $this->request->getData(), [
                'validate' => 'test'
            ]);

            if ($user->hasErrors()) {
                // Fehler behandeln
                //debug($user->getErrors());
                //$this->Flash->error('Es gab ein Problem mit der Eingabe.');
            } else {
                // Keine Fehler, speichere das Entity
                //debug("keine Fehler!");
                $data = $this->request->getData();
                $this->session->write("fname", $data['fname']);
                $this->session->write("lname", $data['lname']);
                return $this->redirect(['action' => 'ok']);
                /*if ($this->Users->save($user)) {
                    $this->Flash->success('Benutzer erfolgreich gespeichert.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('Beim Speichern des Benutzers ist ein Fehler aufgetreten.');
                }*/
            }
            //debug("post request!");
        } else {
            //("get request!");
        }

        //debug($this->request->getQuery('first_name'));
        $this->set([
            'user' => $user,
            'fname' => $this->session->read('fname', ''),
            'lname' => $this->session->read('lname', ''),
        ]);
        // Rendern der 'list' View ohne Layout
    }

    public function ok()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        //$user = $usersTable->newEmptyEntity();
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $user = $usersTable->newEmptyEntity();

        if ($this->request->is('post')) {
            //debug($this->request->getData());
            // Es handelt sich um eine DELETE-Anfrage
            $usersTable->patchEntity($user, $this->request->getData(), [
                'validate' => 'lol'
            ]);

            if ($user->hasErrors()) {
                // Fehler behandeln
                debug($user->getErrors());
                //$this->Flash->error('Es gab ein Problem mit der Eingabe.');
            } else {
                // Keine Fehler, speichere das Entity
                debug("keine Fehler!");
                //return $this->redirect(['action' => 'ok']);
                /*if ($this->Users->save($user)) {
                    $this->Flash->success('Benutzer erfolgreich gespeichert.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('Beim Speichern des Benutzers ist ein Fehler aufgetreten.');
                }*/
            }
            debug("post request!");
        } else {
            ("get request!");
        }

        //debug($this->request->getQuery('first_name'));
        $this->set([
            'user' => $user
        ]);

        $players = "players";
        $this->set(compact('players'));
        // Rendern der 'list' View ohne Layout
        $this->viewBuilder()->enableAutoLayout(false);
    }

    public function lol()
    {
        $page = $this->request->getData('page') ?? $this->request->getQuery('page') ?? 1;

        debug($page);
        $query = $this->Users->find();
        //$users = $this->paginate($query);
        $users = $this->paginate($query, [
            'limit' => 10, // Zeigt 10 Zeilen pro Seite an
            'page' => $page
        ]);

        $this->set(compact('users'));
        //$this->viewBuilder()->enableAutoLayout(false);
        // Rendern der 'list' View ohne Layout
    }

    public function validate()
    {
        //debug($this->request->getQuery('first_name'));
        //debug($firstName = $this->request->getData());
        /*if (strcmp($this->request->getData('first_name'), 'emr6464')  === 0) {
            $this->session->write("test", "lol");
            return $this->redirect(['action' => 'lol']);
        } else {
            $this->session->write("test", "list");
            return $this->redirect(['action' => 'list']);
        }*/

        $this->session->write("fname", $this->request->getData('first_name', 'unknown'));
        $this->session->write("mail", $this->request->getData('email', 'unknown'));

        return $this->redirect(['action' => 'list']);
    }
}
