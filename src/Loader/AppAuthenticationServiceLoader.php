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
	/**
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 */
	public function __invoke(ServerRequestInterface $request)
	{
		if ($request->getParam('prefix') !== 'Admin') {
			// 一般ユーザ
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

		return $this->createAdminAuthenticator();
	}

	public function createAdminAuthenticator()
	{
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
