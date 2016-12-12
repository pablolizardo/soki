@extends('layouts.app')


@section('body')

<div id="single ">
			

<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<h1 style="font-size:6em;font-weight:100!important;color: {{ $diseno->color}};">{{ $diseno->titulo }}</h1>
			<p class="lead" >
				{{    $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $diseno->descripcion) }}
			</p>
			<hr style="border-color: {{ $diseno->color}};">
		</div>
	</div>
</div>
		


		<div class="container">
			
			<div class="col-xs-4">
				<figure class="single-dis-cover" style="background-image: url({{ url('uploads/works').'/'.$diseno->img_square}}); "></figure>
			</div>
			<div class="col-xs-5">
				
				<p>{{$diseno->descripcion}}</p>
			</div>
			<div class="col-xs-2">
				<dl class="">
					<dt>Cliente</dt><dd>{{$diseno->cliente}}</dd>
					<dt>Año</dt><dd>{{$diseno->año}}</dd>
					<dt>Tipo</dt><dd>{{$diseno->tipo()}}</dd>
					<dt>Link</dt><dd>{{$diseno->link }}</dd>
				</dl>

				<img src="{{ url('uploads/works').'/'.$diseno->img_square}}" class="img-thumbnail img-responsive"><br>
				<img src="{{ url('uploads/works').'/'.$diseno->img_square}}" class="img-thumbnail img-responsive"><br>
				<img src="{{ url('uploads/works').'/'.$diseno->img_square}}" class="img-thumbnail img-responsive">
			</div>		
		</div>

	<section class="diseños">
	
	</section>
</div>
@stop