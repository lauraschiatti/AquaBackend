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
            'name'     => 'Laura Schiatti',
            'email'    => 'lauri_cdd@hotmail.com',
            'password' => bcrypt('1234'),
            'role' => 'superadmin',
       ]);
    }
}
