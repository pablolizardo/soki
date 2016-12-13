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
			
			<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4">
				<figure class="single-dis-cover" style="background-image: url({{ url('uploads/works').'/'.$diseno->img_square}}); "></figure>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
				
				<p>{{$diseno->descripcion}}</p>
			</div>
			<div class="hidden-xs hidden-sm hidden-md col-lg-3">
				<dl class="">
					<dt>Cliente</dt><dd>{{$diseno->cliente}}</dd>
					<dt>Año</dt><dd>{{$diseno->año}}</dd>
					<dt>Tipo</dt><dd>{{$diseno->tipo()}}</dd>
					<dt>Link</dt><dd>{{$diseno->link }}</dd>
				</dl>

				
			</div>		
		</div>

	<section class="diseños">
	
	</section>
</div>
@stop