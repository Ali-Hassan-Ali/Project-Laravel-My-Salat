<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interiors = ['interior 1','interior 2','interior 3','interior 4'];

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'banner_id' => 1,
            ]);            
            
        }//end of foreach

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'banner_id' => 2,
            ]);            
            
        }//end of foreach

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'banner_id' => 3,
            ]);            
            
        }//end of foreach

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'banner_id' => 4,
            ]);            
            
        }//end of foreach

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'banner_id' => 5,
            ]);            
            
        }//end of foreach

        foreach ($interiors as $interior) {

            \App\Models\Gallery::create([
                'title'     => $interior,
                'banner_id' => 6,
            ]);            
            
        }//end of foreach
    }
}
