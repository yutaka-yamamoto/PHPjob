<?php

use Illuminate\Database\Seeder;
use\App\Message;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'ユーザー１',
                'email' => 'user1@test.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $data2 = [
            [
                'name' => 'ユーザー２',
                'email' => 'user2@test.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $data3 = [
            [
                'name' => 'ユーザー３',
                'email' => 'user3@test.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];




        DB::table('users')->insert($data);
        DB::table('users')->insert($data2);
        DB::table('users')->insert($data3);
    }
}
