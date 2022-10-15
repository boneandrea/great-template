<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use \App\Test\TestCase\Controller\CommonTrait;

/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use CommonTrait;
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Users',
    ];

	public function mySetUp(): void
	{
		$this->UserLogin();
	}

    public function testHomejj(): void
    {
        $this->get("/mypage");
        $this->assertResponseOk();
    }
}
