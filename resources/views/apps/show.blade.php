@extends('layouts.app')


@section('body')

<div id="single">
	<section class="apps" style="background: {{ $app->color}};background-size: cover; background-position: center; background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})">
		
		<div class="container ">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 app" >
				
				<figure style="background-image: url({{ url('uploads/works').'/'.$app->img_square}}); width: 300px; height: 300px;"> </figure>
				<h1>{{ $app->titulo }}</h1>
			</div>
			<div class="hidden-xs hidden-sm col-md-3" style="">
			<br>
			<br>
			<br>
				<img class="market_buttons" src="{{ asset('img/markets/markets.png')}}" > <br>
			</div>
		</div>

	</section>

	<section class="anims">
		<div class="container">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 " style="position: relative;">
				<div class="app_bg" style="background-image: url({{ url('uploads/works').'/blur_'.$app->img_square}})"></div>
				<figure class="app_icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}}); " > </figure>
				<img class="app_fg" src="{{ asset('img/devices/iphone.png') }}" >
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
				<p class="lead" style="color: {{ $app->color}};">
					{{    $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $app->descripcion) }}
				</p>
				<p>{{$app->descripcion}}</p>
			</div>
			<div class="hidden-xs hidden-sm hidden-md col-lg-4 ">
				<dl class="">
					<dt>Cliente</dt><dd>{{$app->cliente}}</dd>
					<dt>Año</dt><dd>{{$app->año}}</dd>
					<dt>Tipo</dt><dd>{{$app->tipo()}}</dd>
					<dt>Link</dt><dd>{{$app->link }}</dd>
				</dl>
			</div>		</div>
	</section>

	<section class="diseños">
	
	</section>
</div>
@stop