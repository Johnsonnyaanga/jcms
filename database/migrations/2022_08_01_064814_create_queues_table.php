<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('groups_id');
            $table->integer('unlock_time_out');
            $table->integer('first_time_response');
            $table->integer('first_time_response_notify');
            $table->integer('update_time');
            $table->integer('update_notify');
            $table->integer('solution_time');
            $table->integer('solution_notify');
            $table->integer('system_adress_id');
            $table->string ('default_sign_key');
            $table->integer('salutation_id')->nullable();
            $table->integer('signature_id')->nullable();
            $table->integer('follow_up_id')->nullable();
            $table->integer('follow_up_lock');
            $table->string('comments');
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
        Schema::dropIfExists('queues');
    }
}
