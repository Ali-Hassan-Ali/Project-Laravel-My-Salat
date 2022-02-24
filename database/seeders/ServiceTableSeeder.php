<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorOne = ['صحون فاخره','صحون متوسطه','صحون باسطة'];

        foreach ($categorOne as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 1,
            ]);
            
        }//end of foreach


        $categorTow = ['فريق تصوير كامل','فريق تصوير عادي'];

        foreach ($categorTow as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 2,
            ]);
            
        }//end of foreach

        $categorTherr = ['فريق تنظيم عادي','فريق تنظيم متوسط'];

        foreach ($categorTherr as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 3,
            ]);
            
        }//end of foreach

        $categorfor = ['المدخل عادي','المدخل للعروسه'];

        foreach ($categorfor as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 4,
            ]);
            
        }//end of foreach


        $categorfif = ['الكوشة عادي','الكوشة للعروسه'];

        foreach ($categorfif as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 5,
            ]);
            
        }//end of foreach

        $categorSexy = ['الصحون عادي','الصحون'];

        foreach ($categorSexy as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 6,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
