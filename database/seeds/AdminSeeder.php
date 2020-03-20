<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@mail.com',
            'password' => bcrypt('Admin#@123'),
            'role' => 'admin',
            'registration_status' => 1,
        ]);
    }
}
