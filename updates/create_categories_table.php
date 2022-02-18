<?php namespace ki\gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('nethavn_gallery_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->index();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('nethavn_gallery_galleries_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('gallery_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['gallery_id', 'category_id'], 'nethavn_gallery_gallery_id_category_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nethavn_gallery_categories');
        Schema::dropIfExists('nethavn_gallery_galleries_categories');
    }

}
