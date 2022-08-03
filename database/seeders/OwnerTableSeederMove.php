<?php

namespace Database\Seeders;

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
        $owners = ['Moving saluhs 1','Moving saluhs 2','Moving saluhs 3','Moving saluhs 4','Moving saluhs 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => 'الصالات متحركة',
                'status'   => 1,
                'phone'    => '+111111111111',
                'email'    =>  $owner.'@move.com',
                'password' => bcrypt('123123123'),
            ]);

            $banner = $new_owner->banner()->create(['categoreys_id'=>2]);

            $interiors = ['الصالات متحركة 1','الصالات متحركة 2','الصالات متحركة 3','الصالات متحركة 4'];

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

            $namesMove = ['اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة'];

            foreach ($namesMove as $key=>$name) {

               \App\Models\PaymentClient::create([
                    'number_acount'     => '1234567',
                    'name_acount'       => $name,
                    'note'              => 'ملحوظه',
                    'banner_id'         => $banner->id,
                    'payment_admins_id' => $key == 0 ? '1' : $key,
                ]);

            }//end if each
            
        }//end of foreach




        $categorOne = ['صحون فاخره','صحون متوسطه','صحون باسطة'];

        foreach ($categorOne as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 1,
            ]);
            
        }//end of foreach

        $categorTow = ['فريق تصوير كامل','فريق تصوير عادي'];

        foreach ($categorTow as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 2,
            ]);
            
        }//end of foreach

        $categorSexy13 = ['فريق تنظيم','فريق تنظيم'];

        foreach ($categorSexy13 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 3,
            ]);
            
        }//end of foreach

        $categorfor = ['المدخل عادي','المدخل للعروسه'];

        foreach ($categorfor as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 4,
            ]);
            
        }//end of foreach


        $categorfif = ['الكوشة عادي','الكوشة للعروسه'];

        foreach ($categorfif as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 5,
            ]);
            
        }//end of foreach

        $categorSexy1 = ['كراسي عادي','كراسي'];

        foreach ($categorSexy1 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 6,
            ]);
            
        }//end of foreach

        $categorTherr2 = ['مكيفات','مكيفات'];

        foreach ($categorTherr2 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 7,
            ]);
            
        }//end of foreach

        $categorTherr2 = ['مولد كهرباء','مولد كهرباء للمكيفات'];

        foreach ($categorTherr2 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 7,
                'service_categorie_id'  => 8,
            ]);
            
        }//end of foreach

    }//end of run
    
}//end of class