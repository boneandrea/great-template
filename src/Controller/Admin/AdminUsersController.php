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
}
