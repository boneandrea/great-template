<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\Core\Configure;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case.
 */
class UsersTableTest extends TestCase
{
	/**
	 * Test subject.
	 *
	 * @var \App\Model\Table\UsersTable
	 */
	protected $Users;

	/**
	 * Fixtures.
	 *
	 * @var array<string>
	 */
	protected $fixtures = [
		'app.Users',
	];

	/**
	 * setUp method.
	 */
	protected function setUp(): void
	{
		parent::setUp();
		$config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
		$this->Users = $this->getTableLocator()->get('Users', $config);
		Configure::load('users', 'default');
	}

	/**
	 * tearDown method.
	 */
	protected function tearDown(): void
	{
		unset($this->Users);

		parent::tearDown();
	}

	/**
	 * Test validationDefault method.
	 *
	 * @uses \App\Model\Table\UsersTable::validationDefault()
	 */
	public function testValidationDefault(): void
	{
		$item = $this->Users->newEntity([
			'username' => 'name',
			'password' => 'pass',
		]);
		$this->assertEmpty($item->getErrors());
	}

	/**
	 * Test buildRules method.
	 *
	 * @uses \App\Model\Table\UsersTable::buildRules()
	 */
	public function testBuildRules(): void
	{
		$item = $this->Users->newEntity([
			'username' => 'SAME NAME',
			'password' => 'pass',
		]);
		$this->Users->save($item);

		$item = $this->Users->newEntity([
			'username' => 'SAME NAME', // Fails due to isUnique()
			'password' => 'pass',
		]);

		$this->Users->save($item);
		$errors = $item->getErrors();

		$this->assertNotEmpty($errors);
		$this->assertCount(1, $errors);
		$this->assertArrayHasKey('username', $errors);
	}
}
