<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['زواج','تخريج ','مؤتمر','كرنفال','مهرجان'];

        foreach ($names as $name) {

           \App\Models\Booking::create([
                'name'           => $name,
                'categoreys_id'  => '1',
            ]);
        }

    }//end of run
    
}//end of class
