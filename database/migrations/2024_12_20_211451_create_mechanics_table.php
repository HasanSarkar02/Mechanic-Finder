<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('location'); // Or a specific address column
            $table->string('phone');
            $table->decimal('latitude', 10, 8); // Latitude coordinate
            $table->decimal('longitude', 11, 8); // Longitude coordinate
            $table->decimal('rating', 3, 2)->default(0.00); // Optional rating field
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
        Schema::dropIfExists('mechanics');
    }
}
