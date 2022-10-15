<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1c970c32-ce77-44fc-8b86-8ecfc10733f3',
                'username' => 'admin1',
                'email' => 'admin1@example.com',
                'password' => '$2y$10$njbVQ5.3NSqAvqWYdhCBP.KdYoBzWWEdNRUEeCgjzz8La.MBg04VC',
                'first_name' => NULL,
                'last_name' => NULL,
                'token' => NULL,
                'token_expires' => NULL,
                'api_token' => NULL,
                'activation_date' => NULL,
                'secret' => NULL,
                'secret_verified' => NULL,
                'tos_date' => NULL,
                'active' => true,
                'is_superuser' => false,
                'role' => 'admin',
                'created' => '2022-10-15 03:35:34',
                'modified' =>'2022-10-15 03:35:34',
                'additional_data' => NULL,
                'last_login' => NULL,
            ],
            [
                'id' => '241a9807-7281-4438-a945-c20478b6919f',
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => '$2y$10$6.3YjvULvv3Z8g82FvMogugmpgdcEiTXV3O4pEqNaxE1E1wJNh5JC',
                'first_name' => NULL,
                'last_name' => NULL,
                'token' => NULL,
                'token_expires' => NULL,
                'api_token' => NULL,
                'activation_date' => NULL,
                'secret' => NULL,
                'secret_verified' => NULL,
                'tos_date' => NULL,
                'active' => true,
                'is_superuser' => false,
                'role' => 'user',
                'created' => '2022-10-15 03:35:34',
                'modified' =>'2022-10-15 03:35:34',
                'additional_data' => NULL,
                'last_login' => NULL,
            ],
            [
                'id' => 'e16f22c0-cfd2-45ba-9ce3-40fa657b4383',
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => '$2y$10$7qLDO3sU6t9pWYA1lvh13uBSvYsJiVEhX9U17CMYnAtlhHfrGH3wW',
                'first_name' => NULL,
                'last_name' => NULL,
                'token' => NULL,
                'token_expires' => NULL,
                'api_token' => NULL,
                'activation_date' => NULL,
                'secret' => NULL,
                'secret_verified' => NULL,
                'tos_date' => NULL,
                'active' => true,
                'is_superuser' => true,
                'role' => 'superuser',
                'created' => '2022-10-15 03:35:34',
                'modified' =>'2022-10-15 03:35:34',
                'additional_data' => NULL,
                'last_login' => NULL,
            ],
        ];

        $table = $this->table('users');
        $table->truncate();
        $table->insert($data)->save();
    }
}
