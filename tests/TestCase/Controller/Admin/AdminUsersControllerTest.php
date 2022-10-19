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
		$this->logout();
		$this->get('/admin/login');
		$this->assertResponseOk();
	}

	public function testLoginPOST(): void
	{
		$this->logout();
		$this->post('/admin/login', [
			'email' => 'admin1@example.com',
			'password' => '123456',
		]);
		$this->assertRedirect();
	}

	public function testAdminDashboard(): void
	{
		$this->get('/admin/dashboard');
		$this->assertResponseOk();
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
			'email' => 'admin1@example.com',
			'password' => '123456',
		]);
		$this->assertRedirect();
	}

	public function testNotAccesibleDashboardByUser(): void
	{
		$this->UserLogin();
		$this->get('/Admin/dashboard');
		$this->assertRedirect();
	}

	public function testIndex(): void
	{
		$this->get('/admin/admin-users');
		$this->assertResponseOk();
		$this->assertCount(1, $this->viewVariable('users'));
		$this->assertSame('admin', $this->viewVariable('users')->first()->role);
	}

	public function testEditPOST(): void
	{
		$id = '1c970c32-ce77-44fc-8b86-8ecfc10733f3';
		$this->post("/admin/admin-users/edit/$id", ['first_name' => 'name']);
		$this->assertRedirect();
		$user = $this->fetchTable('Users')->get($id);
		$this->assertSame('name', $user->first_name);
	}

	public function testEditGET(): void
	{
		$id = '1c970c32-ce77-44fc-8b86-8ecfc10733f3';
		$this->get("/admin/admin-users/edit/$id");
		$this->assertResponseOk();
	}

	public function testAddGET(): void
	{
		$this->get('/admin/admin-users/add');
		$this->assertResponseOk();
	}

	public function testAddPOST(): void
	{
		$count = $this->fetchTable('Users')->find()->count();
		$this->post('/admin/admin-users/add', [
			'username' => 'username',
			'email' => 'email@example.com',
			'password' => 'password',
			'role' => 'admin',
			'is_active' => true,
			'is_superuser' => false,
		]);
		$this->assertRedirect();
		$this->assertSame($count + 1, $this->fetchTable('Users')->find()->count());
	}

	public function testDelete(): void
	{
		$count = $this->fetchTable('Users')->find()->count();
		$id = '1c970c32-ce77-44fc-8b86-8ecfc10733f3';
		$this->post("/admin/admin-users/delete/$id");
		$this->assertRedirect();
		$this->assertSame($count - 1, $this->fetchTable('Users')->find()->count());
	}
}
