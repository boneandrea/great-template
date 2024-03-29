<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller.
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	public function initialize(): void
	{
		parent::initialize();
		$this->loadComponent('Authentication.Authentication', [
			'logoutRedirect' => '/users/login',  // Default is false
		]);
		$user = $this->Authentication->getIdentity();
		$this->viewBuilder()->setLayout('user');
		$this->set('user', $user);
	}

	public function mypage()
	{
	}

	public function index()
	{
		$users = $this->paginate($this->Users);

		$this->set(compact('users'));
	}

	/**
	 * View method.
	 *
	 * @param string|null $id user id
	 *
	 * @return \Cake\Http\Response|void|null Renders view
	 *
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException when record not found
	 */
	public function view($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => [],
		]);

		$this->set(compact('user'));
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
