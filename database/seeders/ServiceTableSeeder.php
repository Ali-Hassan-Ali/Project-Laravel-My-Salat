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
         $services = ['فريق تنظيم','فريق تصوير','فريق تأمين'];

        foreach ($services as $key => $service) {

            \App\Models\Service::create([
                'name'                  => $service,
                'price'                 => '200',
                'owner_id'              => 1,
                'service_categorie_id'  => 1,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
