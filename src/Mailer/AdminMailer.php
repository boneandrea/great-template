<?php

declare(strict_types=1);

/**
 * Copyright 2010 - 2019, Cake Development Corporation (https://www.cakedc.com).
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2018, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace App\Mailer;

use Cake\Datasource\EntityInterface;
use Cake\Mailer\Message;
use CakeDC\Users\Mailer\UsersMailer;
use CakeDC\Users\Utility\UsersUrl;

class AdminMailer extends UsersMailer
{
	protected function resetPassword(EntityInterface $user)
	{
		$user->setHidden(['password', 'token_expires', 'api_token']);

		$activationUrl = UsersUrl::actionUrl('resetPassword', [
			'_full' => true,
			$user['token'],
		]);

		if ($user->role !== 'user') {
			$activationUrl['prefix'] = 'Admin';
			$activationUrl['plugin'] = false;
			$activationUrl['controller'] = 'AdminUsers';
		}

		$viewVars = [
			'activationUrl' => $activationUrl,
		] + $user->toArray();

		$this
			->setTo($user['email'])
			->setSubject('パスワード再設定')
			->setEmailFormat(Message::MESSAGE_TEXT)
			->setViewVars($viewVars);
		$this
			->viewBuilder()
			->setTemplate($user->role === 'user' ? 'resetPassword' : 'adminResetPassword');
	}

	protected function inquiry(array $mailData)
	{
		$viewVars = $mailData;

		$this
			->setTo($mailData['email'])
			->setSubject('contact')
			->setEmailFormat(Message::MESSAGE_TEXT)
			->setViewVars($viewVars)
			->viewBuilder();
	}
}
