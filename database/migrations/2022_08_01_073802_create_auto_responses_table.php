<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_responses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('text0');
            $table->string('text1');
            $table->integer('type_id');
            $table->string('system_adress_id');
            $table->string('content_type');
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
        Schema::dropIfExists('auto_responses');
    }
}
