<?php

// composer require laracasts/testdummy

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	public function run() {
		$now = \Carbon\Carbon::now();
		DB::table( 'users' )->insert( [
			[
				'id'             => 1,
				'name'           => 'Admin',
				'email'          => 'admin@sevsu.ru',
				'password'       => bcrypt( 'admin' ),
				'remember_token' => str_random( 10 ),
				'created_at'     => $now,
				'updated_at'     => $now,
			],
		] );
		DB::table( 'roles' )->insert( [
			[
				'id'         => 1,
				'name'       => 'admin',
				'created_at' => $now,
				'updated_at' => $now,
			],
		] );
		DB::table( 'role_users' )->insert( [
			[
				'role_id' => 1,
				'user_id' => 1,
			],
		] );
	}

}
