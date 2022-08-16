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
            $table->integer('queues_id');
            $table->integer('ticket_types_id');
            $table->integer('services_id');
            $table->integer('slas_id');
            $table->integer('users_id');
            $table->integer('case_number');
            $table->integer('responsible_user_id');
            $table->integer('priorities_id');
            $table->integer('ticket_statuses_id');
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
