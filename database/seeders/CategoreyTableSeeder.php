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
        $categoreys = ['صالات الافراح','صالات متحركة','أختار فنانك','فنادق','مزارع للحفلات و الرحلات','شركات التخاريخ','رحلات السفاري السياحية','قاعات المؤتمرات','سيارة زفة','بدل','كوفير'];

        foreach ($categoreys as $key => $categorey) {

            \App\Models\Categorey::create([
                'name'  => $categorey,
                'slug'  => str::slug($categorey, '_'),
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
