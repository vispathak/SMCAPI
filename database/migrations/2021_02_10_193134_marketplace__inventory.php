<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MarketplaceInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oem_specs_id')->unsigned();
            $table->string('kms');
            $table->string('major_scratches');
            $table->string('original_paint');
            $table->integer('no_of_accidents');
            $table->integer('previous_buyers');
            $table->longtext('registration_place');
            $table->timestamps();
        });

        Schema::table('marketplace_inventories', function($table) {
            $table->foreign('oem_specs_id')->references('id')->on('oem_specs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketplace_inventories');
    }
}