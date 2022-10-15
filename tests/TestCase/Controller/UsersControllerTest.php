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
        $this->get("/");
        $this->assertResponseOk();
    }

    public function testOpenPageWhenLoggedOut(): void
    {
        $this->logout();
        $this->get("/");
        $this->assertResponseOk();
    }

    public function testLoginGET(): void
    {
        $this->get("/");
        $this->assertResponseOk();
    }

    public function testLoginPOST(): void
    {
        $this->logout();
        $this->post("/login",[
            "username"=>"user1",
            "password"=>"e485722ca8064d5b83cb7882bdcb144d",
        ]);
        $this->assertRedirectContains("/mypage");
    }

    public function testMypage(): void
    {
        $this->get("/mypage");
        $this->assertResponseOk();
    }
}
