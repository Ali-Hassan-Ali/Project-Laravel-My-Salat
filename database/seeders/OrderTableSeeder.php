<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Order::create([
            'name'              => 'name 1',
            'deprecation'       => 'deprecation 1',
            'packages_id'       => 1,
            'bookings_id'       => 1,
            'owners_id'         => 1,
            'users_id'          => 1,
            'order_statuses_id' => 1,
        ]);

        \App\Models\Order::create([
            'name'              => 'name 2',
            'deprecation'       => 'deprecation 2',
            'packages_id'       => 1,
            'bookings_id'       => 1,
            'owners_id'         => 1,
            'users_id'          => 1,
            'order_statuses_id' => 1,
        ]);

        \App\Models\Order::create([
            'name'              => 'name 3',
            'deprecation'       => 'deprecation 3',
            'packages_id'       => 1,
            'bookings_id'       => 1,
            'owners_id'         => 1,
            'users_id'          => 1,
            'order_statuses_id' => 1,
        ]);

    }//end of run

}//end of class
