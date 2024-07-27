<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNamaAlamatToInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invites', function (Blueprint $table) {
            $table->renameColumn('kode_kupon','kode_qr');
            $table->string('name')->after('id');
            $table->text('address')->after('name')->nullable(true);
            $table->string('no_hp')->after('address')->nullable(true);
            $table->enum('klasifikasi',['Sendiri','Group'])->default('Sendiri')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invites', function (Blueprint $table) {
            //
        });
    }
}
