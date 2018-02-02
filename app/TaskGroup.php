<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\TaskGroup
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $pre_share
 * @property int $user_id
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rgt
 * @property int|null $depth
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereDepth( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereDescription( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereLft( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereParentId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup wherePreShare( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereRgt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereTitle( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TaskGroup whereUserId( $value )
 * @mixin \Eloquent
 */
class TaskGroup extends Model {

	use CrudTrait;

	protected $fillable = [
		'title',
		'description',
		'pre_share',
		'user_id',
		'lft',
		'rgt',
		'depth',
	];

	public static function duplicatePreShare( User $user ) {
		$groups = TaskGroup::wherePreShare( true )->get();
		foreach ( $groups as $group ) {
			$group->duplicateFor( $user );
		}
	}

	public function duplicateFor( User $user ) {
		/* @var TaskGroup $group */
		$group = $this->replicate();
		$user->taskGroups()->save( $group );
		foreach ( $this->tasks as $task ) {
			$task->duplicateFor( $group );
		}
	}

	public function tasks() {
		return $this->hasMany( 'App\Task', 'task_group_id' );
	}

	public function user() {
		return $this->belongsTo( 'App\User' );
	}

	public function tasksCount() {
		return $this->tasks()->count();
	}

	public function allDone() {
		$done = true;
		foreach ( $this->tasks as $task ) {
			if ( ! $task->done ) {
				$done = false;
				break;
			}
		}

		return $done;
	}

}
