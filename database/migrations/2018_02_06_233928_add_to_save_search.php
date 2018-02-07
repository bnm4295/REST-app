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
            $table->string('addr')-nullable();
            $table->integer('number_of_beds')->nullable();
            $table->integer('number_of_baths')->nullable();
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
