<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskGroupsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'task_groups', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'title' );
			$table->longText( 'description' )
			      ->nullable();
			$table->boolean( 'pre_share' )
			      ->default( false );
			$table->integer( 'user_id' )
			      ->references( 'id' )
			      ->on( 'users' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );
			$table->integer( 'parent_id' )
			      ->nullable()
			      ->references( 'id' )
			      ->on( 'tasks' )
			      ->onUpdate( 'cascade' )
			      ->onDelete( 'cascade' );
			$table->integer( 'lft' )
			      ->nullable();
			$table->integer( 'rgt' )
			      ->nullable();
			$table->integer( 'depth' )
			      ->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'task_groups' );
	}
}
