// src/Controller/RegistrationController.php

namespace App\Controller;

use App\Controller\AppController;

class RegistrationController extends AppController
{
public function initialize(): void
{
parent::initialize();
$this->loadComponent('Flash');
$this->loadModel('Users'); // Load the Users model to manage user data
}

public function register()
{
$user = $this->Users->newEmptyEntity();

if ($this->request->is('post')) {
$user = $this->Users->patchEntity($user, $this->request->getData());

if ($this->Users->save($user)) {
$this->Flash->success(__('Registration successful.'));
return $this->redirect(['controller' => 'Users', 'action' => 'login']);
}
$this->Flash->error(__('Registration failed. Please try again.'));
}

$this->set(compact('user'));
}
}