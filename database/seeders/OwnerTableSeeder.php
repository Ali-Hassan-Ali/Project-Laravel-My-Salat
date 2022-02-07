<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $admin = \App\Models\Owner::create([
            'name'     => 'Owner',
            'status'   => 1,
            'phone'    => '+249114929635',
            'email'    => 'owner@app.com',
            'password' => bcrypt('123123123'),
        ]);

    }//end of run
    
}//end of class