@extends('layouts.app')


@section('body')

<div class="single single-anims">
			
	<div class="section section-head" style="background-image: url({{ url('uploads/works').'/blur_'.$anim->img_square}})">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h1 style="font-size:5em;font-weight:100!important;">{{ $anim->titulo }}</h1>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="app-wrap">
						<div class="app-icon" style="background-image: url({{ url('uploads/works').'/'.$anim->img_square}}); width:100%;height: 400px;"> 
							<div class="filmstrip"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-9">
					<p class="lead" > {{  $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $anim->descripcion) }} </p>
					<p>{{$anim->descripcion}}</p>
				</div>
				<div class="hidden-xs hidden-sm col-md-3">
					<dl class=" text-right">
						<dt>Cliente</dt><dd>{{$anim->cliente}}</dd>
						<dt>Año</dt><dd>{{$anim->año}}</dd>
						<dt>Tipo</dt><dd>{{$anim->tipo()}}</dd>
						<dt>Link</dt><dd>{{$anim->link }}</dd>
					</dl>
				</div>		
			</div>
		</div>

	</div>

	<div class="section section-body">
	
	</div>

	<div class="section section-footer">
	
	</div>

</div>
@stop