<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => "admin1",
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => "user1",
            'guard_name' => 'web'
        ]);
    }
}
