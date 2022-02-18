<?php namespace ki\gallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class GalleriesAddDescfield extends Migration
{
	public function up()
	{
		if (Schema::hasColumn('nethavn_gallery_galleries', 'slug')) {
			return;
		}

		Schema::table('nethavn_gallery_galleries', function($table)
		{
			$table->string('slug')->nullable()->index();
            $table->text('description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('published')->default(false);
		});

	}

	public function down()
	{
		
	}



} 
