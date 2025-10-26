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
        $names = ['زواج', 'تخريج', 'مؤتمر', 'كرنفال', 'مهرجان'];

        // Ensure at least one category exists to attach bookings to.
        $category = \App\Models\Categorey::first();
        if (! $category) {
            $category = \App\Models\Categorey::create([
                'name' => 'صالات الافراح',
                'slug' => \Illuminate\Support\Str::slug('صالات الافراح', '_'),
                'logo' => 'categorey_images/halls.png',
            ]);
        }

        foreach ($names as $name) {
            // Use firstOrCreate so the seeder is idempotent and can be re-run safely.
            \App\Models\Booking::firstOrCreate([
                'name' => $name,
                'categoreys_id' => (int) $category->id,
            ]);
        }

    }// end of run

}// end of class
