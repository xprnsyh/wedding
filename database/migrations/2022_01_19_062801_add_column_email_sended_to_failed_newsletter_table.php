<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEmailSendedToFailedNewsletterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('failed_newsletter', function (Blueprint $table) {
            $table->string('email_sended')->after('newsletter_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('failed_newsletter', function (Blueprint $table) {
            $table->dropColumn('email_sended');
        });
    }
}
