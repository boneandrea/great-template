<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    public $records = [
            [
                'id' => '1c970c32-ce77-44fc-8b86-8ecfc10733f3',
                'username' => 'admin1',
                'email' => 'admin1@example.com',
                'password' => '$2y$10$vUUEsWJBZL7YK1J7TR1NA.cWmg1iYe98yUcgUWfcPug/rOwt7aAum',
                'first_name' => null,
                'last_name' => null,
                'token' => null,
                'token_expires' => null,
                'api_token' => null,
                'activation_date' => null,
                'secret' => null,
                'secret_verified' => null,
                'tos_date' => null,
                'active' => true,
                'is_superuser' => false,
                'role' => 'admin',
                'created' => '2022-10-15 03:35:34',
                'modified' => '2022-10-18 15:23:22',
                'additional_data' => null,
                'last_login' => '2022-10-18 15:21:30',
            ],
            [
                'id' => '241a9807-7281-4438-a945-c20478b6919f',
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => '$2y$10$TmTLWvAwyol1VxMhAnbnoOyJGKMEdupsO21aLR/LmqddyHUb7sQ1e',
                'first_name' => null,
                'last_name' => null,
                'token' => null,
                'token_expires' => null,
                'api_token' => null,
                'activation_date' => null,
                'secret' => null,
                'secret_verified' => null,
                'tos_date' => null,
                'active' => true,
                'is_superuser' => false,
                'role' => 'user',
                'created' => '2022-10-15 03:35:34',
                'modified' => '2022-10-18 15:24:47',
                'additional_data' => null,
                'last_login' => '2022-10-18 14:43:46',
            ],
            [
                'id' => 'e16f22c0-cfd2-45ba-9ce3-40fa657b4383',
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => '$2y$10$p7kAwkhz203EpJP5plSBgeenzn2QXg.0R9cX.5KRZicsyKQDi/np.',
                'first_name' => null,
                'last_name' => null,
                'token' => null,
                'token_expires' => null,
                'api_token' => null,
                'activation_date' => null,
                'secret' => null,
                'secret_verified' => null,
                'tos_date' => null,
                'active' => true,
                'is_superuser' => true,
                'role' => 'superuser',
                'created' => '2022-10-15 03:35:34',
                'modified' => '2022-10-18 15:23:46',
                'additional_data' => null,
                'last_login' => null,
            ],
    ];
}
