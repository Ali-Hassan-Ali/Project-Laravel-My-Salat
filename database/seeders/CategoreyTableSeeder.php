<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoreyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Categorey::create([
            'name'  => 'صالات الافراح',
            'slug'  => str::slug('صالات الافراح', '_'),
            'logo' => 'categorey_images/halls.png',
        ]);


        \App\Models\Categorey::create([
            'name'  => 'صالات متحركة',
            'slug'  => str::slug('صالات متحركة', '_'),
            'logo' => 'categorey_images/movedhalls.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'أختار فنانك',
            'slug'  => str::slug('أختار فنانك', '_'),
            'logo' => 'categorey_images/singer.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'فنادق',
            'slug'  => str::slug('فنادق', '_'),
            'logo' => 'categorey_images/hotels.png',
        ]);
        ///////////////////////////////
        \App\Models\Categorey::create([
            'name'  => 'مزارع للحفلات و الرحلات',
            'slug'  => str::slug('مزارع للحفلات و الرحلات', '_'),
            'logo' => 'categorey_images/appartments.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'شركات التخاريخ',
            'slug'  => str::slug('شركات التخاريخ', '_'),
            'logo' => 'categorey_images/graduating.png',
        ]);
        
        \App\Models\Categorey::create([
            'name'  => 'رحلات السفاري السياحية',
            'slug'  => str::slug('رحلات السفاري السياحية', '_'),
            'logo' => 'categorey_images/garden.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'قاعات المؤتمرات',
            'slug'  => str::slug('قاعات المؤتمرات', '_'),
            'logo' => 'categorey_images/meeting.png',
        ]);
        //////////////////////////////
        \App\Models\Categorey::create([
            'name'  => 'سيارة زفة',
            'slug'  => str::slug('سيارة زفة', '_'),
            'logo' => 'categorey_images/appartments.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'بدل',
            'slug'  => str::slug('بدل', '_'),
            'logo' => 'categorey_images/suit.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'كوفير',
            'slug'  => str::slug('كوفير', '_'),
            'logo' => 'categorey_images/beauty.png',
        ]);

    }//end of run

}//end of seeder
