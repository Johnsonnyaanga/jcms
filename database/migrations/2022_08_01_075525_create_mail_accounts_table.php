<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('password');
            $table->string('host');
            $table->string('account_type');
            $table->integer('queue_id');
            $table->integer('trusted');
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
        Schema::dropIfExists('mail_accounts');
    }
}
