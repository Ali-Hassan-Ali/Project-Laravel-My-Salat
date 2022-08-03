<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $payments = ['بنك الخرطوم','بنك امدرمان الوطني','','بنك الخليج','بنك النليلين','بنك الثواب'];
        $payments = ['Bank of Khartoum | بنك الخرطوم', 'Omdurman National Bank | بنك امدرمان الوطني', 'Gulf Bank | بنك الخليج', 'Nilelain Bank | بنك النليلين', 'Thawab Bank | بنك الثواب'];

        foreach ($payments as $index => $payment) {

            \App\Models\PaymentAdmin::create([
                'name' => $payment,
            ]);
            
        }//end of foreach

    }//end of run

}//end of seeder
