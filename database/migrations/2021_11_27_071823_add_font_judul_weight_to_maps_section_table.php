<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFontJudulWeightToMapsSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maps_section', function (Blueprint $table) {
            $table->integer('font_judul_weight')->after('font_judul')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maps_section', function (Blueprint $table) {
            $table->dropColumn('font_judul_weight');
        });
    }
}
