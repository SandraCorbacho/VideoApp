<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // també es pot fer servir  en L8.x
            // $table->id(); 
               $table->bigIncrements('id');
               $table->decimal('price',8,2);
               $table->string('description');
           // també es pot fer servir en L8.x
           //  $table->unsignedBigInteger('user_id')
               $table->bigInteger('user_id')->unsigned();
               $table->timestamps();
               $table->foreign('user_id')->references('id')->on('users');
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
