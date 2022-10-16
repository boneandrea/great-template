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

		$viewVars = [
			'activationUrl' => UsersUrl::actionUrl('resetPassword', [
				'_full' => true,
				$user['token'],
			]),
		] + $user->toArray();

		$this
			->setTo($user['email'])
			//			->setFrom('info@enrike.tokyo')
			->setSubject('【WFS】パスワード再設定')
			->setEmailFormat(Message::MESSAGE_TEXT)
			->setViewVars($viewVars);
		$this
			->viewBuilder()
			->setTemplate('resetPassword');
	}

	protected function exchangeSpotifyPoint(EntityInterface $user, int $point)
	{
		$viewVars = compact('point');

		$this
			->setTo($user['email'])
			->setFrom('info@enrike.tokyo')
			->setSubject('エンリケポイントの交換が完了しました')
			->setEmailFormat(Message::MESSAGE_TEXT)
			->setViewVars($viewVars);
	}

	protected function validation(EntityInterface $user)
	{
		$viewVars = [
			'activationUrl' => UsersUrl::actionUrl('validateEmail', [
				'_full' => true,
				$user['token'],
			]),
		] + $user->toArray();

		$this
			->setTo($user['email'])
			->setFrom('info@enrike.tokyo')
			->setSubject('[エンリケ]会員仮登録のお知らせ')
			->setEmailFormat(Message::MESSAGE_TEXT)
			->setViewVars($viewVars);
	}
}
