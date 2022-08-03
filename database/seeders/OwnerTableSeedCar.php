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
                'name'     => 'صاحب السيارة',
                'status'   => 1,
                'phone'    => '+111111111111',
                'email'    =>  $owner.'@move.com',
                'password' => bcrypt('123123123'),
            ]);

            $onner = $new_owner->banner()->create(['categoreys_id' => 6 ]);

            $interiors = ['صوره سياره 1','صوره سياره 2','صوره سياره 3','صوره سياره 4'];

            foreach ($interiors as $interior) {

                \App\Models\Gallery::create([
                    'title'     => $interior,
                    'banner_id' => $onner->id,
                ]);            
                
            }//end of foreach

            $cars = ['السيارات الزفه الاولي', 'السيارات الزفه الثانيه', 'السيارات الزفه الثالثه', 'السيارات الزفه رقم 4'];

            foreach ($cars as $car) {

                $car_id = \App\Models\Car::create([
                    'name'      => $car,
                    'price'     => '240',
                    'banner_id' => $onner->id,
                ]);          

                $car_images = ['صوره  خاصة سياره 1', 'صوره  خاصة سياره 2', 'صوره  خاصة سياره 3', 'صوره  خاصة سياره 4'];

                foreach ($car_images as $image) {

                    \App\Models\CarImage::create([
                        'car_id'  => $car_id->id,
                    ]);            
                    
                }//end of foreach

                
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