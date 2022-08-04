<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketAttachmentsTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_attachments', function (Blueprint $table) {
       //foreign key for groups
       $table->unsignedBigInteger('threads_id')->change();
       $table->foreign('threads_id')->references('id')->on('threads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_attachments', function (Blueprint $table) {
          $table->dropForeign('ticket_attachments_threads_id_foreign');
        });
    }
}
