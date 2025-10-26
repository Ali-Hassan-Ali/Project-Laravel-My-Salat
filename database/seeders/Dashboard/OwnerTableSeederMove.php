<?php

namespace Database\Seeders\Dashboard;

use Illuminate\Database\Seeder;

class OwnerTableSeederMove extends Seeder
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

        $banner = $owner->banner()->create(['categoreys_id'=>1]);

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
                'banner_id' => $banner->id,
                'form'      => now()->toTimeString(),
                'to'        => now()->toTimeString(),
            ]);            
            
        }//end of foreach

        ////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////// category 1 ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////

        $owners = ['صالة الأحلام للمناسبات','صالة الذهبية','صالة ماجستك','صالة الوداد','صالة ليلة العمر'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => $owner,
                'status'   => 1,
                'phone'    => '+2491149296'.$index,
                'email'    =>  rand(1111,9999).'@gmail.com',
                'password' => bcrypt('123123123'),
            ]);

            $onner = $new_owner->banner()->create(['categoreys_id'=>1, 'image' => "site_assets/saluhs/$index"]);

            $interiors = ['interior 1','interior 2','interior 3','interior 4'];

            foreach ($interiors as $interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $new_owner->id,
                ]);            
                
            }//end of foreach

            $packages = ['فطور','غداء','عشاء',' 😅سحور',' 😅فطور بلدي'];

            foreach ($packages as $package) {

                \App\Models\Package::create([
                    'name'      => $package,
                    'banner_id' => $new_owner->id,
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

            $banner = $new_owner->banner()->create(['categoreys_id'=>2]);

            $interiors = ['interior 1','interior 2','interior 3','interior 4'];

            foreach ($interiors as $key=>$interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $banner->id,
                ]);            
                
            }//end of foreach

            $packages = ['فطور','غداء','عشاء',' 😅سحور',' 😅فطور بلدي'];

            foreach ($packages as $package) {

                \App\Models\Package::create([
                    'name'      => $package,
                    'form'      => now()->toTimeString(),
                    'to'        => now()->toTimeString(),
                    'banner_id' => $banner->id,
                ]);            
                
            }//end of foreach
            
        }//end of foreach

        ###################################################################3

    }//end of run
    
}//end of class