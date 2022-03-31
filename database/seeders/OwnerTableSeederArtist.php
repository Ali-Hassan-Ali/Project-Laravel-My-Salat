<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerTableSeederArtist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners = ['saluhs Artist 1','saluhs Artist 2','saluhs Artist 3','saluhs Artist 4','saluhs Artist 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => $owner,
                'status'   => 1,
                'phone'    => '+111111111111',
                'email'    =>  $owner.'@move.com',
                'password' => bcrypt('123123123'),
            ]);

            $onner = $new_owner->banner()->create(['categoreys_id'=>5]);

            $interiors = ['interior 1','interior 2','interior 3','interior 4'];

            foreach ($interiors as $interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $onner->id,
                ]);            
                
            }//end of foreach

            $videos = ['video 1','video 2','video 3','video 4'];

            foreach ($videos as $video) {

                \App\Models\Video::create([
                    'title'     => $video,
                    'banner_id' => $onner->id,
                ]);            
                
            }//end of foreach

            $packages = ['العصر','الليل'];

            foreach ($packages as $package) {

                \App\Models\Package::create([
                    'name'      => $package,
                    'banner_id' => $onner->id,
                    'form'      => now()->toTimeString(),
                    'to'        => now()->toTimeString(),
                ]);            
                
            }//end of foreach

            $namesMove = ['اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة'];

            foreach ($namesMove as $key=>$name) {

               \App\Models\PaymentClient::create([
                    'number_acount'     => '1234567',
                    'name_acount'       => $name,
                    'note'              => 'ملحوظه',
                    'banner_id'         => $onner->id,
                    'payment_admins_id' => $key == 0 ? '1' : $key,
                ]);

            }//end if each
            
        }//end of foreach

    }//end of run
    
}//end of class