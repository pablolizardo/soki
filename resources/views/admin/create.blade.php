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
	{!! Form::open(['action'=>'WorkController@store', 'files' => true, 'method' => 'POST']) !!} 
	{!! Form::token() !!}

		<div class="row">
			
			<div class="col-xs-2">
				{!! Form::label('tipo') !!}
				<?php $tipos = ['0'=>'App', '1'=>'Animacion', '2'=>'Diseño'] ?>
				{!! Form::select('tipo', $tipos, null, ['class'=>'input-lg form-control']) !!}
			</div>
			<div class="col-xs-9">
				{!! Form::label('titulo') !!}
				{!! Form::text("titulo", null,['class'=>'input-lg form-control']) !!}
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
	<div class="row">
		<div class="col-xs-12">
			{!! Form::label('Contenido') !!}<br>
			<div class="btn-group">
				<button type="button" onclick="negrita()" class="btn btn-default"><i class="fa fa-bold"></i></button>
				<button type="button" onclick="link()" class="btn btn-default"><i class="fa fa-link"></i></button>
				<button type="button" onclick="breakline()" class="btn btn-default"><i class="fa fa-long-arrow-down"></i></button>
			</div>
			<br>
			<br>
			{!! Form::textarea('descripcion', null, ['rows'=>'7', 'class'=>'input-lg form-control', 'id' => 'descripcion']) !!}
		</div>
		
	</div>
	<br>
	<div class="row">
		
		<div class="col-xs-12">
			{!! Form::submit('Publicar', ['class'=>'input-lg form-control btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}


	
@stop