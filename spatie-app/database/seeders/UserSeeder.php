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
            'name' => 'mufeeza',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->givePermissionTo(['access_departments', 'create_departments', 'update_departments', 'add_team', 'update_team', 'assign_lead', 'assign_task', 'create_task', 'update_task', 'accept_or_reject_task', 'add_comments', 'update_users_data', 'delete_user', 'view_team']);

        $user = \App\Models\User::create([
            'name' => 'Business Owner',
            'email' => 'businessowner@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->givePermissionTo(['access_departments', 'create_departments', 'update_departments', 'add_team', 'update_team', 'assign_lead', 'assign_task', 'create_task', 'update_task', 'accept_or_reject_task', 'add_comments', 'update_users_data', 'delete_user', 'view_team', 'view_task']);

        $user = \App\Models\User::create([
            'name' => 'Department Head',
            'email' => 'departmenthead@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->givePermissionTo(['access_departments', 'create_departments', 'update_departments', 'add_team', 'update_team', 'assign_lead', , 'view_task', 'view_team']);

        $user = \App\Models\User::create([
            'name' => 'Team Lead',
            'email' => 'teamlead@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->givePermissionTo(['update_team', 'assign_task', 'create_task', 'update_task', 'accept_or_reject_task', 'add_comments', 'view_task', 'view_team']);

        $user = \App\Models\User::create([
            'name' => 'Team Member',
            'email' => 'teammember@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->givePermissionTo(['add_comments', 'view_task']);


    }

}