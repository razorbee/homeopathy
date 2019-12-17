<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_drugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prescription_id');
            $table->integer('drug_id');
            $table->integer('drug_id1');
            $table->integer('drug_id2');
            $table->string('type')->nullable();
            $table->string('dose')->nullable();
            $table->string('duration')->nullable();
            $table->string('strength')->nullable();
            $table->string('advice')->nullable();
            $table->timestamps();
            $table->string('frequencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescription_drugs');
    }
}
