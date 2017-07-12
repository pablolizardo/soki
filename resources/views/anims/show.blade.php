@extends('layouts.app')


@section('content')

<div class="single single-anims">
			
	<div class="section section-head" style="background-image: url({{ url('uploads/works').'/blur_'.$anim->img_square}})">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 style="font-size:5em;font-weight:100!important;">{{ $anim->titulo }}</h1>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="app-wrap">
						<div class="app-icon" style="background-image: url({{ url('uploads/works').'/'.$anim->img_horizontal}}); width:100%;height: 400px;"> 
							<div class="filmstrip"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-9">
					<p class="lead" > {{  $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $anim->descripcion) }} </p>
					<p>{!! html_entity_decode($anim->descripcion) !!}</p>
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
		<div class="container">
			<div class="row">
				<div class="col-md-3"> <img src="{{ asset('uploads/works').'/'.$anim->img_vertical}}" class="app img-rounded img-fluid"> </div>
				<div class="col-md-9"> 
				
					<!-- 16:9 aspect ratio -->
					<div class="embed-responsive embed-responsive-16by9" style="border-radius: 10px;overflow: hidden;">
					  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $anim->link_youtube }}?color=white&controls=1" frameborder="0"></iframe>
					</div>
				 </div>
			</div>
		</div>
	</div>

	<div class="section section-footer">
		
	</div>

</div>
@stop