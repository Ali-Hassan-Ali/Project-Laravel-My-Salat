<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WomenHairdresserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoreys = ['Dresses 1','hairdresser 2','pedicure 3','wig 4'];

        foreach ($categoreys as $categorey) {

            $categorey_id = \App\Models\ProductCategory::create([
                'name' => $categorey,
            ]);

            $owners = ['Owner Suit 1','Owner Suit 2','Owner Suit 3','Owner Suit 4','Owner Suit 5'];

            foreach ($owners as $owner) {

                $new_owner = \App\Models\Owner::create([
                    'name'     => $owner,
                    'status'   => 1,
                    'phone'    => '+111111111111',
                    'email'    =>  $owner.'@move.com',
                    'password' => bcrypt('123123123'),
                ]);

            }//end of each

            $onner = $new_owner->banner()->create(['categoreys_id' => 10]);

            $products = ['Suit 1','Suit 2','Suit 3','Suit 4','Suit 5'];

            foreach ($products as $data) {

                $product = \App\Models\Product::create([
                    'name'     => $data,
                    'price'    => '240',
                    'image'    => 'dresses_images/default-dresses.png',
                    'tages'    => "[{'id':'1','value':'XL'},{'id':'2','value':'Lg'},{'id':'3','value':'SM'}]",
                    'banner_id'=> $onner->id,
                    'product_categories_id'=> $categorey_id->id,
                ]);
                
            }//end of each

        }//edn fo each

    }//edn fo run

}//end of class
