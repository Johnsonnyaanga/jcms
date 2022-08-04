<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThreadTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('threads', function (Blueprint $table) {

           //foreign key for tickets
           $table->unsignedBigInteger('tickets_id')->change();
           $table->foreign('tickets_id')->references('id')->on('tickets');

           //foreign key for users
           $table->unsignedBigInteger('users_id')->change();
           $table->foreign('users_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('threads', function (Blueprint $table) {

         $table ->dropForeign('threads_tickets_id_foreign');
         $table ->dropForeign('threads_users_id_foreign');
         
         });
    }
}
