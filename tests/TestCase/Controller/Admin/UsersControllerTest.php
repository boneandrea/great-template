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
	}

	public function testView(): void
	{
		$id = '241a9807-7281-4438-a945-c20478b6919f';
		$this->get("/admin/users/view/$id");
		$this->assertResponseOk();
	}

	public function testEditPOSTjj(): void
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

	public function testAdd(): void
	{
		$this->markTestIncomplete('Not implemented yet.');
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
