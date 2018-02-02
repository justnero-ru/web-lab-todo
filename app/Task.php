<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Task
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $done
 * @property int $task_group_id
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rgt
 * @property int|null $depth
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $children
 * @property-read \App\TaskGroup $group
 * @property-read \App\Task|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task done()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task notDone()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereDepth( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereDescription( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereDone( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereLft( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereParentId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereRgt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereTaskGroupId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereTitle( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class Task extends Model {

	use CrudTrait;

	protected $fillable = [
		'title',
		'description',
		'done',
		'task_group_id',
		'parent_id',
		'lft',
		'rgt',
		'depth',
	];
	protected $touches = [ 'parent', 'group' ];

	public function group() {
		return $this->belongsTo( 'App\TaskGroup', 'task_group_id' );
	}

	public function parent() {
		return $this->belongsTo( 'App\Task', 'parent_id' );
	}

	public function children() {
		return $this->hasMany( 'App\Task', 'parent_id' );
	}

	/**
	 * Scope a query to only include done tasks.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeDone( $query ) {
		return $query->where( 'done', true );
	}

	/**
	 * Scope a query to only include not done tasks.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeNotDone( $query ) {
		return $query->where( 'done', false );
	}

	public function duplicateFor( TaskGroup $group ) {
		$task = $this->replicate();
		$group->tasks()->save( $task );
	}

}
