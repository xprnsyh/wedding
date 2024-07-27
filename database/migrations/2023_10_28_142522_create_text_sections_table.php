<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->text('quote')->nullable();
            $table->text('title')->nullable();
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')->on('events')
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
        Schema::dropIfExists('text_sections');
    }
}
