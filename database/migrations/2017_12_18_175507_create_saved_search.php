<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedSearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savesearch', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('email');
            $table->string('url');
            $table->string('price_left');
            $table->string('price_right');
            $table->string('area_left');
            $table->string('area_right');
            $table->string('house_type')->nullable();
            $table->integer('number_of_beds')->nullable();
            $table->integer('number_of_baths')->nullable();
            $table->string('addr')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('savesearch');
    }
}
