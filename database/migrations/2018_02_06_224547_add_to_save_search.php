<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToSaveSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('savesearch', function (Blueprint $table) {
            $table->string('price_left');
            $table->string('price_right');
            $table->string('area_left');
            $table->string('area_right');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('savesearch', function (Blueprint $table) {
            //
        });
    }
}
