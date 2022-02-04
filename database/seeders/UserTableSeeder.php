<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::create([
            'name'     => 'admin',
            'phone'    => '123123123',
            'email'    => 'super_admin@app.com',
            'password' => bcrypt('123123123'),
        ]);
    }
}
