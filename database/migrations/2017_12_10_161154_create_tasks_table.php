<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'tasks', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'title' );
			$table->longText( 'description' )
			      ->nullable();
			$table->boolean( 'done' )
			      ->default( false );
			$table->integer( 'task_group_id' )
			      ->references( 'id' )
			      ->on( 'task_groups' )
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
		Schema::dropIfExists( 'tasks' );
	}
}
