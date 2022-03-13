<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_clients', function (Blueprint $table) {
            $table->id();
            $table->string('number_acount');
            $table->string('name_acount');
            $table->string('cost')->default('100');
            $table->string('note')->default('note');
            $table->foreignId('banner_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_admins_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('payment_clients');
    }
}
