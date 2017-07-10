@extends('layouts.app')


@section('body')

<div class="single">
	<div class="section section-head" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})">
		
		<div class="container ">
			<div class="row">
				<div class="col-md-6 offset-md-3 " >
					<div class="app-wrap">
						<div class="app-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}}); "> </div>
						<h1 class="app-title" >{{ $app->titulo }}</h1>
					</div>
				</div>
				<div class="hidden-xs hidden-sm col-md-3" >
					<img class="market-buttons" src="{{ asset('img/markets/markets.png')}}" > <br>
				</div>
			</div>
		</div>

	</div>

	<div class="section section-body" style="border-bottom: 1px solid #{{ $app->color}};">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12 col-sm-6 col-md-6 col-lg-4 " >
					<div class="iphone-wrap">
						<div class="iphone-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
						<div class="iphone-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_vertical}})"> </div>
						<div class="iphone-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
						<img class="iphone-device" src="{{ asset('img/devices/iphone.png') }}" >
					</div>
				</div>
				<div class="col-md-12 col-sm-6 col-md-6 col-lg-4 ">
					<p>
						{!! html_entity_decode($app->descripcion) !!}
					</p>
				</div>
				<div class="hidden-xs hidden-sm hidden-md col-lg-4 ">
					<dl class="">
						<dt style="color: #{{ $app->color}};">Cliente</dt><dd>{{$app->cliente}}</dd>
						<dt style="color: #{{ $app->color}};">Año</dt><dd>{{$app->año}}</dd>
						<dt style="color: #{{ $app->color}};">Tipo</dt><dd>{{$app->tipo()}}</dd>
						<dt style="color: #{{ $app->color}};">Link</dt><dd>{{$app->link }}</dd>
					</dl>
				</div>		
			</div>
		</div> {{-- fin container --}}
	</div>

	<div class="section section-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12" >
					<div class="macbook-wrap">
						<div class="macbook-wallpaper" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
						<div class="macbook-screen" style="background-image: url({{ url('uploads/works').'/'.$app->img_horizontal}})"> </div>
						<div class="macbook-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}})"> </div>
						<div class="macbook-device" ></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop