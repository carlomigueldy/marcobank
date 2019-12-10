<?php

use App\User;
use App\Account;
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
        $user = User::create([
            'name' => 'Jamm Cagalawan',
            'role_id' => 1,
            'email' => 'jamm@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Elon Musk',
            'role_id' => 2,
            'email' => 'elon@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Ada Lovelace',
            'role_id' => 3,
            'email' => 'ada@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Tony Stark',
            'role_id' => 4,
            'email' => 'tony@stark.com',
            'password' => bcrypt('password'),
        ]);

        Account::create([
            'user_id' => $user->id,
            'balance' => 150000.95,
        ]);
    }
}
