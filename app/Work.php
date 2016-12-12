<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
		'titulo',
		'cliente',
		//'img_featured',
		//'img_concept',
		//'img_wip',
		//'img_beauty',
		//'img_square',
		//'img_wide',
		'link_youtube',
		'link',
		'descripcion',
		'año',
		'tipo'
    ];

    public function tipo(){
    	switch ($this->tipo) {
    		case 0: $tipo = "App"; break;
    		case 1: $tipo = "Animacion"; break;
    		case 2: $tipo = "Diseño"; break;
 			default: break;
    	}

    	return $tipo;
    }
}

