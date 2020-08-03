<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('qualification');
            $table->integer('experience');
            $table->string('photo');
            $table->string('video')->nullable();
            $table->string('subjects');
            $table->string('about');
            $table->integer('contact_no');
            $table->string('email');
            $table->float('amount');
            $table->integer('paymnet-status')->comment('1 - completed, 0 - remaining');
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
        Schema::dropIfExists('teachers');
    }
}
