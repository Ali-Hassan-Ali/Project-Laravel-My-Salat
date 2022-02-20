<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(CategoreyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(OwnerTableSeeder::class);
        $this->call(ServiceCategoryTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        
    }//end of run

}//end of seede
