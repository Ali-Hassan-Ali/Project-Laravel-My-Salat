<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FavoredTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = ['1','2','3','4','5'];

        foreach ($banners as $banner) {

            \App\Models\Favored::create([
                'banner_id'    => $banner,
                'user_id'      => 1,
                'categorey_id' => 1,
            ]);

        }//end of each

    }//end of run

}//end of class
