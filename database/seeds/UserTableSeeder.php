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
        User::create(
                [
                    'name' => 'Diego Agudo',
                    'email' => 'agudoalvaro1@hotmail.com',
                    'password' => Hash::make('password')
                ]
        );
            
    
    }
}
