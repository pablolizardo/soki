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
		'github',
		'estado',
		'descripcion',
		'año',
		'tipo',
		'device',
		'stores'
    ];

    public function extension() {
    	return pathinfo($this->attachment, PATHINFO_EXTENSION);
    }

    public function attachmentIcon($size = "") {
    	$icons = [
    	'blend'=>'file-file-o',
    	'pdf'=>'file-pdf-o',
    	'zip'=>'file-zip-o',
    	'svg'=>'file-image-o',
    	'png'=>'file-image-o',
    	'gif'=>'file-image-o',
    	'jpg'=>'file-image-o',
    	'doc'=>'file-text-o',
    	'txt'=>'file-text-o',
    	'wav'=>'file-audio-o',
    	'aac'=>'file-audio-o',
    	'mp3'=>'file-audio-o',
    	'webm'=>'file-movie-o',
    	'mov'=>'file-movie-o',
    	'mp4'=>'file-movie-o',
    	'avi'=>'file-movie-o',
    	'php'=>'file-code-o',
    	'html'=>'file-code-o',
    	'js'=>'file-code-o',
    	'py'=>'file-code-o'
    	];

    	return '<i class="fa fa-'.$size.' fa-'.$icons[pathinfo($this->attachment, PATHINFO_EXTENSION)].'"></i>';
    }

    public function attachmentBadge($archivo = "") {
    	return '<a target="_blank" href="'.asset('uploads/attachments/'.$this->attachment).'" class="btn btn-secondary pt-3" style="color:#'.$this->color.'">'.$this->attachmentIcon("3x").'<br><br>Descargar <br><small class="text-muted">'.$archivo.'</small></a>';
    }

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

