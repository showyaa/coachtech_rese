<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'manager',
            'email' => 'manager@test',
            'password' => bcrypt('password'),
            'role' => 1,
        ];
        User::create($param);
        $param = [
            'name' => 'test1',
            'email' => 'test1@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test2',
            'email' => 'test2@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test3',
            'email' => 'test3@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test4',
            'email' => 'test4@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test5',
            'email' => 'test5@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test6',
            'email' => 'test6@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test7',
            'email' => 'test7@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);

        $param = [
            'name' => 'test8',
            'email' => 'test8@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test9',
            'email' => 'test9@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test10',
            'email' => 'test10@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test11',
            'email' => 'test11@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test12',
            'email' => 'test12@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test13',
            'email' => 'test13@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test14',
            'email' => 'test14@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test15',
            'email' => 'test15@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test16',
            'email' => 'test16@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test17',
            'email' => 'test17@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test18',
            'email' => 'test18@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test19',
            'email' => 'test19@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
        $param = [
            'name' => 'test20',
            'email' => 'test20@test',
            'password' => bcrypt('password'),
            'role' => 3,
        ];
        User::create($param);
    }
}
