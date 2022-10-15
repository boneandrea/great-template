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
            'password' => '$2y$10$njbVQ5.3NSqAvqWYdhCBP.KdYoBzWWEdNRUEeCgjzz8La.MBg04VC',
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
            'modified' => '2022-10-15 03:35:34',
            'additional_data' => null,
            'last_login' => '2022-10-15 16:03:34',
        ],
        [
            'id' => '241a9807-7281-4438-a945-c20478b6919f',
            'username' => 'user1',
            'email' => 'user1@example.com',
            'password' => '$2y$10$6.3YjvULvv3Z8g82FvMogugmpgdcEiTXV3O4pEqNaxE1E1wJNh5JC',
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
            'modified' => '2022-10-15 03:35:34',
            'additional_data' => null,
            'last_login' => '2022-10-15 17:48:20',
        ],
        [
            'id' => 'e16f22c0-cfd2-45ba-9ce3-40fa657b4383',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => '$2y$10$7qLDO3sU6t9pWYA1lvh13uBSvYsJiVEhX9U17CMYnAtlhHfrGH3wW',
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
            'modified' => '2022-10-15 03:35:34',
            'additional_data' => null,
            'last_login' => '2022-10-15 16:34:42',
        ],
    ];
}
