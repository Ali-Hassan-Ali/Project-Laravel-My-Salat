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
            'name'     => 'saluhs',
            'status'   => 1,
            'phone'    => '+249114929635',
            'email'    => 'owner@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $owner->banner()->create(['categoreys_id'=>1]);

        // $interiors = ['interior 1','interior 2','interior 3','interior 4'];

        // foreach ($interiors as $interior) {

        //     \App\Models\Gallery::create([
        //         'title'     => $interior,
        //         'banner_id' => 1,
        //     ]);            
            
        // }//end of foreach

        $packages = ['فطور','غداء','عشاء',' 😅سحور',' 😅فطور بلدي'];

        foreach ($packages as $package) {

            \App\Models\Package::create([
                'name'      => $package,
                'owner_id'  => $owner->id,
                'form'      => now()->toTimeString(),
                'to'        => now()->toTimeString(),
            ]);            
            
        }//end of foreach

        ////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////// category 1 ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////

        $owners = ['saluhs 1','saluhs 2','saluhs 3','saluhs 4','saluhs 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => $owner,
                'status'   => 1,
                'phone'    => '+2491149296'.$index,
                'email'    =>  $owner.'@gmail.com',
                'password' => bcrypt('123123123'),
            ]);

            $new_owner->banner()->create(['categoreys_id'=>1]);

            $interiors = ['interior 1','interior 2','interior 3','interior 4'];

            foreach ($interiors as $interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => 1,
                ]);            
                
            }//end of foreach

            $packages = ['فطور','غداء','عشاء',' 😅سحور',' 😅فطور بلدي'];

            foreach ($packages as $package) {

                \App\Models\Package::create([
                    'name'      => $package,
                    'owner_id'  => $new_owner->id,
                    'form'      => now()->toTimeString(),
                    'to'        => now()->toTimeString(),
                ]);            
                
            }//end of foreach
            
        }//end of foreach


        $owners = ['Moving saluhs 1','Moving saluhs 2','Moving saluhs 3','Moving saluhs 4','Moving saluhs 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => $owner,
                'status'   => 1,
                'phone'    => '+24911492963'.$index,
                'email'    =>  $owner.'@gmail.com',
                'password' => bcrypt('123123123'),
            ]);

            $new_owner->banner()->create(['categoreys_id'=>2]);

            $interiors = ['interior 1','interior 2','interior 3','interior 4'];

            foreach ($interiors as $key=>$interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $key == 0 ? '1' : $key,
                ]);            
                
            }//end of foreach

            $packages = ['فطور','غداء','عشاء',' 😅سحور',' 😅فطور بلدي'];

            foreach ($packages as $package) {

                \App\Models\Package::create([
                    'name'      => $package,
                    'owner_id'  => $new_owner->id,
                    'form'      => now()->toTimeString(),
                    'to'        => now()->toTimeString(),
                ]);            
                
            }//end of foreach
            
        }//end of foreach

    }//end of run
    
}//end of class