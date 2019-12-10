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
            'name' => 'Marco Marcilinog',
            'role_id' => 1,
            'email' => 'marco@admin.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Maricnaitskxz',
            'role_id' => 2,
            'email' => 'maric@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Ada Lovelace',
            'role_id' => 3,
            'email' => 'ada@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Bruce Wayne',
            'role_id' => 4,
            'email' => 'bruce@wayne.com',
            'password' => bcrypt('password'),
        ]);

        Account::create([
            'user_id' => $user->id,
            'balance' => 150000.95,
        ]);
    }
}
