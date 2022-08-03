<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $owners = ['Owner Suit 1','Owner Suit 2','Owner Suit 3','Owner Suit 4','Owner Suit 5'];

        foreach ($owners as $index=>$owner) {

            $new_owner = \App\Models\Owner::create([
                'name'     => 'بدل',
                'status'   => 1,
                'phone'    => '+111111111111',
                'email'    =>  $owner.'@move.com',
                'password' => bcrypt('123123123'),
            ]);

            $onner = $new_owner->banner()->create(['categoreys_id' => 7]);

            $products = ['المنتج 1','المنتج 2','المنتج 3','المنتج 4','المنتج 5'];

            foreach ($products as $data) {

                $product = \App\Models\Product::create([
                    'name'     => $data,
                    'price'    => '240',
                    'banner_id'=> $onner->id,
                ]);

                $tages = ['XXL','LG','EL','LM','XL'];

                foreach ($tages as $data) {

                     \App\Models\Tage::create([
                        'name'       => $data,
                        'product_id' => $product->id,
                    ]);
                    
                }//end of each

                $images = ['black | اسود','red | احمر','green | اخضر','ylou | اصفر','blue | ازرق'];

                foreach ($images as $data) {

                    \App\Models\ProductImage::create([
                        'color'      => $data,
                        'product_id' => $product->id,
                    ]);
                    
                }//end of each
                
            }//end of each

        }//end of each

    }//end of run
    
}//end of class
