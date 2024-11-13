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
    }

    public function index() {}


    public function list()
    {
        //debug($this->request->getQuery('first_name'));
        $players = "players";
        $this->set(compact('players'));
        // Rendern der 'list' View ohne Layout
        $this->viewBuilder()->enableAutoLayout(false);
    }

    public function ok()
    {
        $players = "players";
        $this->set(compact('players'));
        // Rendern der 'list' View ohne Layout
        $this->viewBuilder()->enableAutoLayout(false);
    }

    public function lol()
    {
        //debug($this->request->getQuery('first_name'));
        $players = "players";
        $this->set(compact('players'));
        // Rendern der 'list' View ohne Layout
        $this->viewBuilder()->enableAutoLayout(false);
    }

    public function validate()
    {
        //debug($this->request->getQuery('first_name'));
        //debug($firstName = $this->request->getData());
        if (strcmp($this->request->getData('first_name'), "emr6464")) {
            return $this->redirect(['action' => 'lol']);
        } else return $this->redirect(['action' => 'list']);
    }
}
