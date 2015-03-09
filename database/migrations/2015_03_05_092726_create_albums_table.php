<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('format_id')->unsigned();
			$table->foreign('format_id')->references('id')->on('formats');
			$table->integer('purchase_id')->unsigned();
			$table->foreign('purchase_id')->references('id')->on('purchases');
			$table->integer('artist_id')->unsigned();
			$table->foreign('artist_id')->references('id')->on('artists');
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
		Schema::drop('albums');
	}

}
