@extends('layouts.app')


@section('body')

<div id="single">
	<section class="apps">
		
		<div class="container app">
			<figure style="background-image: url({{ url('uploads/works').'/'.$app->img_square}}); width: 300px; height: 300px;"> </figure>
			<h1>{{ $app->titulo }}</h1>
		</div>

	</section>

	<section class="anims">
		<div class="container">
			<div class="col-xs-8">
				<p class="lead">
					{{ $app->descripcion }}
				</p>
			</div>
			<div class="col-xs-4">
				<dl class="dl-horizontal">
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