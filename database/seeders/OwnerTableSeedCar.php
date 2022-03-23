<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OwnerTableSeedCar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners = ['wedding car 1','wedding car 2','wedding car 3','wedding car 4','wedding car 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => $owner,
                'status'   => 1,
                'phone'    => '+111111111111',
                'email'    =>  $owner.'@move.com',
                'password' => bcrypt('123123123'),
            ]);

            $onner = $new_owner->banner()->create(['categoreys_id'=>8]);

            $interiors = ['wedding car 1','wedding car 2','wedding car 3','wedding car 4'];

            foreach ($interiors as $interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $new_owner->id,
                ]);            
                
            }//end of foreach

            // $packages = ['العصر','الليل'];

            // foreach ($packages as $package) {

            //     \App\Models\Package::create([
            //         'name'      => $package,
            //         'banner_id' => $new_owner->id,
            //         'form'      => now()->toTimeString(),
            //         'to'        => now()->toTimeString(),
            //     ]);            
                
            // }//end of foreach

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