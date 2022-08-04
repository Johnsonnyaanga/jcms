<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QueuesTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queues', function (Blueprint $table) {

            //foreign key for groups
            $table->unsignedBigInteger('groups_id')->change();
            $table->foreign('groups_id')->references('id')->on('groups');


         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('queues', function (Blueprint $table) {

            //foreign key for groups
            $table->dropForeign('queues_groups_id_foreign');


         });
    }
}
