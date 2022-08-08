<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_responses', function (Blueprint $table) {
            $table->id();
            $table->integer('tickets_id');
            $table->integer('article_type_id');
            $table->integer('article_sender_type_id');
            $table->string('a_from');
            $table->string('a_reply_to');
            $table->string('a_to');
            $table->string('a_cc');
            $table->string('a_subject');
            $table->integer('a_message_id');
            $table->string('a_in_reply_to');
            $table->string('a_references');
            $table->string('a_content_type');
            $table->string('a_body');
            $table->integer('incoming_time');
            $table->string('content_path');
            $table->integer('valid_id');
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
        Schema::dropIfExists('email_responses');
    }
}
