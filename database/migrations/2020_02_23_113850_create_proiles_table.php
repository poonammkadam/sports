<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

class CreateProilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('gender');
            $table->date('date_of_birth');
            $table->text('nationality');
            $table->text('local_id');
            $table->text('passport');
            $table->text('address');
            $table->text('country');
            $table->text('mobile_no_primary');
            $table->text('mobile_no_second');
            $table->text('emergency_contact_name');
            $table->text('emergency_contact_number');
            $table->text('meal_preference');
            $table->text('name_preference');
            $table->text('language_preference');
            $table->text('team_preference');
            $table->text('t-shrit_size');
            $table->boolean('newsletter');
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
        Schema::dropIfExists('proiles');
    }
}
