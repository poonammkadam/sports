<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEventParticipants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('event_participants' , function (Blueprint $table) {
           $table->time('race_time')->nullable();
           $table->text('rank_status')->nullable();
           $table->text('file')->nullable();
           $table->boolean('result_status')->default(false);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
