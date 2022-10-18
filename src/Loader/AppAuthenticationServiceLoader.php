<?php

namespace App\Loader;

use Authentication\Identifier\IdentifierInterface;
use Cake\Core\Configure;
use Cake\Routing\Router;
use CakeDC\Auth\Authentication\AuthenticationService;
use CakeDC\Users\Loader\AuthenticationServiceLoader;
use Psr\Http\Message\ServerRequestInterface;

class AppAuthenticationServiceLoader extends AuthenticationServiceLoader
{
	public function __invoke(ServerRequestInterface $request)
	{
		$controller = $request->getParam('controller');

		if ($controller === 'Users') {
			// 一般ユーザはこれだけ
			// CakeDCのフル機能
			$service = new AuthenticationService([
				'unauthenticatedRedirect' => Router::url('/login'),
			]);

			// Load identifiers, ensure we check email and password fields
			$service->loadIdentifier('Authentication.Password', [
				'resolver' => [
					'className' => 'Authentication.Orm',
					'userModel' => 'Users',
				],
				'fields' => [
					'username' => 'email',
					'password' => 'password',
				],
			]);

			$service->loadAuthenticator('Authentication.Session', [
				'sessionKey' => 'Auth',
			]);

			// Configure form data check to pick email and password
			$service->loadAuthenticator('Authentication.Form', [
				'fields' => [
					IdentifierInterface::CREDENTIAL_USERNAME => 'email',
					IdentifierInterface::CREDENTIAL_PASSWORD => 'password',
				],
				'loginUrl' => Router::url('/login'),
			]);

			return $service;
		}

		$service = new AuthenticationService([
			'unauthenticatedRedirect' => Router::url('/admin/login'),
		]);

		// Load identifiers, ensure we check email and password fields
		$service->loadIdentifier('Authentication.Password', [
			'resolver' => [
				'className' => 'Authentication.Orm',
				'userModel' => 'Users',
			],
			'fields' => [
				'username' => 'email',
				'password' => 'password',
			],
		]);

		$service->loadAuthenticator('Authentication.Session', [
			'sessionKey' => 'AdminUser',
		]);

		// Configure form data check to pick email and password
		$service->loadAuthenticator('Authentication.Form', [
			'fields' => [
				IdentifierInterface::CREDENTIAL_USERNAME => 'email',
				IdentifierInterface::CREDENTIAL_PASSWORD => 'password',
			],
			'loginUrl' => Router::url('/admin/login'),
		]);

		return $service;
	}
}
