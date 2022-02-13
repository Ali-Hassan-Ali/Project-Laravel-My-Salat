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
        $categoreys = ['فريق تنظيم','فريق تأمين','فريق تصوير','فريق مبرمجين 😉','فريق طقة 😉'];

        foreach ($categoreys as $key => $categorey) {

            \App\Models\ServiceCategory::create([
                'name'      => $categorey,
                'owner_id'  => 1,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
