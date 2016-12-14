@extends('layouts.app')


@section('body')

<div id="single ">
			

	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1 class="display-1" style="color: {{ $diseno->color}};">{{ $diseno->titulo }}</h1>
				<p class="lead" >
					{{    $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $diseno->descripcion) }}
				</p>
			</div>
		</div>
	</div>
		
	<br>

	<div class="section section-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4">
					<div class="single-dis-cover" style="background-image: url({{ url('uploads/works').'/'.$diseno->img_square}}); "></div>
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
		</div>
	</div>

</div>
@stop