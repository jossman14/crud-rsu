<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@test.id',
            'password' => bcrypt('123456789')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@test.id',
            'password' => bcrypt('123456789')
        ]);

        $user->assignRole('user');
    }
}
