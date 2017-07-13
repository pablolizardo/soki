@extends('layouts.app')


@section('content')

<div class="single single-anims">
			
	<div class="section section-head" style="background-image: url({{ url('uploads/works').'/blur_'.$anim->img_square}})">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 style="font-size:5em;font-weight:100!important;">{{ $anim->titulo }}</h1>
					 @if (Auth::check()) <a href="{{ action('WorkController@edit',$anim->id) }}">Editar</a> @endif
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
				<div class="col-sm-12 col-md-7">
					<p class="lead" > {{  $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $anim->descripcion) }} </p>
					<p><img src="{{ url('uploads/works').'/'.$anim->img_concept}}" id="img_concept">{!! html_entity_decode($anim->descripcion) !!}</p>
				</div>
				<div class="hidden-xs hidden-sm col-md-2">
					<dl class=" ">
						<dt style="color : #{{ $anim->color }};">Cliente</dt><dd>{{$anim->cliente}}</dd>
						<dt style="color : #{{ $anim->color }};">Año</dt><dd>{{$anim->año}}</dd>
						<dt style="color : #{{ $anim->color }};">Tipo</dt><dd>{{$anim->tipo()}}</dd>
						<dt style="color : #{{ $anim->color }};">Link </dt><dd> <a href="{{$anim->link }}" style="color : #fff; text-shadow: 0px 1px 2px rgba(0,0,0,.3);">Ir <i class="fa fa-arrow-right"></i></a></dd>
					</dl>
				</div>
				<div class="col-md-3">
					<img src="{{ url('uploads/works').'/'.$anim->img_square}}" class="img-fluid rounded">
				</div>		
			</div>
		</div>

	</div>

	<div class="section section-body">
		<div class="container">
			<div class="row">
				<div class="col-md-3"> <img src="{{ asset('uploads/works').'/'.$anim->img_vertical}}" class="app rounded img-fluid"> </div>
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