<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use CakeDC\Users\Controller\Traits\PasswordManagementTrait;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\ProfileTrait;

/**
 * - 管理者のログイン
 * - CRUD 管理者.
 */
class AdminUsersController extends AppController
{
	use LoginTrait;
	use PasswordManagementTrait;
	use ProfileTrait;

    public function initialize(): void
	{
		parent::initialize();
		$this->Users = $this->fetchTable('Users');
		$this->loadComponent('Login');

		if (in_array($this->getRequest()->getParam('action'), ['login', 'requestResetPassword', 'resetPassword', 'changePassword'])) {
			$this->viewBuilder()->setLayout('admin/login');
		}
	}

	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
		$this->Authentication->addUnauthenticatedActions(['login', 'requestResetPassword', 'resetPassword', 'changePassword']);
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
		$this->viewBuilder()->setLayout('admin/login');
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

			return $this->redirect('/admin/login');
		}
	}

	/**
	 * Add method.
	 *
	 * @return \Cake\Http\Response|void|null redirects on successful add, renders view otherwise
	 */
	public function add()
	{
		$user = $this->Users->newEmptyEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
		$this->render('edit');
	}

	/**
	 * Edit method.
	 *
	 * @param string|null $id user id
	 *
	 * @return \Cake\Http\Response|void|null redirects on successful edit, renders view otherwise
	 *
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
	 */
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				$this->Flash->success(__('The user has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
	}

	/**
	 * Delete method.
	 *
	 * @param string|null $id user id
	 *
	 * @return \Cake\Http\Response|void|null redirects to index
	 *
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
