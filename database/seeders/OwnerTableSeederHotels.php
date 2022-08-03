<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerTableSeederHotels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $owners = ['Hotels 1','Hotels 2','Hotels 3','Hotels 4','Hotels 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => 'فنادق',
                'status'   => 1,
                'phone'    => '+111111111111',
                'email'    =>  $owner.'@move.com',
                'password' => bcrypt('123123123'),
            ]);

            $onner = $new_owner->banner()->create(['categoreys_id'=>3]);

            $interiors = ['صور فنادق 1','صور فنادق 2','صور فنادق 3','صور فنادق 4'];

            foreach ($interiors as $interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $onner->id,
                ]);            
                
            }//end of foreach

            $packages = ['عرسان','اسره','عزابة','طلاب'];

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