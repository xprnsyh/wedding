<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('payments', function (Blueprint $table) {
            $table->string('path_bukti_transfer')->nullable()
            ->after('id');
            $table->string('jumlah_transfer')->nullable()
            ->after('id');
            $table->date('tanggal_transfer')->nullable()
            ->after('id');
            $table->string('bank_pengirim')->nullable()
            ->after('id');
            $table->string('rekening_pengirim')->nullable()
            ->after('id');
            $table->string('nama_pengirim')->nullable()
            ->after('id');
            $table->string('no_invoice')->nullable()
            ->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
