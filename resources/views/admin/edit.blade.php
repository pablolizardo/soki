@extends('layouts.admin')
@section('form')

	<script>
		loremText = 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.?Por qué lo usamos?  Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". ';
			function lorem(){
				document.getElementById('titulo').value = 		document.getElementById('titulo').value 		==	"" ? 'Nombre del trabajo' 	: document.getElementById('titulo').value;
				document.getElementById('descripcion').value =	document.getElementById('descripcion').value 	== 	"" ? loremText 				: document.getElementById('descripcion').value;
				document.getElementById('cliente').value = 		document.getElementById('cliente').value 		==	"" ? 'TVFUEGO' 	: document.getElementById('cliente').value;
				document.getElementById('año').value = 			document.getElementById('año').value 			==	"" ? '2016' 	: document.getElementById('año').value;
				document.getElementById('link').value = 		document.getElementById('link').value 			==	"" ? 'www.soki.com.ar' 	: document.getElementById('link').value;
				document.getElementById('link_youtube').value = document.getElementById('link_youtube').value 	==	"" ? 'fdXwf342ds' 	: document.getElementById('link_youtube').value;
			}
		</script>
	{!! Form::model($work,['action'=>['WorkController@update',$work->id], 'files' => true, 'method' => 'PATCH']) !!} 
	{!! Form::token() !!}

		<div class="row">
			
			<div class="col-xs-2">
				{!! Form::label('tipo') !!}
				<?php $tipos = ['0'=>'App', '1'=>'Animacion', '2'=>'Diseño'] ?>
				{!! Form::select('tipo', $tipos, null, ['class'=>'input-lg form-control']) !!}
			</div>
			<div class="col-xs-8">
				{!! Form::label('titulo') !!}
				{!! Form::text("titulo", null,['class'=>'input-lg form-control']) !!}
			</div>
			<div class="col-xs-1 text-center">
				{!! Form::label('Color') !!}
				{!! Form::text('color',  null, ['class'=>'input-lg form-control jscolor','style'=>'text-indent:-1093px;cursor: pointer;']) !!}
			</div>
			<div class="col-xs-1 text-center">
				{!! Form::label('Lorem') !!}
				<button type="button" onclick="lorem();" class="input-lg  form-control"><i class="fa fa-magic"></i></button>
			</div>

		</div>
<br>
		
	<div class="row">
		
		<div class="col-xs-3">
			{!! Form::label('cliente') !!}
			{!! Form::text("cliente", null,['class'=>'input-lg form-control']) !!}
		</div>
		<div class="col-xs-2">
			{!! Form::label('año') !!}
			{!! Form::text("año", null,['class'=>'input-lg form-control']) !!}
		</div>
		
		<div class="col-xs-4">
			{!! Form::label('link') !!}
			{!! Form::text("link", null,['class'=>'input-lg form-control']) !!}
		</div>
		<div class="col-xs-3">
			{!! Form::label('link_youtube') !!}
			{!! Form::text("link_youtube", null,['class'=>'input-lg form-control']) !!}
		</div>
	</div>
<br>
	<div class="row">
		<div class="col-xs-4">
			{!! Form::label('img_square','Imagen Cuadrada (240x240)') !!}
			{!! Form::file('img_square', ['class'=>'input-lg form-control']) !!}
		</div>
		<div class="col-xs-4">
			{!! Form::label('img_vertical','Imagen Vertical  (640x360)') !!}
			{!! Form::file('img_vertical', ['class'=>'input-lg form-control']) !!}
		</div>
		<div class="col-xs-4">
			{!! Form::label('img_horizontal','Imagen Horizontal (1280x800)') !!}
			{!! Form::file('img_horizontal', ['class'=>'input-lg form-control']) !!}
		</div>
	</div>
<br>
	<div class="row text-center" style="border: 1px solid #{{ $work->color }};border-radius:10px; background-color: $work->color ;background-image: url({{ url('uploads/works').'/blur_'.$work->img_square}}); background-position: center; background-size: cover;padding-top:20px; padding-bottom: 10px; ">
		<div class="col-xs-4">
			@if ($work->img_square)
				<br>
				<img src="{{ asset( 'uploads/works/'.$work->img_square)}}" class=" img-rounded" height="100px">
				<p class="" style="color :#fff!important;">300x300px</p>
			@else 
				<p class="" style="color :#fff!important;">Sin Imagen</p>
			@endif
		</div>
		<div class="col-xs-4">
			@if ($work->img_vertical)
				<img src="{{ asset( 'uploads/works/'.$work->img_vertical)}}" class=" img-rounded" height="150px">
				<p class="" style="color :#fff!important;">640x360px</p>
			@else 
				<p class="" style="color :#fff!important;">Sin Imagen</p>
			@endif
		</div>
		<div class="col-xs-4">
			@if ($work->img_horizontal)
				<img src="{{ asset( 'uploads/works/'.$work->img_horizontal)}}" class=" img-rounded" height="150px">
				<p class="" style="color :#fff!important;">1280x800px</p>
			@else 
				<p class="" style="color :#fff!important;">Sin Imagen</p>
			@endif
		</div>
	</div>
<br>
	<div class="row">
		<div class="col-xs-12">
			{!! Form::label('descripcion') !!}
			{!! Form::textarea('descripcion', null, ['rows'=>'7', 'class'=>'input-lg form-control']) !!}
		</div>
		
	</div>
	<br>
	<div class="row">
		
		<div class="col-xs-12">
			{!! Form::submit('Actualizar', ['class'=>'input-lg form-control btn-warning']) !!}
		</div>
	</div>

	{!! Form::close() !!}


	
@stop