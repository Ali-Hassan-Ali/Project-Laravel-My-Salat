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
            'name'  => 'الصالات متحركة',
            'slug'  => str::slug('الصالات متحركة', '_'),
            'logo' => 'categorey_images/movedhalls.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'فنادق',
            'slug'  => str::slug('فنادق', '_'),
            'logo' => 'categorey_images/hotels.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'شقق مفروشة',
            'slug'  => str::slug('شقق مفروشة', '_'),
            'logo' => 'categorey_images/graduating.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'أختار فنانك',
            'slug'  => str::slug('أختار فنانك', '_'),
            'logo' => 'categorey_images/singer.png',
        ]);


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
            'name'  => 'زفاف - كوافير',
            'slug'  => str::slug('زفاف - كوافير', '_'),
            'logo' => 'categorey_images/beauty.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'منتجعات ومزارع للحفلات',
            'slug'  => str::slug('منتجعات ومزارع للحفلات','_'),
            'logo' => 'categorey_images/appartments.png',
        ]);

        \App\Models\Categorey::create([
            'name'  => 'قاعات المؤتمرات',
            'slug'  => str::slug('قاعات المؤتمرات', '_'),
            'logo' => 'categorey_images/meeting.png',
        ]);

    }//end of run

}//end of seeder
