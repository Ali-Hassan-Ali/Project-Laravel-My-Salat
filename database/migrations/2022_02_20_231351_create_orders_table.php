<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('groom_name');
            $table->string('event_data');
            $table->string('event_time');
            $table->string('event_sort');
            $table->string('primary_key_type');
            $table->string('primary_key_number');
            $table->longText('note')->nullable();
            $table->string('bill')->nullable();
            $table->string('token')->nullable();
            
            $table->string('count_time_car')->default(0);

            $table->string('lat')->default(0);
            $table->string('lng')->default(0);

            $table->string('product_id')->nullable();

            $table->string('count_people')->nullable();
            $table->string('count_time')->nullable();

            $table->string('count_days')->nullable();
            $table->string('size')->nullable();
            
            $table->string('start_time')->nullable();
            $table->string('car_decoration')->nullable();

            $table->string('type_hotel')->nullable();
            $table->string('count_days_hotel')->nullable();
            $table->string('count_people_hotel')->nullable();
            $table->string('start_time_hotel')->nullable();
            
            // $table->foreignId('packages_id')->constrained()->onDelete('cascade');
            // $table->foreignId('bookings_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_statuses_id')->constrained()->onDelete('cascade')->default(2);
            $table->foreignId('banner_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
