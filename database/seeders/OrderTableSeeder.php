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
        $orders = ['العريس الاول', 'العريس الثاني', 'العريس الثالث'];

        foreach ($orders as $order) {

            \App\Models\Order::create([
                'groom_name' => $order,
                'event_data' => now()->toDateString(),
                'event_time' => now()->toTimeString(),
                'event_sort' => 1,
                'primary_key_type' => 1,
                'primary_key_number' => 1,
                'note' => 1,
                'order_statuses_id' => 1,
                'banner_id' => 1,
                'user_id' => 1,
            ]);

        }// end of each

        $orders1 = ['العريس الاول', 'العريس الثاني', 'العريس الثالث', 'العريس الاول', 'العريس الثاني', 'العريس الثالث'];

        foreach ($orders1 as $order) {

            \App\Models\Order::create([
                'groom_name' => $order,
                'event_data' => now()->toDateString(),
                'event_time' => now()->toTimeString(),
                'event_sort' => 1,
                'primary_key_type' => 1,
                'primary_key_number' => 1,
                'note' => 1,
                'order_statuses_id' => 2,
                'banner_id' => 1,
                'user_id' => 1,
            ]);

        }// end of each

        $orders2 = ['العريس الاول', 'العريس الثاني', 'العريس الثالث'];

        foreach ($orders2 as $order) {

            \App\Models\Order::create([
                'groom_name' => $order,
                'event_data' => now()->toDateString(),
                'event_time' => now()->toTimeString(),
                'event_sort' => 1,
                'primary_key_type' => 1,
                'primary_key_number' => 1,
                'note' => 1,
                'order_statuses_id' => 3,
                'banner_id' => 1,
                'user_id' => 1,
            ]);

        }// end of each

    }// end of run

}// end of class
