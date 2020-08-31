<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kings', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->text('description1')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->text('description2')->nullable();
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
        Schema::dropIfExists('kings');
    }
}
