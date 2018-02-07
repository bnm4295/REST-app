<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToSaveSearchs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('savesearch', function (Blueprint $table) {
          $table->integer('number_of_beds')->nullable();
          $table->integer('number_of_baths')->nullable();
          $table->string('addr')-nullable();
          $table->string('house_type')->nullable();
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
