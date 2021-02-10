<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OemSpecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oem_specs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oems_id')->unsigned();
            $table->string('model_name');
            $table->string('model_year');
            $table->double('price');
            $table->longtext('colors');
            $table->string('mileage');
            $table->string('power');
            $table->string('max_speed');
            $table->timestamps();
        });

        Schema::table('oem_specs', function($table) {
            $table->foreign('oems_id')->references('id')->on('oems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oem_specs');
    }
}
