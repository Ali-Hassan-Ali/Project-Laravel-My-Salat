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
            $table->string('name');
            $table->longText('description');
            $table->dateTime('history')->default(now());
            
            // $table->foreignId('packages_id')->constrained()->onDelete('cascade');
            // $table->foreignId('bookings_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_statuses_id')->constrained()->onDelete('cascade')->default(1);
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
