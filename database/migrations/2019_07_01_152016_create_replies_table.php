<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration 
{
	public function up()
	{
		Schema::create('replies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->default(0)->index();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->tinyInteger('is_block')->unsigned()->default(0)->index();
            $table->integer('vote_count')->unsigned()->default(0)->index();
            $table->text('body');
            $table->text('body_original')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('replies');
	}
}
