<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function state( Task $task ) {
		$user = \Auth::user();
		abort_if( $task->group->user_id != $user->id, 403 );

		$task->done = ! $task->done;
		$task->save();

		return [ 'code' => 200, 'task' => $task->id, 'state' => $task->done ];
	}
}
