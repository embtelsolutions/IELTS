<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterSingupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_singup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('language_id')->default(0);
            $table->string('title_one', 255)->nullable();
            $table->string('description_one', 255)->nullable();
            $table->string('button_text_one', 255)->nullable();
            $table->string('button_url_one', 255)->nullable(); 
            $table->string('image_one', 255)->nullable();
            $table->string('title_two', 255)->nullable();
            $table->string('description_two', 255)->nullable();
            $table->string('button_text_two', 255)->nullable();
            $table->string('button_url_two', 255)->nullable();     
            $table->string('image_two', 255)->nullable();
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
        Schema::dropIfExists('footer_singup');
    }
}
