<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->index();
    			$table->string('title');
          $table->text('details')->nullable();
          $table->string('date');
          $table->string('firstdate')->nullable();
          $table->string('seconddate')->nullable();
          $table->string('slug');
          $table->string('price');
          $table->string('area');
          $table->string('house_type')->nullable();
          $table->string('street_address')->nullable()->default("");
          $table->string('route')->nullable()->default("");
          $table->string('city')->nullable()->default("");
          $table->string('state')->nullable()->default("");
          $table->string('country')->nullable()->default("");
          $table->string('postal_code')->nullable()->default("");
          $table->string('latitude')->nullable();
          $table->string('longitude')->nullable();
          $table->integer('number_of_beds')->nullable();
          $table->integer('number_of_baths')->nullable();
          $table->boolean('hideshow')->default(0);
          $table->boolean('sold')->default(0);
          $table->string('images', 2058)->nullable();
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
        Schema::dropIfExists('properties');
    }
}
