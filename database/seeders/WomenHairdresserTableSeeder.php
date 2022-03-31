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

        foreach ($categoreys as $key=>$categorey) {

            $categorey_id = \App\Models\ProductCategory::create([
                'name' => $categorey,
                'size' => $key == 1 ? 'small' : 'larg',
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

                $onner = $new_owner->banner()->create(['categoreys_id' => 8]);

                $makeups = ['Makeup 1','Makeup 2','Makeup 3','Makeup 4'];

                foreach ($makeups as $makeup) {

                    \App\Models\Makeup::create([
                        'name'      => $makeup,
                        'price'     => 1,
                        'banner_id' => $onner->id,
                    ]);            
                    
                }//end of foreach makeups
                
                $products = ['Suit 1','Suit 2','Suit 3','Suit 4','Suit 5'];

                foreach ($products as $data) {

                    $product = \App\Models\Product::create([
                        'name'     => $data,
                        'price'    => '240',
                        'image'    => 'dresses_images/default-dresses.png',
                        'banner_id'=> $onner->id,
                        'product_categories_id'=> $categorey_id->id,
                    ]);

                    $tages = ['XXL','LG','EL','LM','XL'];

                    foreach ($tages as $data) {

                         \App\Models\Tage::create([
                            'name'       => $data,
                            'product_id' => $product->id,
                        ]);
                        
                    }//end of each tages
                    
                }//end of each products

            }//end of each owners

        }//edn fo each categoreys

    }//edn fo run

}//end of class
