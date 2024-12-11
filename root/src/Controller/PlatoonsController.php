<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Platoons Controller
 *
 * @property \App\Model\Table\PlatoonsTable $Platoons
 */
class PlatoonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Platoons->find();
        $platoons = $this->paginate($query);

        $this->set(compact('platoons'));
    }

    /**
     * View method
     *
     * @param string|null $id Platoon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $platoon = $this->Platoons->get($id, contain: ['Accounts']);
        $this->set(compact('platoon'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $platoon = $this->Platoons->newEmptyEntity();
        if ($this->request->is('post')) {
            $platoon = $this->Platoons->patchEntity($platoon, $this->request->getData());
            if ($this->Platoons->save($platoon)) {
                $this->Flash->success(__('The platoon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The platoon could not be saved. Please, try again.'));
        }
        $this->set(compact('platoon'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Platoon id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $platoon = $this->Platoons->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $platoon = $this->Platoons->patchEntity($platoon, $this->request->getData());
            if ($this->Platoons->save($platoon)) {
                $this->Flash->success(__('The platoon has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The platoon could not be saved. Please, try again.'));
        }
        $this->set(compact('platoon'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Platoon id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $platoon = $this->Platoons->get($id);
        if ($this->Platoons->delete($platoon)) {
            $this->Flash->success(__('The platoon has been deleted.'));
        } else {
            $this->Flash->error(__('The platoon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
