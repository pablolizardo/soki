@extends('layouts.app')

@section('metadata')
	<!-- Update your html tag to include the itemscope and itemtype attributes. -->
	{{-- <html itemscope itemtype="http://schema.org/Article"> --}}

	<!-- Place this data between the <head> tags of your website -->
	<meta name="description" content="{{ $anim->titulo }} - {{ $anim->cliente}} - {{ $anim->descripcion }}" />

	<!-- Google Authorship and Publisher Markup -->
	<link rel="author" href="https://plus.google.com/+SokistudioArg/posts"/>
	<link rel="publisher" href="https://plus.google.com/+SokistudioArg"/>

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="{{ $anim->titulo }} - {{ $anim->cliente}}">
	<meta itemprop="description" content="{{ $anim->descripcion }}">
	<meta itemprop="image" content="{{ asset('uploads/works/'.$anim->img_horizontal) }}">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@sokistudio">
	<meta name="twitter:creator" content="@pablolizardo">

	<meta name="twitter:title" content="{{ $anim->titulo }} - {{ $anim->cliente}}">
	<meta name="twitter:description" content="@if($anim->descripcion != "" ) {{ $anim->descripcion}} @else Soki Studio 2017 @endif">
	<meta name="twitter:text:description" content="@if($anim->descripcion != "" ) {{ $anim->descripcion}} @else Soki Studio 2017 @endif">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image" content="{{ asset('uploads/works/'.$anim->img_horizontal)}}">
	<meta name="twitter:image:src" content="{{ asset('uploads/works/'.$anim->img_horizontal)}}">

	<!-- Open Graph data -->
	<meta property="og:title" content="{{ $anim->titulo }} - {{ $anim->cliente}}" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ Request::url() }}" />
	<meta property="og:image" content="{{ asset('uploads/works/'.$anim->img_horizontal) }}" />
		<meta property="og:image:width" content="1280" />
		<meta property="og:image:height" content="800" />
	<meta property="og:video" content="https://www.youtube.com/embed/{{ $anim->link_youtube }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />
	<meta property="og:description" content="{{ $anim->descripcion }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />
	<meta property="article:published_time" content="{{ $anim->created_at }}" />
	<meta property="article:modified_time" content="{{ $anim->updated_at }}" />
	<meta property="article:section" content="{{ $anim->titulo }}" />
	<meta property="article:tag" content="{{ $anim->tipo() }}" />
	<meta property="fb:admins" content="208715565813337" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:locale:alternate" content="en_GB" />
@stop

@section('title')
 | {{ $anim->titulo }} - {{ $anim->cliente}}
@stop

@section('content')

<div class="single single-anims">
			
	<div class="section section-head" style="background-image: url({{ url('uploads/works').'/blur_'.$anim->img_square}})">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 style="font-size:5em;font-weight:100!important;">{{ $anim->titulo }}</h1>
					 @if (Auth::check()) <a href="{{ action('WorkController@edit',$anim->id) }}">Editar</a> @endif
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="app-wrap">
						<div class="app-icon" style="background-image: url({{ asset('uploads/works/'.$anim->img_horizontal )}}); width:100%;height: 400px;"> 
							<div class="filmstrip"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<p class="lead" > {{  $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $anim->descripcion) }} </p>
					<p>
						
						{!! html_entity_decode($anim->descripcion) !!}
					</p>
				</div>
				<div class="hidden-xs hidden-sm col-md-2">
					@if($anim->attachment) {!! $anim->attachmentBadge($anim->attachment) !!} @endif
					<dl class=" ">
						<dt style="color : #{{ $anim->color }};">Cliente</dt><dd>{{$anim->cliente}}</dd>
						<dt style="color : #{{ $anim->color }};">Año</dt><dd>{{$anim->año}}</dd>
						<dt style="color : #{{ $anim->color }};">Tipo</dt><dd>{{$anim->tipo()}}</dd>
						<dt style="color : #{{ $anim->color }};">Link </dt><dd> <a href="{{$anim->link }}" style="color : #fff; text-shadow: 0px 1px 2px rgba(0,0,0,.3);">Ir <i class="fa fa-arrow-right"></i></a></dd>
					</dl>
				</div>
				<div class="col-md-3 ">
					<div id="galeria-icon">
						@if($anim->img_concept)
							<a href="{{ asset('uploads/works/'.$anim->img_concept)}}" data-lightbox="image-1" data-title="{{ $anim->titulo }}">
								<img src="{{ asset('uploads/works/thumb_'.$anim->img_concept)}}" >
							</a>
						@endif
						@if($anim->img_vertical)
							 <a href="{{ asset('uploads/works/'.$anim->img_vertical)}}" data-lightbox="image-1" data-title="{{ $anim->titulo }}">
							 	<img src="{{ asset('uploads/works/thumb_'.$anim->img_vertical) }}" >
							 </a>
						@endif
						@if($anim->img_square)
							<a href="{{ asset('uploads/works/'.$anim->img_square)}}" data-lightbox="image-1" data-title="{{ $anim->titulo }}">
								<img src="{{ asset('uploads/works/thumb_'.$anim->img_square)}}">
							</a>
						@endif
					</div>
				</div>		
			</div>
		</div>

	</div>

	@if($anim->link_youtube)
		<div class="section section-body">
			<div class="container">
				<div class="row">
					<div class=" col-md-12"> 
						<!-- 16:9 aspect ratio -->
						<div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px;overflow: hidden;">
						  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $anim->link_youtube }}?color=white&controls=1" frameborder="0"></iframe>
						</div>
					 </div>
				</div>
			</div>
		</div>
	@endif


	<div hidden class="section section-footer">
		
	</div>

</div>
@stop