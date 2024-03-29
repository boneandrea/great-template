<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * @see      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 *
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Admin;

use Cake\Controller\Controller;

/**
 * Application Controller.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @see https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Authentication.Authentication', [
			'logoutRedirect' => '/admin/login',
			'loginAction' => '/admin/login',
		]);
		$this->viewBuilder()->setLayout('admin/default');

		$user = $this->Authentication->getIdentity();
		$this->set('user', $user);

		/*
		 * Enable the following component for recommended CakePHP form protection settings.
		 * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
		 */
		// $this->loadComponent('FormProtection');
	}
}
