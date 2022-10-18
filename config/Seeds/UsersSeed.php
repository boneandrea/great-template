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
                'password' => '$2y$10$vUUEsWJBZL7YK1J7TR1NA.cWmg1iYe98yUcgUWfcPug/rOwt7aAum',
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
                'last_login' => null,
            ],
            [
                'id' => '241a9807-7281-4438-a945-c20478b6919f',
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => '$2y$10$TmTLWvAwyol1VxMhAnbnoOyJGKMEdupsO21aLR/LmqddyHUb7sQ1e',
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
                'last_login' => null,
            ],
            [
                'id' => 'e16f22c0-cfd2-45ba-9ce3-40fa657b4383',
                'username' => 'superadmin',
                'email' => 'superadmin@example.com',
                'password' => '$2y$10$p7kAwkhz203EpJP5plSBgeenzn2QXg.0R9cX.5KRZicsyKQDi/np.',
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
                'last_login' => null,
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
