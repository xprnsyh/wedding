<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_kupon')->unique();
            $table->unsignedBigInteger('event_id');
            $table->enum('status',['Diundang','Hadir','Tidak Hadir']);
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('is_invited')->default(0);
            $table->dateTime('attended_at')->nullable();

            $table->foreign('event_id')
            ->references('id')->on('events')
            ->onDelete('cascade');


            

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
        Schema::dropIfExists('invites');
    }
}
