<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->nullable();
            $table->string('text', 255)->nullable();
            $table->string('button_text', 255)->nullable();
            $table->string('button_url', 255)->nullable();
            $table->string('image', 255)->nullable();
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
        Schema::dropIfExists('slider_sections');
    }
}
