<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->integer('id');
            $table->increments('p_id');
            $table->string('name');
            $table->integer('gender');
            $table->date('date_of_birth');
            $table->string('image')->nullable();
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('disease');
            $table->string('patientdetails')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
