<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_participants', function (Blueprint $table) {
            $table->text('team')->nullable();
            $table->text('t_shirt_size')->nullable();
            $table->text('accommodation')->nullable();
            $table->integer('transstarts')->nullable();
            $table->integer('transends')->nullable();
            $table->integer('racekit_price')->nullable();
            $table->integer('team')->nullable();
            $table->text('bus_reservation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_participants', function (Blueprint $table) {

        });
    }
}
