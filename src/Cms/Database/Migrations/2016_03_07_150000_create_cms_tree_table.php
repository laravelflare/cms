<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flare_cms_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->text('fullslug');
            $table->text('slug');
            $table->integer('parent_id');
            $table->morphs('page');
            $table->softDeletes();
            $table->timestamps();

            $table->index('fullslug');
            $table->index('slug');
            $table->index('fullslug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flare_cms_tree');
    }
}
