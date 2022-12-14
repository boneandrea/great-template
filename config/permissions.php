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
				'linkSocial',
				// U2F actions
				'u2f',
				'u2fRegister',
				'u2fRegisterFinish',
				'u2fAuthenticate',
				'u2fAuthenticateFinish',
				'webauthn2fa',
				'webauthn2faRegister',
				'webauthn2faRegisterOptions',
				'webauthn2faAuthenticate',
				'webauthn2faAuthenticateOptions',
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
			'action' => 'display',
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
