<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('venue')->nullable();
            $table->text('org_id')->nullable();
            $table->boolean('bus_reservation')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->dateTime('registration_start_date')->nullable();
            $table->dateTime('registration_end_date')->nullable();
            $table->text('banner')->nullable();
            $table->text('transstart')->nullable();
            $table->text('transend')->nullable();
            $table->text('accommodation')->nullable();
            $table->text('racekit')->nullable();
            $table->boolean('event_status')->nullable();
            $table->text('extra_info')->nullable();
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
        Schema::dropIfExists('events');
    }
}

