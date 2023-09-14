<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123456789',
        ]);
        $user->givePermissionTo('admin access');

        $user = \App\Models\User::create([
            'name' => 'Business Owner',
            'email' => 'owner@gmail.com',
            'password' => '123456789',
        ]);
        $user->givePermissionTo('owner access');

        $user = \App\Models\User::create([
            'name' => 'Team Lead',
            'email' => 'lead@gmail.com',
            'password' => '123456789',
        ]);
        $user->givePermissionTo('team lead access');

        $user = \App\Models\User::create([
            'name' => 'Team Member',
            'email' => 'member@gmail.com',
            'password' => '123456789',
        ]);
        $user->givePermissionTo('members access');


    }

}