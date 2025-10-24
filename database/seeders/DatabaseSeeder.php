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
        $this->call(LaratrustSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(CategoreyTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PaymentAdminTableSeeder::class);
        $this->call(ServiceCategoryTableSeeder::class);
        $this->call(OwnerTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(PaymentClientTableSeeder::class);

        // $this->call(OwnerTableSeederMove::class);
        // $this->call(OwnerTableSeederHotels::class);
        // $this->call(OwnerTableSeederHotelAppartment::class);
        // $this->call(OwnerTableSeederArtist::class);
        // $this->call(OwnerTableSeedCar::class);
        // $this->call(SuitTableSeeder::class);
        // $this->call(WomenHairdresserTableSeeder::class);
        // $this->call(OwnerTableSeederFarms::class);
        // $this->call(OwnerTableSeedConferenceRooms::class);

        // $this->call(FavoredTableSeeder::class);

    }// end of run

}// end of seede
