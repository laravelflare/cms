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
        Schema::create('cms_slugs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('path');
            $table->morphs('model');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cms_slugs');
    }
}
