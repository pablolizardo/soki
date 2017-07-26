@extends('layouts.app')

@section('metadata')
	{!! $app->metadata() !!}
@stop

@section('title')
 | {{ $app->titulo }} - {{ $app->cliente}}
@stop

@section('scripts')
	<script>
	    lightbox.option({
	      'resizeDuration': 100,
	      'wrapAround': true
	    });


		function isElementInViewport(elem) {
		    var $elem = $(elem);

		    // Get the scroll position of the page.
		    var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
		    var viewportTop = $(scrollElem).scrollTop();
		    var viewportBottom = viewportTop + $(window).height();

		    // Get the position of the element on the page.
		    var elemTop = Math.round( $elem.offset().top );
		    var elemBottom = elemTop + $elem.height();

		    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
		}

		// Check if it's time to start the animation.
		function checkAnimation() {
		    var $iphone = $('.iphone-icon');
		    if (isElementInViewport($iphone)) {
		        $('.iphone-wrap .iphone-icon').addClass('anim-appIcon');
		        $('.iphone-wrap .iphone-screen').addClass('anim-appScreen');
		    } else {
		        $('.iphone-wrap .iphone-icon').removeClass('anim-appIcon');
		        $('.iphone-wrap .iphone-screen').removeClass('anim-appScreen');
		    }

		    var $mockupIcon = $('.mockup-icon');
		    if (isElementInViewport($mockupIcon)) {
		        $('.mockup-icon').addClass('anim-appIcon');
		        $('.mockup-screen').addClass('anim-appScreen');
		    } else {
		        $('.mockup-icon').removeClass('anim-appIcon');
		        $('.mockup-screen').removeClass('anim-appScreen');
		    }

		    
		}

		window.addEventListener('load',function() {
			$(window).scroll(function(){
			      checkAnimation();
			  });
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
						{!! $app->details() !!}
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
						
						{!! $app->socialButtons() !!}
						
						
					</div>		
				</div>
			</div> {{-- fin container --}}
		</div>
		
		@if($app->img_concept) 
			<div class="section section-footer" style="@if($app->link_youtube) margin-bottom: -90px; @endif">
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