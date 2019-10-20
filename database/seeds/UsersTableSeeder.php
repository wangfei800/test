<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create(array(
            'first_name'     => 'Admin',
            'last_name'      => 'Test',
            'email'    => 'admin@test.com',
            'password' => Hash::make('12345'),
        ));
    }

}
