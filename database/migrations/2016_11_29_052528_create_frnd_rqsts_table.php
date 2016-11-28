<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrndRqstsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('frnd_rqsts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('rqsterID');
            $table->integer('rqsteeID');
            $table->boolean('frnd_rqst_acc');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('frnd_rqsts');
	}

}
