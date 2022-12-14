<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case.
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
	use CommonTrait;
	use IntegrationTestTrait;

	public function getFixtures(): array
	{
		return [
			'app.Users',
		];
	}

	public function mySetUp(): void
	{
		$this->UserLogin();
	}

	public function testOpenPage(): void
	{
		$this->get('/');
		$this->assertResponseOk();
	}

	public function testOpenPageWhenLoggedOut(): void
	{
		$this->logout();
		$this->get('/');
		$this->assertResponseOk();
	}

	public function testLoginGET(): void
	{
		$this->get('/login');
		$this->assertRedirectContains('/mypage');
	}

	public function testLoginGETWhenLoggedOut(): void
	{
		$this->logout();
		$this->get('/login');
		$this->assertResponseOk();
	}

	public function testLoginPOST(): void
	{
		$this->logout();
		$this->post('/login', [
			'email' => 'user1@example.com',
			'password' => '123456',
		]);
		$this->assertRedirectContains('/mypage');
	}

	public function testMypage(): void
	{
		$this->get('/mypage');
		$this->assertResponseOk();
	}
}
