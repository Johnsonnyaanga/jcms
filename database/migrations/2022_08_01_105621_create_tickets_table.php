<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();
            $table->string('title');
            $table->integer('queue_id');
            $table->integer('type_id');
            $table->integer('service_id');
            $table->integer('sla_id');
            $table->integer('user_id');
            $table->integer('responsible_user_id');
            $table->integer('ticket_priority_id');
            $table->integer('ticket_state_id');
            $table->integer('escalation_time');
            $table->integer('assigned_to')->nullable();
            $table->string('source');
            $table->integer('is_deleted');
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
        Schema::dropIfExists('tickets');
    }
}
