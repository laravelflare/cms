<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsSlugsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('flare_cms_slugs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('path')->unique();
            $table->morphs('model');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('flare_cms_slugs');
    }
}
