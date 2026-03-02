<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('role_name', 'Administrator')->first();

        User::create([
            'name' => 'Admin SOPS',
            'email' => 'admin@sops.go.id',
            'password' => Hash::make('admin123'),
            'role_id' => $adminRole ? $adminRole->id : null,
            'status' => true,
        ]);
    }
}
