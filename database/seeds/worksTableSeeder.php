<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class worksTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('works')->truncate();
    	$faker = Faker::create();
    	foreach (range(1,4) as $index) {
	        DB::table('works')->insert([
	            'titulo'		=> $faker->sentence($nbWords = 2, $variableNbWords = false),
	            'descripcion'	=>	$faker->text($maxNbChars = 600),
				'cliente'		=>	$faker->name,
				//'img_featured'	=>	'http://loremflickr.com/240/240?random='.$faker->numberBetween($min = 0, $max = 9) ,
				'link_youtube'	=>	$faker->domainName,
				'link'			=>	$faker->url,
				'año'			=>	$faker->year,
				'color'			=>	$faker->hexcolor,
				'tipo'			=>	0 
			]);
		}

		foreach (range(1,4) as $index) {
	        DB::table('works')->insert([
	            'titulo'		=> $faker->sentence($nbWords = 2, $variableNbWords = false),
	            'descripcion'	=>	$faker->text($maxNbChars = 600),
				'cliente'		=>	$faker->name,
				//'img_featured'	=>	'http://loremflickr.com/240/240?random='.$faker->numberBetween($min = 0, $max = 9) ,
				'link_youtube'	=>	$faker->domainName,
				'link'			=>	$faker->url,
				'año'			=>	$faker->year,
				'color'			=>	$faker->hexcolor,
				'tipo'			=>	1
			]);
		}

		foreach (range(1,6) as $index) {
	        DB::table('works')->insert([
	            'titulo'		=> $faker->sentence($nbWords = 2, $variableNbWords = false),
	            'descripcion'	=>	$faker->text($maxNbChars = 600),
				'cliente'		=>	$faker->name,
				//'img_featured'	=>	'http://loremflickr.com/240/240?random='.$faker->numberBetween($min = 0, $max = 9) ,
				'link_youtube'	=>	$faker->domainName,
				'link'			=>	$faker->url,
				'año'			=>	$faker->year,
				'color'			=>	$faker->hexcolor,
				'tipo'			=>	2
			]);
		}
    }
}
