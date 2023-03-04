<?php

declare(strict_types=1);

/**
 * CakeDC/Users/Controller/Component/LoginComponent のメソッドを利用するためだけのコンポーネント.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use CakeDC\Users\Controller\Component\LoginComponent as DCLoginComponent;

/**
 * CSV component.
 */
class LoginComponent extends DCLoginComponent
{
	public function updateLastLogin($user)
	{
		parent::updateLastLogin($user);
	}
}
