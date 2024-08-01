<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFontTeksToEventSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_section', function (Blueprint $table) {
            $table->string('font_teks')->after('font_judul_weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_section', function (Blueprint $table) {
            $table->dropColumn('font_teks');
        });
    }
}
