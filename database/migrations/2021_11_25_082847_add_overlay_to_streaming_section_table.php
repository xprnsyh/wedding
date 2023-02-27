<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOverlayToStreamingSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('streaming_section', function (Blueprint $table) {
            $table->string('overlay')->after('display')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('streaming_section', function (Blueprint $table) {
            $table->dropColumn('overlay');
        });
    }
}
