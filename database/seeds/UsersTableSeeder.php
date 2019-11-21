<?php

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
        \DB::table('users')->insert([
            'name' => 'Vikash Pathak',
            'email' => 'vikashh.pathak@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
