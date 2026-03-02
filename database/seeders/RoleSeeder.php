<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'role_name' => 'Administrator',
                'role_description' => 'Akses penuh ke seluruh sistem operasional.',
                'role_status' => true,
            ],
            [
                'role_name' => 'Staff Operasi',
                'role_description' => 'Mengelola alur pelayaran dan dermaga.',
                'role_status' => true,
            ],
            [
                'role_name' => 'Komandan KRI',
                'role_description' => 'Melihat jadwal sandar dan alur pelayaran.',
                'role_status' => true,
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
