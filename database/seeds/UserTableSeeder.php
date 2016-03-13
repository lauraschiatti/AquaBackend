<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@hotmail.com',
            'password' => bcrypt('123456'),
            'role' => 'superadmin',
            'timezone' => 'America/Bogota'
        ]);
    }
}
