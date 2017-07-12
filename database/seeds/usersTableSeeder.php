<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		//ricardo rojas
		DB::table('users')->insert([
			// 'responsable'=>0,
			// 'role' => 'admin',
			'password'=>bcrypt('admin'),
			'name'=> 'Pablo Lizardo',
			'email'=>  'lizardo.pablo@gmail.com']);
    }
}
