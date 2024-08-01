<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('province_id'); 
            $table->unsignedBigInteger('city_id'); 
            $table->string('name');
            $table->timestamps();

            $table->foreign('city_id')
            ->references('id')->on('cities')
            ->onDelete('cascade');            
            $table->foreign('province_id')
            ->references('id')->on('provinces')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
