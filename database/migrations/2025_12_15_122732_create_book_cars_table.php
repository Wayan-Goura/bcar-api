<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->integer('passenger');
            $table->date('booking_date');
            $table->integer('rental_duration');
            $table->string('pickup_location');
            $table->string('room_no')->nullable();
            $table->time('pickup_time');
            $table->text('message')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_cars');
    }
};
