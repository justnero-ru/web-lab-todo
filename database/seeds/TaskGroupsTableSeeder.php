<?php

use Illuminate\Database\Seeder;

class TaskGroupsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run() {
		\DB::table( 'task_groups' )->delete();

		\DB::table( 'task_groups' )->insert( [
			0 =>
				[
					'id'          => 1,
					'title'       => 'Laravel. Часть 1: Blade, Webpack',
					'description' => null,
					'pre_share'   => 1,
					'user_id'     => 1,
					'parent_id'   => null,
					'lft'         => 2,
					'rgt'         => 3,
					'depth'       => 1,
					'created_at'  => '2017-12-29 10:31:46',
					'updated_at'  => '2017-12-29 11:48:43',
				],
			1 =>
				[
					'id'          => 2,
					'title'       => 'Laravel. Часть 2: Controller, Model, Validation',
					'description' => null,
					'pre_share'   => 1,
					'user_id'     => 1,
					'parent_id'   => null,
					'lft'         => 4,
					'rgt'         => 5,
					'depth'       => 1,
					'created_at'  => '2017-12-29 10:31:58',
					'updated_at'  => '2017-12-29 12:00:31',
				],
			2 =>
				[
					'id'          => 3,
					'title'       => 'SASS/SCSS/LESS',
					'description' => null,
					'pre_share'   => 1,
					'user_id'     => 1,
					'parent_id'   => null,
					'lft'         => 6,
					'rgt'         => 7,
					'depth'       => 1,
					'created_at'  => '2017-12-29 11:45:38',
					'updated_at'  => '2017-12-29 12:20:34',
				],
			3 =>
				[
					'id'          => 4,
					'title'       => 'ECMAScript 6',
					'description' => null,
					'pre_share'   => 1,
					'user_id'     => 1,
					'parent_id'   => null,
					'lft'         => 8,
					'rgt'         => 9,
					'depth'       => 1,
					'created_at'  => '2017-12-29 11:45:53',
					'updated_at'  => '2017-12-29 12:20:34',
				],
			4 =>
				[
					'id'          => 5,
					'title'       => 'Asynchronous Javascript and XML',
					'description' => null,
					'pre_share'   => 1,
					'user_id'     => 1,
					'parent_id'   => null,
					'lft'         => 10,
					'rgt'         => 11,
					'depth'       => 1,
					'created_at'  => '2017-12-29 11:46:13',
					'updated_at'  => '2017-12-29 13:01:39',
				],
		] );
	}
}