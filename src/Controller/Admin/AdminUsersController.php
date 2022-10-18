<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\ProfileTrait;

/**
 * - 管理者のログイン
 * - CRUD 管理者.
 */
class AdminUsersController extends AppController
{
	use LoginTrait;
	use ProfileTrait;

	public function initialize(): void
	{
		parent::initialize();
		$this->Users = $this->fetchTable('Users');
	}

	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login']);
	}

	public function dashboard()
	{
	}

	public function index()
	{
		$query = $this->Users->findByRole('admin');
		$users = $this->paginate($query);

		$this->set(compact('users'));
	}

	public function login()
	{
		$this->request->allowMethod(['get', 'post']);
		$result = $this->Authentication->getResult();
		// regardless of POST or GET, redirect if user is logged in
		if ($result->isValid()) {
			// redirect after login success
			$redirect = $this->request->getQuery('redirect', [
				'controller' => 'AdminUsers',
				'action' => 'dashboard',
			]);

			return $this->redirect($redirect);
		}
		// display error if user submitted and authentication failed
		if ($this->request->is('post') && !$result->isValid()) {
			$this->Flash->error(__('Invalid username or password'));
		}
	}

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success(__d('cake_d_c/users', 'You\'ve successfully logged out'));

            return $this->redirect("/admin/login");
        }
    }
}
