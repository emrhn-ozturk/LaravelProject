<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        
        $adminRole = Role::create(['name' => 'admin', 'description' => 'Sistem Yöneticisi']);
        $userRole = Role::create(['name' => 'user', 'description' => 'Standart Kullanıcı']);

        
        $adminUser = User::create([
            'name' => 'Emirhan',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'), 
        ]);

        
        $adminUser->roles()->attach($adminRole->id);
    }
}