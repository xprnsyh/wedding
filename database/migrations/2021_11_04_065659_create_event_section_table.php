<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('background')->nullable();
            $table->string('teks_atas')->nullable();
            $table->text('teks_bawah')->nullable();
            $table->string('perataan')->nullable();
            $table->string('container')->nullable();
            $table->string('color_teks_atas')->nullable();
            $table->string('color_teks_bawah')->nullable();
            $table->string('display')->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_section');
    }
}
