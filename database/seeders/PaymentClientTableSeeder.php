<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة','اسم الحساب صالحب الصالة'];

        foreach ($names as $key=>$name) {

           \App\Models\PaymentClient::create([
                'number_acount'     => '1234567',
                'name_acount'       => $name,
                'note'              => 'ملحوظه',
                'banner_id'         => 1,
                'payment_admins_id' => $key == 0 ? '1' : $key,
            ]);

        }//end if each

    }//end of run
    
}//end of class
