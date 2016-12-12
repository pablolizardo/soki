@extends('layouts.app')


@section('body')

<div id="single single_anims">
			

<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<h1 style="font-size:5em;font-weight:100!important;color: {{ $anim->color}};">{{ $anim->titulo }}</h1>
		</div>
	</div>
</div>
<br>
	<section class="apps" style="background: {{ $anim->color}};">
		
		<div class="container app ">
			<figure style="background-image: url({{ url('uploads/works').'/'.$anim->img_square}}); width: 600px; height: 300px;"> <div class="filmstrip"></div></figure>
		</div>

	</section>

	<section class="anims">
		<div class="container">
			<div class="col-xs-8">
				<p class="lead" style="color: {{ $anim->color}};">
					{{    $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $anim->descripcion) }}
				</p>
				<p>{{$anim->descripcion}}</p>
			</div>
			<div class="col-xs-4">
				<dl class="dl-horizontal">
					<dt>Cliente</dt><dd>{{$anim->cliente}}</dd>
					<dt>Año</dt><dd>{{$anim->año}}</dd>
					<dt>Tipo</dt><dd>{{$anim->tipo()}}</dd>
					<dt>Link</dt><dd>{{$anim->link }}</dd>
				</dl>
			</div>		</div>
	</section>

	<section class="diseños">
	
	</section>
</div>
@stop