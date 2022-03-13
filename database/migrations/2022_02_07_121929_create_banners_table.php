<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('owner name');
            $table->string('map')->default('owner map');
            $table->string('cost')->default('500');
            $table->string('latitude')->default('15.508457');
            $table->string('longitude')->default('32.522854');
            $table->string('online')->default(true);
            $table->string('description')->default('description');
            $table->string('slug')->nullable('owner_name');
            $table->string('image')->default('banner_images/default.png');
            $table->foreignId('categoreys_id')->constrained()->onDelete('cascade');
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('banners');
    }
}
