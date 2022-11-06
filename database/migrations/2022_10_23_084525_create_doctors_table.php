<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('room_id')->nullable();
            $table->bigInteger('followup_id')->nullable();
            $table->bigInteger('holiday_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('degrees');
            $table->string('specialist');
            $table->string('designation')->nullable();
            $table->string('consultant_of_college')->nullable();
            $table->double('firstVisit', 8, 2)->nullable();
            $table->double('nextVisit', 8, 2)->nullable();
            $table->double('reportOnly', 8, 2)->nullable();
            $table->timestamps();
            $table->string('b_name');
            $table->string('b_degrees');
            $table->string('b_specialist');
            $table->string('b_designation');
            $table->string('b_consultant_of_college');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
