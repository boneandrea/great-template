<?php

return [
	'CakeDC/Auth.permissions' => [
		// all bypass
		[
			'prefix' => false,
			'plugin' => 'CakeDC/Users',
			'controller' => 'Users',
			'action' => [
				// LoginTrait
				'socialLogin',
				'login',
				'logout',
				'socialEmail',
				'verify',
				// RegisterTrait
				'register',
				'validateEmail',
				// PasswordManagementTrait used in RegisterTrait
				'changePassword',
				'resetPassword',
				'requestResetPassword',
				// UserValidationTrait used in PasswordManagementTrait
				'resendTokenValidation',
			],
			'bypassAuth' => true,
		],
		[
			'role' => '*',
			'prefix' => 'Admin',
			'plugin' => "*",
			'controller' => 'AdminUsers',
			'action' => [
				// PasswordManagementTrait used in RegisterTrait
				'changePassword',
				'resetPassword',
				'requestResetPassword',
			],
			'bypassAuth' => true,
		],
		[
			'prefix' => false,
			'plugin' => 'CakeDC/Users',
			'controller' => 'SocialAccounts',
			'action' => [
				'validateAccount',
				'resendValidation',
			],
			'bypassAuth' => true,
		],
		[
			'role' => '*',
			'prefix' => '*',
			'extension' => '*',
			'plugin' => '*',
			'controller' => 'Pages',
			'action' => '*',
			'bypassAuth' => true,
		],
		// admin role allowed to all the things
		[
			'role' => 'admin',
			'prefix' => '*',
			'extension' => '*',
			'plugin' => '*',
			'controller' => '*',
			'action' => '*',
		],
		// 一般ユーザ
		[
			'role' => 'user',
			'prefix' => '*',
			'extension' => '*',
			'plugin' => '*',
			'controller' => 'Users',
			'action' => ['mypage'],
		],
		// 一般ユーザ
		[
			'role' => '*',
			'prefix' => '*',
			'extension' => '*',
			'plugin' => '*',
			'controller' => 'AdminUsers',
			'action' => ['login'],
			'bypassAuth' => true,
		],
		// specific actions allowed for the all roles in Users plugin
		[
			'role' => '*',
			'plugin' => 'CakeDC/Users',
			'controller' => 'Users',
			'action' => ['profile', 'logout', 'linkSocial', 'callbackLinkSocial'],
		],
		[
			'role' => '*',
			'plugin' => 'CakeDC/Users',
			'controller' => 'Users',
			'action' => 'resetOneTimePasswordAuthenticator',
			'allowed' => function (array $user, $role, Cake\Http\ServerRequest $request) {
				$userId = \Cake\Utility\Hash::get($request->getAttribute('params'), 'pass.0');
				if (!empty($userId) && !empty($user)) {
					return $userId === $user['id'];
				}

				return false;
			},
		],
		// all roles allowed to Pages/display
		[
			'role' => '*',
			'controller' => 'Pages',
			'action' => ['display', 'login', 'privacyPolicy', 'company', 'inquiry'],
		],
		[
			'role' => '*',
			'plugin' => 'DebugKit',
			'controller' => '*',
			'action' => '*',
			'bypassAuth' => true,
		],
	],
];
