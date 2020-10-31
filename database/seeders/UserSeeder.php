<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@test.com',
            'role'=>'user',
            'password' => bcrypt('1234'),
        ]);

        \App\Models\User::create([
            'name' => 'Adm',
            'last_name' => 'Manager',
            'email' => 'admin@admin.com',
            'role'=>'boss',
            'password' => bcrypt('1234'),
        ]);
    }
}
