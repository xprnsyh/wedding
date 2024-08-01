<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('code_event')->unique();
            $table->string('path_qr_code')->nullable();
            $table->string('nama_panggilan_mempelai_pria')->nullable();
            $table->string('nama_panggilan_mempelai_wanita')->nullable();
            $table->string('nama_lengkap_mempelai_pria')->nullable();
            $table->string('nama_lengkap_mempelai_wanita')->nullable();
            $table->text('bio_mempelai_pria')->nullable();
            $table->text('bio_mempelai_wanita')->nullable();
            $table->date('tanggal_ijab')->nullable();
            $table->date('tanggal_resepsi')->nullable();
            $table->time('jam_mulai_ijab')->nullable();
            $table->time('jam_selesai_ijab')->nullable();
            $table->time('jam_mulai_resepsi')->nullable();
            $table->time('jam_selesai_resepsi')->nullable();
            $table->string('lokasi_ijab')->nullable();
            $table->string('lokasi_resepsi')->nullable();
            $table->text('gm_ijab')->nullable();
            $table->text('gm_resepsi')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('order_id')
            ->references('id')->on('orders')
            ->onDelete('cascade');

            $table->foreign('created_by')
            ->references('id')->on('customers')
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
        Schema::dropIfExists('events');
    }
}
