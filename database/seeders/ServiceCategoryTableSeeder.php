<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoreys = ['فريق تنظيم','فريق تصوير','فريق تنظيم','المدخل','الكوشة','الصحون'];

        foreach ($categoreys as $index => $categorey) {

            \App\Models\ServiceCategory::create([
                'name'          => $categorey,
                'categoreys_id' => 1,
                'allow_quantity'=> $categorey == 'الصحون' ? true : false,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
