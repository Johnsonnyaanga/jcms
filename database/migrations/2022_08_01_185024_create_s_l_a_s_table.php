<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('grace_period');
            $table->string('admin_note');
            $table->integer('valid_id');
            $table->integer('transient');
            $table->integer('overdue');
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
        Schema::dropIfExists('slas');
    }
}
