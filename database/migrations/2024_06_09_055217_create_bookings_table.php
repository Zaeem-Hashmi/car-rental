<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookingRefNo')->nullable();
            $table->string('pickupUnitNumber')->nullable();
            $table->string('pickupStreetNumber')->nullable();
            $table->string('pickupStreetName')->nullable();
            $table->string('pickupAreaName')->nullable();
            $table->string('pickupCity')->nullable();
            $table->date('pickupDate')->nullable();
            $table->time('pickupTime')->nullable();
            $table->string('dropoffUnitNumber')->nullable();
            $table->string('dropoffStreetNumber')->nullable();
            $table->string('dropoffStreetName')->nullable();
            $table->string('dropoffAreaName')->nullable();
            $table->string('dropoffCity')->nullable();
            $table->date('dropoffDate')->nullable();
            $table->time('dropoffTime')->nullable();
            $table->enum('status', ['Assigned', 'Unassigned'])->default('Unassigned');
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
        Schema::dropIfExists('bookings');
    }
}