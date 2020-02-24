<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('nationality')->nullable();
            $table->text('local_id')->nullable();
            $table->text('passport')->nullable();
            $table->text('address')->nullable();
            $table->text('country')->nullable();
            $table->text('mobile_no_primary')->nullable();
            $table->text('mobile_no_second')->nullable();
            $table->text('emergency_contact_name')->nullable();
            $table->text('emergency_contact_number')->nullable();
            $table->text('meal_preference')->nullable();
            $table->text('name_preference')->nullable();
            $table->text('language_preference')->nullable();
            $table->text('team_preference')->nullable();
            $table->text('t-shrit_size')->nullable();
            $table->boolean('newsletter')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
