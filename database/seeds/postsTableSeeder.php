<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class postsTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('posts')->truncate();
    	$faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('posts')->insert([
	            'titulo'		=> $faker->sentence($nbWords = 4),
	            'contenido'		=>	$faker->text($maxNbChars = 2000),
				'image'	=>		'http://loremflickr.com/240/240',
				'link'			=>	$faker->url,
				'color'			=>	$faker->hexcolor,
				'created_at'			=>	$faker->dateTimeThisYear($max = 'now')  ,
			]);
		}

    }
}
