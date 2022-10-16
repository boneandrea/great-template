<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\ProfileTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;

/**
 * 管理者のログイン周辺.
 */
class AdminUsersController extends AppController
{
	use LoginTrait;
	use ProfileTrait;
	use RegisterTrait;

	public function initialize(): void
	{
		parent::initialize();
		$this->viewBuilder()->setLayout('admin/default');
	}

	public function beforeFilter(\Cake\Event\EventInterface $event)
	{
		parent::beforeFilter($event);
	}

	public function home()
	{
	}
}
