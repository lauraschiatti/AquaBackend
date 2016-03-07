<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\User::create([
            'name'     => 'Admin',
            'email'    => 'admin@hotmail.com',
            'password' => bcrypt('123456'),
            'role' => 'superadmin',
            'timezone' => 'America/Bogota'
       ]);
    }
}
