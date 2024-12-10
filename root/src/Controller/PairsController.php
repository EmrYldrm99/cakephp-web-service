<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pairs Controller
 *
 * @property \App\Model\Table\PairsTable $Pairs
 */
class PairsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Pairs->find()
            ->contain(['Players', 'Users']);
        $pairs = $this->paginate($query);

        $this->set(compact('pairs'));
    }

    /**
     * View method
     *
     * @param string|null $id Pair id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pair = $this->Pairs->get($id, contain: ['Players', 'Users']);
        $this->set(compact('pair'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pair = $this->Pairs->newEmptyEntity();
        if ($this->request->is('post')) {
            $pair = $this->Pairs->patchEntity($pair, $this->request->getData());
            if ($this->Pairs->save($pair)) {
                $this->Flash->success(__('The pair has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pair could not be saved. Please, try again.'));
        }
        $players = $this->Pairs->Players->find('list', limit: 200)->all();
        $users = $this->Pairs->Users->find('list', limit: 200)->all();
        $this->set(compact('pair', 'players', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pair id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pair = $this->Pairs->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pair = $this->Pairs->patchEntity($pair, $this->request->getData());
            if ($this->Pairs->save($pair)) {
                $this->Flash->success(__('The pair has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pair could not be saved. Please, try again.'));
        }
        $players = $this->Pairs->Players->find('list', limit: 200)->all();
        $users = $this->Pairs->Users->find('list', limit: 200)->all();
        $this->set(compact('pair', 'players', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pair id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pair = $this->Pairs->get($id);
        if ($this->Pairs->delete($pair)) {
            $this->Flash->success(__('The pair has been deleted.'));
        } else {
            $this->Flash->error(__('The pair could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
