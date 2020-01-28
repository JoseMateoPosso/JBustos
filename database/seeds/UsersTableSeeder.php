<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'nick'      => 'admin',
            'name'      => 'admin',
            'email'     => 'jbustosadmin@gmail.com',
            'password'  => '$2y$10$VvGO6YJLMXIcra.f9NbajORLcZ7iTA84AfPeQtm5etbO137q6d/16', //admin123
        ]);
    }
}
