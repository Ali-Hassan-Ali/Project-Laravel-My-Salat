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

        $categorSexy1 = ['كراسي عادي','كراسي'];

        foreach ($categorSexy1 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 6,
            ]);
            
        }//end of foreach

        $categorTherr2 = ['مولد كهرباء','مولد كهرباء للمكيفات'];

        foreach ($categorTherr2 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 1,
                'service_categorie_id'  => 8,
            ]);
            
        }//end of foreach

        ////////////////////////////////////////////////////////////////////////////////////////////////////

        $categorOne = ['صحون فاخره','صحون متوسطه','صحون باسطة'];

        foreach ($categorOne as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 1,
            ]);
            
        }//end of foreach


        $categorTow = ['فريق تصوير كامل','فريق تصوير عادي'];

        foreach ($categorTow as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 2,
            ]);
            
        }//end of foreach


        $categorfor = ['المدخل عادي','المدخل للعروسه'];

        foreach ($categorfor as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 4,
            ]);
            
        }//end of foreach


        $categorfif = ['الكوشة عادي','الكوشة للعروسه'];

        foreach ($categorfif as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 5,
            ]);
            
        }//end of foreach

        $categorSexy1 = ['كراسي عادي','كراسي'];

        foreach ($categorSexy1 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 6,
            ]);
            
        }//end of foreach

        $categorTherr22 = ['مكيفات','مكيفات'];

        foreach ($categorTherr2 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 7,
            ]);
            
        }//end of foreach

        $categorTherr2 = ['مولد كهرباء','مولد كهرباء للمكيفات'];

        foreach ($categorTherr2 as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'banner_id'             => 2,
                'service_categorie_id'  => 8,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
