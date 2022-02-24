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
        \App\Models\User::create([
            'username'      => 'username',
            'region'        => 'region',
            'phone'         => '123123123',
            'password'      => bcrypt('123123123'),
        ]);

    }//end of run

}//end of seeder
