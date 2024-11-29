<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Subdivision',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        Role::insert($roles);
    }
}
