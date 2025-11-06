<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create or get the admin user (idempotent)
        $admin = \App\Models\Admin::firstOrCreate(
            ['email' => 'super_admin@app.com'],
            [
                'name' => 'admin',
                'phone' => '123123123',
                'password' => bcrypt('123123123'),
            ]
        );

        // Ensure the roles exist
        $adminRole = \App\Models\Role::firstOrCreate(['name' => 'admin']);
        $userRole = \App\Models\Role::firstOrCreate(['name' => 'user']);

        // Attach roles to admin without duplicating
        $admin->roles()->syncWithoutDetaching([$adminRole->id, $userRole->id]);
    }// end of run

}// end of class
