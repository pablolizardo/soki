@extends('layouts.app')

@section('scripts')
	<script>
	    lightbox.option({
	      'resizeDuration': 200,
	      'wrapAround': true
	    })
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
					<p>
						{!! html_entity_decode($app->descripcion) !!}
					</p>
				</div>
				<div class="hidden-xs hidden-sm hidden-md col-lg-4 ">
					@if($app->attachment) {!! $app->attachmentBadge($app->attachment) !!} @endif
					<dl class="mb-3">
						<dt style="color: #{{ $app->color}};">Cliente</dt><dd>{{$app->cliente}}</dd>
						<dt style="color: #{{ $app->color}};">Año</dt><dd>{{$app->año}}</dd>
						<dt style="color: #{{ $app->color}};">Tipo</dt><dd>{{$app->tipo()}}</dd>
						<dt style="color: #{{ $app->color}};">Link</dt><dd> <a href="{{$app->link }}" >Ir <i class="fa fa-arrow-right"></i></a></dd>
					</dl>
					<div id="galeria-icon" class=" ml-3 mb-5">
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
					
				</div>		
			</div>
		</div> {{-- fin container --}}
	</div>
	
	@if($app->img_concept) 
	<div class="section section-footer">
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
</div>
@stop