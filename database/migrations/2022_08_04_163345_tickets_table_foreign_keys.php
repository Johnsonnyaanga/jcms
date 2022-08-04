<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketsTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            //foreign key for users
            $table->unsignedBigInteger('users_id')->change();
            $table->foreign('users_id')->references('id')->on('users');


            //foreign key for groups
            $table->unsignedBigInteger('queues_id')->change();
            $table->foreign('queues_id')->references('id')->on('queues');

            //foreign key for ticket types
            $table->unsignedBigInteger('ticket_types_id')->change();
            $table->foreign('ticket_types_id')->references('id')->on('ticket_types');

            //foreign key for services
            $table->unsignedBigInteger('services_id')->change();
            $table->foreign('services_id')->references('id')->on('services');

            //foreign key for ticket status
            $table->unsignedBigInteger('ticket_statuses_id')->change();
            $table->foreign('ticket_statuses_id')->references('id')->on('ticket_statuses');

            //foreign key for priorities
            $table->unsignedBigInteger('priorities_id')->change();
            $table->foreign('priorities_id')->references('id')->on('priorities');

            //foreign key for slas
            $table->unsignedBigInteger('slas_id')->change();
            $table->foreign('slas_id')->references('id')->on('slas');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
        $table->dropForeign('tickets_users_id_foreign');
        $table->dropForeign('tickets_queues_id_foreign');
        $table->dropForeign('tickets_ticket_types_id_foreign');
        $table->dropForeign('tickets_services_id_foreign');
        $table->dropForeign('tickets_ticket_statuses_id_foreign');
        $table->dropForeign('tickets_priorities_id_foreign');
        $table->dropForeign('tickets_slas_id_foreign');
        });

    }
}
