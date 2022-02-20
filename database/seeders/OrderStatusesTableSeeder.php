<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['completed','waiting','Cancel'];

        foreach ($status as $statu) {

            \App\Models\OrderStatus::create([
                'name'          => $statu,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder