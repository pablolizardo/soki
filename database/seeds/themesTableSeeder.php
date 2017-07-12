<?php

use Illuminate\Database\Seeder;

class themesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->truncate();
        DB::table('themes')->insert([
            'name'		=> 'main_theme',
            'color_primary'		=>	'#7f7c8c',
			'color_secondary'	=>	'#337ab7',
			'apps_bg'			=>	'apps_bg.png',
			'anim_bg'			=>	'anim_bg.png',
			'dis_bg'			=>	'dis_bg.png',
			'posts_bg'			=>	'posts_bg.png',
			'logo'				=>	'soki_logo.png',
            'frase'             =>  'apps, animacion y diseño para el fin del mundo.',
			'activo'			=>	1,

		]);
    }
}
