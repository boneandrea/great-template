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

	public function testLoginGET(): void
	{
		$this->logout();
		$this->get('/admin/login');
		$this->assertResponseOk();
	}

	public function testLoginGETWhenLoggedOut(): void
	{
		$this->markTestSkipped();
		$this->logout();
		$this->get('/admin/login');
		$this->assertResponseOk();
	}

	public function testLoginPOST(): void
	{
		$this->markTestSkipped();
		$this->logout();
		$this->post('/admin/login', [
			'username' => 'admin1',
			'password' => '30accfa95a6e426481d62d4b9e2699c5',
		]);
		$this->assertRedirect();
	}

	public function testAdminDashboard(): void
	{
		$this->markTestSkipped();
		$this->get('/admin/dashboard');
		$this->assertResponseOk();
		$this->assertResponseContains('管理画面');
	}

	public function testLoginGETByUser(): void
	{
		$this->UserLogin();
		$this->get('/admin/login');
		$this->assertRedirect();
	}

	public function testLoginPOSTByUser(): void
	{
		$this->UserLogin();
		$this->post('/admin/login', [
			'username' => 'admin1',
			'password' => '30accfa95a6e426481d62d4b9e2699c5',
		]);
		$this->assertRedirect();
	}

	public function testNotAccesibleDashboardByUser(): void
	{
		$this->UserLogin();
		$this->get('/admin/dashboard');
		$this->assertRedirect();
	}

	public function testIndex(): void
	{
		$this->get('/admin/admin-users');
		$this->assertResponseOk();
		$this->assertCount(1, $this->viewVariable('users'));
		$this->assertSame('admin', $this->viewVariable('users')->first()->role);
	}
}
