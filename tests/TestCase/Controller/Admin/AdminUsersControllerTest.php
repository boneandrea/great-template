<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;

use App\Test\TestCase\Controller\CommonTrait;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\AminUsersController Test Case.
 *
 * @uses \App\Controller\Admin\AdminUsersController
 */
class AdminUsersControllerTest extends TestCase
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
		$this->AdminLogin();
	}

	public function testLoginGETjj(): void
	{
		$this->get('/admin/login');
		$this->assertRedirectContains('/admin/login');
	}

	public function testLoginGETWhenLoggedOutjj(): void
	{
		$this->logout();
		$this->get('/admin/login');
		$this->assertResponseOk();
	}

	public function testLoginPOSTjj(): void
	{
		$this->logout();
		$this->post('/admin/login', [
			'username' => 'admin1',
			'password' => '30accfa95a6e426481d62d4b9e2699c5',
		]);
		$this->assertRedirectContains('/admin/home');
	}

	public function testAdminHome(): void
	{
		$this->get('/admin/home');
		$this->assertResponseOk();
		$this->assertResponseContains('管理画面');
	}

	public function testLoginGETByUserjj(): void
	{
		$this->UserLogin();
		$this->get('/admin/login');
		$this->assertRedirect();
	}

	public function testLoginPOSTByUserjj(): void
	{
		$this->UserLogin();
		$this->post('/admin/login', [
			'username' => 'admin1',
			'password' => '30accfa95a6e426481d62d4b9e2699c5',
		]);
		$this->assertRedirect();
	}

	public function testAdminHomeByUser(): void
	{
		$this->UserLogin();
		$this->get('/admin/home');
		$this->assertRedirect();
	}
}
