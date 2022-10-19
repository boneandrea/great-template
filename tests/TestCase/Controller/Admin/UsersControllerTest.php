<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller\Admin;

use App\Test\TestCase\Controller\CommonTrait;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Admin\UsersController Test Case.
 *
 * @uses \App\Controller\Admin\UsersController
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
		$this->AdminLogin();
	}

	public function testIndex(): void
	{
		$this->get('/admin/users');
		$this->assertResponseOk();
		$this->assertCount(1, $this->viewVariable('users'));
		$this->assertStringContainsString('admin', $this->dom()->filter('.sidebar .info')->eq(0)->text());
	}

	public function testView(): void
	{
		$id = '241a9807-7281-4438-a945-c20478b6919f';
		$this->get("/admin/users/view/$id");
		$this->assertResponseOk();
	}

	public function testEditPOST(): void
	{
		$id = '241a9807-7281-4438-a945-c20478b6919f';
		$this->post("/admin/users/edit/$id", ['first_name' => 'name']);
		$this->assertRedirect();
		$user = $this->fetchTable('Users')->get($id);
		$this->assertSame('name', $user->first_name);
	}

	public function testEditGET(): void
	{
		$id = '241a9807-7281-4438-a945-c20478b6919f';
		$this->get("/admin/users/edit/$id");
		$this->assertResponseOk();
	}

	public function testAddGET(): void
	{
		$this->get('/admin/users/add');
		$this->assertResponseOk();
	}

	public function testAddPOST(): void
	{
		$count = $this->fetchTable('Users')->find()->count();
		$this->post('/admin/users/add', [
			'username' => 'username',
			'email' => 'email@example.com',
			'password' => 'password',
			'role' => 'user',
			'is_active' => true,
			'is_superuser' => false,
		]);
		$this->assertRedirect();
		$this->assertSame($count + 1, $this->fetchTable('Users')->find()->count());
	}

	public function testDelete(): void
	{
		$count = $this->fetchTable('Users')->find()->count();
		$id = '241a9807-7281-4438-a945-c20478b6919f';
		$this->post("/admin/users/delete/$id");
		$this->assertRedirect();
		$this->assertSame($count - 1, $this->fetchTable('Users')->find()->count());
	}
}
