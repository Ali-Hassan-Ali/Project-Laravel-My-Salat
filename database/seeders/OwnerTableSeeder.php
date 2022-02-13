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
        $owner = \App\Models\Owner::create([
            'name'     => 'Owner',
            'status'   => 1,
            'phone'    => '+249114929635',
            'email'    => 'owner@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $owner->banner()->create(['categoreys_id'=>1]);

        $interiors = ['interior 1','interior 2','interior 3','interior 4'];

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'owner_id'  => $owner->id,
            ]);            
            
        }//end of foreach

        $packages = ['فطور','غداء','عشاء',' 😅سحور',' 😅فطور بلدي'];

        foreach ($packages as $package) {

            \App\Models\Package::create([
                'name'      => $package,
                'owner_id'  => $owner->id,
                'form'      => now()->toTimeString(),
                'to'        => now()->toTimeString(),
            ]);            
            
        }//end of foreach

    }//end of run
    
}//end of class