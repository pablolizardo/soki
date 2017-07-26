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
		'blend'=>'file-archive-o',
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
		return '<a target="_blank" href="'.asset('uploads/attachments/'.$this->attachment).'" class="btn btn-secondary pt-3" style="color:#'.$this->color.'">'.$this->attachmentIcon("3x").'<br><br>Descargar <br><small class="text-muted" style="overflow: hidden; text-overflow: ellipsis;width:120px; display: inline-block;">'.$archivo.'</small></a>';
	}

	public function newApp() {
		$isNew ="";
		if ($this->created_at) {
			$isNew = ($this->created_at->diffInDays(\Carbon\Carbon::today()) < 1) ? '<i style="position:relative; top:-2px;font-size:.6em;color: #'.$this->color.';" class="fa fa-circle"></i>' : "";
		}
		if ($this->updated_at) {
				$isNew = ($this->updated_at->diffInDays(\Carbon\Carbon::today()) < 1) ? '<i style="position:relative; top:-2px;font-size:.6em;color: #'.$this->color.';" class="fa fa-circle"></i>' : "";
			}
		return $isNew;
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

	public function details($layout = "v") {
		if($layout == "v") {
			$details = '<dl>
							<dt style="color: #'.$this->color.';">Cliente</dt>
							<dd>'.$this->cliente.'</dd>
							<dt style="color: #'.$this->color.';">Año</dt>
							<dd>'.$this->año.'</dd>
							<dt><a style="color: #'.$this->color.'!important;" href="'.$this->link.'" >Link <i class="fa fa-arrow-right"></i></a></dt>
						</dl>';
		} else {
			$details = '<dl class="row">
							<dt class="col-md-1 mt-0" style="color: #'.$this->color .';">Cliente</dt>
							<dd class="col-md-4 mt-0">'.$this->cliente .'</dd>
							<dt class="col-md-1 mt-0" style="color: #'.$this->color .';">Año</dt>
							<dd class="col-md-1 mt-0">'.$this->año .'</dd>
							<dt class="col-md-1 mt-0" style="color: #'.$this->color .';">Link</dt>
							<dd class="col-md-1 mt-0"><a href="'.$this->link .'" style="color: #'.$this->color.'!important;">Ir <i class="fa fa-arrow-right"></i></a></dd>
						</dl>';
		}
		return $details;
	}

	public function socialButtons($layout = 'v') {

		if($layout == 'v') {
			$buttons = '<div class="mb-2 mt-2">
							<div class="fb-share-button" data-href="'. url('/works/'.$this->id) .'" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div> <br>
						</div>
						
						<a href="https://twitter.com/share" class="twitter-share-button " data-via="sokistudio" data-size="large" data-related="pablolizardo" data-hashtags="blenderinkscape">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>
						<div class="mb-2">
						<a class="btn btn-sm btn-success" style="background-color: #59c150; color :#fff;font-weight: bold;" href="whatsapp://send?text='.$this->titulo .' - '.$this->cliente.' – '. url('/works/'.$this->id) .'" data-action="share/whatsapp/share" ><i class="fa fa-btn fa-whatsapp"></i> Compartir</a>
						</div>';
		} else {
			$buttons = '<div class="float-left">
							<div class="fb-share-button" data-href="'. url('/works/'.$this->id) .'" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div> <br>
						</div>
						
						<div class="float-left">
						<a href="https://twitter.com/share" class="twitter-share-button " data-via="sokistudio" data-size="large" data-related="pablolizardo" data-hashtags="blenderinkscape">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>
						</div>
						<div class="float-left ml-1">
							<a class="btn btn-sm btn-success" style="background-color: #59c150; color :#fff;font-weight: bold;" href="whatsapp://send?text='.$this->titulo .' - '.$this->cliente.' – '. url('/works/'.$this->id) .'" data-action="share/whatsapp/share" ><i class="fa fa-btn fa-whatsapp"></i> Compartir</a>
						</div>';
		}
 
		return $buttons;
	}

	public function metadata() {
		$desc = ($this->descripcion != "" )  ? $this->descripcion : "Soki Studio 2017";
		$metadata =  '<meta name="description" content="'.$this->titulo .' - '.$this->cliente.' - '.$this->descripcion .'" />

		<!-- Google Authorship and Publisher Markup -->
		<link rel="author" href="https://plus.google.com/+SokistudioArg/posts"/>
		<link rel="publisher" href="https://plus.google.com/+SokistudioArg"/>

		<!-- Schema.org markup for Google+ -->
		<meta itemprop="name" content="'.$this->titulo .' - '.$this->cliente.'">
		<meta itemprop="description" content="'.$this->descripcion .'">
		<meta itemprop="image" content="'. asset('uploads/works/'.$this->img_horizontal) .'">

		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@sokistudio">
		<meta name="twitter:creator" content="@pablolizardo">

		<meta name="twitter:title" content="'.$this->titulo .' - '.$this->cliente.'">
		<meta name="twitter:description" content="'.$desc .'">
		<meta name="twitter:text:description" content="'. $desc .'">
		<!-- Twitter summary card with large image must be at least 280x150px -->
		<meta name="twitter:image" content="'. asset('uploads/works/'.$this->img_square).'">
		<meta name="twitter:image:src" content="'. asset('uploads/works/'.$this->img_square).'">

		<!-- Open Graph data -->
		<meta property="og:title" content="'.$this->titulo .' - '.$this->cliente.'" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="'. url('/works/'.$this->id) .'" />
		<meta property="og:image" content="'. asset('uploads/works/'.$this->img_horizontal) .'" />
		<meta property="og:image:width" content="1280" />
		<meta property="og:image:height" content="800" />
		<meta property="og:video" content="https://www.youtube.com/embed/'.$this->link_youtube .'" />
		<meta property="og:site_name" content="'. config('app.name') .'" />
		<meta property="og:description" content="'.$this->descripcion .'" />
		<meta property="og:site_name" content="'. config('app.name') .'" />
		<meta property="article:published_time" content="'.$this->created_at .'" />
		<meta property="article:modified_time" content="'.$this->updated_at .'" />
		<meta property="article:section" content="'.$this->titulo .'" />
		<meta property="article:tag" content="'.$this->tipo() .'" />
		<meta property="fb:admins" content="208715565813337" />
		<meta property="og:locale" content="es_ES" />
		<meta property="og:locale:alternate" content="en_GB" />';
		return $metadata;
	}
}

