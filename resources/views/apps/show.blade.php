@extends('layouts.app')

@section('metadata')
	<!-- Update your html tag to include the itemscope and itemtype attributes. -->
	{{-- <html itemscope itemtype="http://schema.org/Article"> --}}

	<!-- Place this data between the <head> tags of your website -->
	<meta name="description" content="{{ $app->titulo }} - {{ $app->cliente}} - {{ $app->descripcion }}" />

	<!-- Google Authorship and Publisher Markup -->
	<link rel="author" href="https://plus.google.com/+SokistudioArg/posts"/>
	<link rel="publisher" href="https://plus.google.com/+SokistudioArg"/>

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="{{ $app->titulo }} - {{ $app->cliente}}">
	<meta itemprop="description" content="{{ $app->descripcion }}">
	<meta itemprop="image" content="{{ asset('uploads/works/'.$app->img_horizontal) }}">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@sokistudio">
	<meta name="twitter:creator" content="@pablolizardo">

	<meta name="twitter:title" content="{{ $app->titulo }} - {{ $app->cliente}}">
	<meta name="twitter:description" content="@if($app->descripcion != "" ) {{ $app->descripcion}} @else Soki Studio 2017 @endif">
	<meta name="twitter:text:description" content="@if($app->descripcion != "" ) {{ $app->descripcion}} @else Soki Studio 2017 @endif">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image" content="{{ asset('uploads/works/'.$app->img_square)}}">
	<meta name="twitter:image:src" content="{{ asset('uploads/works/'.$app->img_square)}}">

	<!-- Open Graph data -->
	<meta property="og:title" content="{{ $app->titulo }} - {{ $app->cliente}}" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ Request::url() }}" />
	<meta property="og:image" content="{{ asset('uploads/works/'.$app->img_horizontal) }}" />
		<meta property="og:image:width" content="1280" />
		<meta property="og:image:height" content="800" />
	<meta property="og:video" content="https://www.youtube.com/embed/{{ $app->link_youtube }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />
	<meta property="og:description" content="{{ $app->descripcion }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />
	<meta property="article:published_time" content="{{ $app->created_at }}" />
	<meta property="article:modified_time" content="{{ $app->updated_at }}" />
	<meta property="article:section" content="{{ $app->titulo }}" />
	<meta property="article:tag" content="{{ $app->tipo() }}" />
	<meta property="fb:admins" content="208715565813337" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:locale:alternate" content="en_GB" />
@stop

@section('title')
 | {{ $app->titulo }} - {{ $app->cliente}}
@stop

@section('scripts')
	<script>
	    lightbox.option({
	      'resizeDuration': 100,
	      'wrapAround': true
	    })
	</script>

	<script type="application/ld+json">
		{
		  "@context": "http://schema.org",
		  "@type": "NewsArticle",
		  "mainEntityOfPage": {
		    "@type": "WebPage",
		    "@id": "https://google.com/article"
		  },
		  "headline": "{{ $app->titulo }}",
		  "image": {
		    "@type": "ImageObject",
		    "url": "{{ url('uploads/works').'/'.$app->img_horizontal}}",
		    "height": 1280,
		    "width": 800
		  },
		  "datePublished": "{{ $app->created_at }}",
		  "dateModified": "{{ $app->updated_at }}",
		  "author": {
		    "@type": "Person",
		    "name": "Pablo Lizardo"
		  },
		   "publisher": {
		    "@type": "Organization",
		    "name": "Soki Studio",
		    "logo": {
		      "@type": "ImageObject",
		      "url": "{{ url('uploads/works').'/'.$app->img_square }}",
		      "width": 300,
		      "height": 300
		    }
		  },
		  "description": "{{ $app->descripcion }}"
		}
		</script>

@stop

@section('content')
	<div class="single">
		<div class="section section-head" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}}); border-bottom: 3px solid #{{ $app->color }};">
			<div class="container">
				<div class="row" >
					<div class="col-md-6 offset-md-3 " >
						<div class="app-wrap">
							<div class="app-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}}); "> </div>
							<h1 class="app-title" >{{ $app->titulo }}</h1>  
							@if (Auth::check()) <a href="{{ action('WorkController@edit',$app->id) }}">Editar</a> @endif
						</div>
					</div>
					<div class="hidden-xs hidden-sm col-md-3" >
						@if($app->stores == 1)
							<img class="market-buttons" src="{{ asset('img/markets/markets.png')}}" > <br>
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="section section-body" style="border-bottom: 1px solid #{{ $app->color}};">
			<div class="container">
				<div class="row">
					@if($app->img_vertical)
						<div class="col-md-12 col-sm-6 col-md-6 col-lg-4 " >
							<div class="iphone-wrap">
								<div class="iphone-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
								<div class="iphone-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_vertical}})"> </div>
								<div class="iphone-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
								<img class="iphone-device" src="{{ asset('img/devices/iphone.png') }}" >
							</div>
						</div>
					@endif
					<div class="@if($app->img_vertical) col-md-12 col-sm-6 col-md-6 col-lg-4 @else col-md-12 col-sm-12 col-md-12 col-lg-8  @endif ">
						<dl class="">
							<dt class="" style="color: #{{ $app->color}};">Cliente</dt>
							<dd class="">{{$app->cliente}}</dd>
							<dt class="" style="color: #{{ $app->color}};">Año</dt>
							<dd class="">{{$app->año}}</dd>
							<dt class="" style="color: #{{ $app->color}};"><a href="{{$app->link }}" >Link  <i class="fa fa-arrow-right"></i></a></dt>
						</dl>
						<p> {!! html_entity_decode($app->descripcion) !!} </p>
						
					</div>
					<div class="hidden-xs hidden-sm hidden-md col-lg-4 ">
					<div id="galeria-icon" class=" ml-3 mb-5 mt-0" style="top:-10px; left: -10px;">
							@if($app->img_concept)
								<a href="{{ asset('uploads/works/'.$app->img_concept)}}" data-lightbox="image-1" data-title="{{ $app->titulo }}">
									<img src="{{ asset('uploads/works/thumb_'.$app->img_concept)}}" >
								</a>
							@endif
							@if($app->img_vertical)
								 <a href="{{ asset('uploads/works/'.$app->img_vertical)}}" data-lightbox="image-1" data-title="{{ $app->titulo }}">
								 	<img src="{{ asset('uploads/works/thumb_'.$app->img_vertical) }}" >
								 </a>
							@endif
							@if($app->img_square)
								<a href="{{ asset('uploads/works/'.$app->img_square)}}" data-lightbox="image-1" data-title="{{ $app->titulo }}">
									<img src="{{ asset('uploads/works/thumb_'.$app->img_square)}}">
								</a>
							@endif
						</div>

						@if($app->attachment) {!! $app->attachmentBadge($app->attachment) !!} @endif
						<br>
						{{-- FACEBOOK --}}
						<div class="mb-2 mt-2">
							<div class="fb-share-button" data-href="{{ Request::url() }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div> <br>
						</div>
						{{-- TWITTER --}}
						<a href="https://twitter.com/share" class="twitter-share-button " data-via="sokistudio" data-size="large" data-related="pablolizardo" data-hashtags="blenderinkscape">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						<dl class="mb-3" hidden="">
							<dt style="color: #{{ $app->color}};">Cliente</dt><dd>{{$app->cliente}}</dd>
							<dt style="color: #{{ $app->color}};">Año</dt><dd>{{$app->año}}</dd>
							<dt style="color: #{{ $app->color}};">Tipo</dt><dd>{{$app->tipo()}}</dd>
							<dt style="color: #{{ $app->color}};">Link</dt><dd> <a href="{{$app->link }}" >Ir <i class="fa fa-arrow-right"></i></a></dd>
						</dl>
						
						
					</div>		
				</div>
			</div> {{-- fin container --}}
		</div>
		
		@if($app->img_concept) 
			<div class="section section-footer" style="@if($app->link_youtube)  margin-bottom: -90px; @endif">
				<div class="container">

					<div class="row">
						<div class="col-md-12 text-center" >
							@if( $app->device == 0) 
								<div class="mockup-wrap mockup-macbook">
									<div class="mockup-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
									<div class="mockup-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_horizontal}})"> </div>
									<div class="mockup-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
									<div class="mockup-device" ></div>
								</div>
							@endif
							@if( $app->device == 1) 
								<div class="mockup-wrap mockup-imac">
									<div class="mockup-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
									<div class="mockup-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_horizontal}})"> </div>
									<div class="mockup-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
									<div class="mockup-device" ></div>
								</div>
							@endif
							@if( $app->device == 2) 
								<div class="mockup-wrap mockup-ipad">
									<div class="mockup-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
									<div class="mockup-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_horizontal}})"> </div>
									<div class="mockup-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
									<div class="mockup-device" ></div>
								</div>
							@endif
							@if( $app->device == 3) 
								<div class="mockup-wrap mockup-tv">
									<div class="mockup-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
									<div class="mockup-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_horizontal}})"> </div>
									<div class="mockup-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
									<div class="mockup-device" ></div>
								</div>
							@endif
							@if( $app->device == 4) 
								<div class="mockup-wrap mockup-iphone">
									<div class="mockup-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
									<div class="mockup-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_horizontal}})"> </div>
									<div class="mockup-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
									<div class="mockup-device" ></div>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		@endif


		@if($app->link_youtube)
			<div class="section section-body">
				<div class="container">
					<div class="row">
						<div class=" col-md-12"> 
							<!-- 16:9 aspect ratio -->
							<div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px;overflow: hidden;">
							  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $app->link_youtube }}?color=white&controls=1" frameborder="0"></iframe>
							</div>
						 </div>
					</div>
				</div>
			</div>
		@endif


	</div>
@stop