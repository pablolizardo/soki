@extends('layouts.app')

@section('metadata')
	<!-- Update your html tag to include the itemscope and itemtype attributes. -->
	{{-- <html itemscope itemtype="http://schema.org/Article"> --}}

	<!-- Place this data between the <head> tags of your website -->
	<meta name="description" content="{{ $diseno->titulo }} - {{ $diseno->cliente}} - {{ $diseno->descripcion }}" />

	<!-- Google Authorship and Publisher Markup -->
	<link rel="author" href="https://plus.google.com/+SokistudioArg/posts"/>
	<link rel="publisher" href="https://plus.google.com/+SokistudioArg"/>

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="{{ $diseno->titulo }} - {{ $diseno->cliente}}">
	<meta itemprop="description" content="{{ $diseno->descripcion }}">
	<meta itemprop="image" content="{{ asset('uploads/works/'.$diseno->img_horizontal) }}">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@sokistudio">
	<meta name="twitter:creator" content="@pablolizardo">

	<meta name="twitter:title" content="{{ $diseno->titulo }} - {{ $diseno->cliente}}">
	<meta name="twitter:description" content="@if($diseno->descripcion != "" ) {{ $diseno->descripcion}} @else Soki Studio 2017 @endif">
	<meta name="twitter:text:description" content="@if($diseno->descripcion != "" ) {{ $diseno->descripcion}} @else Soki Studio 2017 @endif">

	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image" content="{{ asset('uploads/works/'.$diseno->img_horizontal)}}">
	<meta name="twitter:image:src" content="{{ asset('uploads/works/'.$diseno->img_horizontal)}}">

	<!-- Open Graph data -->
	<meta property="og:title" content="{{ $diseno->titulo }} - {{ $diseno->cliente}}" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ Request::url() }}" />
	<meta property="og:image" content="{{ asset('uploads/works/'.$diseno->img_horizontal) }}" />
		<meta property="og:image:width" content="1280" />
		<meta property="og:image:height" content="800" />
	<meta property="og:video" content="https://www.youtube.com/embed/{{ $diseno->link_youtube }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />
	<meta property="og:description" content="{{ $diseno->descripcion }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />
	<meta property="article:published_time" content="{{ $diseno->created_at }}" />
	<meta property="article:modified_time" content="{{ $diseno->updated_at }}" />
	<meta property="article:section" content="{{ $diseno->titulo }}" />
	<meta property="article:tag" content="{{ $diseno->tipo() }}" />
	<meta property="fb:admins" content="208715565813337" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:locale:alternate" content="en_GB" />
@stop

@section('title')
 | {{ $diseno->titulo }} - {{ $diseno->cliente}}
@stop


@section('content')

<div id="single ">
			

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="display-1" style="color: #{{ $diseno->color}};">
					{{ $diseno->titulo }}
				</h1>
				<p class="lead" >
					{{    $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $diseno->descripcion) }}
					<small style="color : #{{ $diseno->color}} ">@if (Auth::check()) <a href="{{ action('WorkController@edit',$diseno->id) }}">Editar</a> @endif </small>

				</p>
			</div>
		</div>
	</div>
		
	<br>


	<div class="section section-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-4 col-md-6 col-lg-4">
					<div class="single-dis-cover" style="background-image: url({{ url('uploads/works').'/'.$diseno->img_vertical}}); "></div>
				</div>
				<div class="col-md-12 col-sm-8 col-md-6 col-lg-8">
					<dl class="row">
						<dt class="col-md-1 mt-0" style="color: #{{ $diseno->color}};">Cliente</dt>
						<dd class="col-md-4 mt-0">{{$diseno->cliente}}</dd>
						<dt class="col-md-1 mt-0" style="color: #{{ $diseno->color}};">Año</dt>
						<dd class="col-md-1 mt-0">{{$diseno->año}}</dd>
						<dt class="col-md-1 mt-0" style="color: #{{ $diseno->color}};">Link</dt>
						<dd class="col-md-1 mt-0"><a href="{{$diseno->link }}" style="color :{{ $diseno->color }}">Ir <i class="fa fa-arrow-right"></i></a></dd>
					</dl>
					<p> 
						{{-- @if ($diseno->img_square) 
				 			<img src="{{ asset('uploads/works').'/'.$diseno->img_square }}" class=" rounded float-right ml-5" id="dis_img_square"> 
				 		@endif --}}
				 		<div id="galeria-icon" class="float-right ml-3 mb-5">
							@if($diseno->img_concept)
								<a href="{{ asset('uploads/works/'.$diseno->img_concept)}}" data-lightbox="image-1" data-title="{{ $diseno->titulo }}">
									<img src="{{ asset('uploads/works/thumb_'.$diseno->img_concept)}}" >
								</a>
							@endif
							@if($diseno->img_vertical)
								 <a href="{{ asset('uploads/works/'.$diseno->img_vertical)}}" data-lightbox="image-1" data-title="{{ $diseno->titulo }}">
								 	<img src="{{ asset('uploads/works/thumb_'.$diseno->img_vertical) }}" >
								 </a>
							@endif
							@if($diseno->img_square)
								<a href="{{ asset('uploads/works/'.$diseno->img_square)}}" data-lightbox="image-1" data-title="{{ $diseno->titulo }}">
									<img src="{{ asset('uploads/works/thumb_'.$diseno->img_square)}}">
								</a>
							@endif
						</div>
				 		{!! html_entity_decode($diseno->descripcion) !!} 
				 	</p>
					
				    @if($diseno->attachment) 
					     {!! $diseno->attachmentBadge($diseno->attachment) !!} 
				    @endif
					
				</div>		
			</div>	
		</div>
	</div>

	@if($diseno->link_youtube)
		<div class="section section-body">
			<div class="container">
				<div class="row">
					<div class=" col-md-12"> 
						<!-- 16:9 aspect ratio -->
						<div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px;overflow: hidden;">
						  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $diseno->link_youtube }}?color=white&controls=1" frameborder="0"></iframe>
						</div>
					 </div>
				</div>
			</div>
		</div>
	@endif


</div>
@stop