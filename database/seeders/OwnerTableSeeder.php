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
            'name' => 'saluhs',
            'status' => 1,
            'phone' => '+249114929635',
            'email' => 'owner@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $banner = $owner->banner()->create(['map' => 'شارع الجامعة', 'name' => 'صالة الغروب', 'categoreys_id' => 1, 'image' => 'site_assets/saluhs/0.png']);

        // $interiors = ['interior 1','interior 2','interior 3','interior 4'];

        // foreach ($interiors as $interior) {

        //     \App\Models\Gallery::create([
        //         'title'     => $interior,
        //         'banner_id' => 1,
        //     ]);

        // }//end of foreach

        $packages = ['فطور', 'غداء', 'عشاء', ' 😅سحور', ' 😅فطور بلدي'];

        foreach ($packages as $package) {

            \App\Models\Package::create([
                'name' => $package,
                'banner_id' => $banner->id,
                'form' => now()->toTimeString(),
                'to' => now()->toTimeString(),
            ]);

        }// end of foreach

        // //////////////////////////////////////////////////////////////////////////////////////////
        // ////////////////////////////////////////// category 1 ////////////////////////////////////
        // //////////////////////////////////////////////////////////////////////////////////////////

        // $owners = ['saluhs 1','saluhs 2','saluhs 3','saluhs 4','saluhs 5'];
        $owners = ['صالة الأحلام للمناسبات', 'صالة الذهبية', 'صالة ماجستك', 'صالة الوداد', 'صالة ليلة العمر'];
        $maps = ['قرب مطار،الخرطوم', 'شارع الإنقاذ، الخرطوم', 'شارع القيادة', 'شارع أفريقيا', 'شارع مامون بحيري'];

        foreach ($owners as $index => $owner) {

            $new_owner = \App\Models\Owner::create([
                'name' => $owner,
                'status' => 1,
                'phone' => '+2491149296'.$index,
                'email' => rand(1111, 9999).'@gmail.com',
                'password' => bcrypt('123123123'),
            ]);

            $banner = $new_owner->banner()->create(['map' => $maps[$index], 'name' => $owner, 'categoreys_id' => 1, 'image' => "site_assets/saluhs/$index.png"]);

            $interiors = [1, 2, 3];

            foreach ($interiors as $indexInteriors => $interior) {

                \App\Models\Gallery::create([
                    'title' => 'صور الصاله',
                    'banner_id' => $banner->id,
                    'image' => "site_assets/saluhs/$index/$index-$interior.png",
                ]);

            }// end of foreach

            $packages = ['فطور', 'غداء', 'عشاء', ' 😅سحور', ' 😅فطور بلدي'];

            foreach ($packages as $package) {

                \App\Models\Package::create([
                    'name' => $package,
                    'banner_id' => $new_owner->id,
                    'form' => now()->toTimeString(),
                    'to' => now()->toTimeString(),
                ]);

            }// end of foreach

        }// end of foreach

    }// end of run

}// end of class
