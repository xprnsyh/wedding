<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invite_id');
            $table->unsignedBigInteger('event_id');
            $table->string('name');
            $table->text('address')->nullable(true);
            $table->string('no_hp')->nullable(true);
            $table->enum('status',['Diundang','Hadir','Tidak Hadir']);
            $table->boolean('is_confirmed')->default(0);
            $table->dateTime('attended_at')->nullable();

            $table->foreign('invite_id')
                ->references('id')->on('invites')
                ->onDelete('cascade');

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
        Schema::dropIfExists('invite_groups');
    }
}
