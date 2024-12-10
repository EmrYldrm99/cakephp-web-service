<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 */
class AccountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Accounts->find()
            ->contain(['Platoons']);
        $accounts = $this->paginate($query, ['maxLimit' => 5]);

        $this->set(compact('accounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $account = $this->Accounts->get($id, contain: ['Platoons']);
        $this->set(compact('account'));
    }

    public function group()
    {
        if ($this->request->is('post')) {
            debug($this->request->getData());
            $selectedAccountIds = $this->request->getData('account_ids'); // IDs der Spieler
            $platoonName = $this->request->getData('name'); // Clanname

            if (empty($selectedAccountIds) || empty($platoonName)) {
                $this->Flash->error('Bitte wählen Sie Spieler aus und geben Sie einen Clannamen an.');
                return $this->redirect(['action' => 'index']);
            }

            // Neuen Clan erstellen
            $platoon = $this->Accounts->Platoons->newEntity(['name' => $platoonName]);
            if ($this->Accounts->Platoons->save($platoon)) {
                // Spieler updaten, um dem Clan zugeordnet zu werden
                $this->Accounts->updateAll(
                    ['platoon_id' => $platoon->id],
                    ['id IN' => $selectedAccountIds]
                );

                $this->Flash->success('Die Spieler wurden erfolgreich dem neuen Clan zugeordnet.');
            } else {
                $this->Flash->error('Es gab ein Problem beim Erstellen des Clans.');
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $account = $this->Accounts->newEmptyEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $platoons = $this->Accounts->Platoons->find('list', limit: 200)->all();
        $this->set(compact('account', 'platoons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $account = $this->Accounts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $platoons = $this->Accounts->Platoons->find('list', limit: 200)->all();
        $this->set(compact('account', 'platoons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
