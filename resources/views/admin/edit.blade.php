@extends('layouts.admin')
@section('form')

	<script>
		var s = function(el){ return document.querySelector(el); }

		loremText = 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.?Por qué lo usamos?  Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". ';
			function lorem(){
				s('#titulo').value = 		s('#titulo').value 			==	"" ? 'Nombre del trabajo' 	: s('#titulo').value;
				s('#descripcion').value =	s('#descripcion').value 	== 	"" ? loremText 				: s('#descripcion').value;
				s('#cliente').value = 		s('#cliente').value 		==	"" ? 'TVFUEGO' 	: s('#cliente').value;
				s('#año').value = 			s('#año').value 			==	"" ? '2016' 	: s('#año').value;
				s('#link').value = 			s('#link').value 			==	"" ? 'www.soki.com.ar' 	: s('#link').value;
				s('#link_youtube').value = 	s('#link_youtube').value 	==	"" ? 'fdXwf342ds' 	: s('#link_youtube').value;
			}
		s('#tipo').addEventListener('input',function() {
			console.log('tipos');
		});
		</script>
	{!! Form::model($work,['action'=>['WorkController@update',$work->id], 'files' => true, 'method' => 'PATCH']) !!} 
	{!! Form::token() !!}
		
		<div class="row mt-3 mb-4">
			<div class="col-md-6"></div>
			<div class="col-md-6 text-right">
				<div class="btn-group">
					<a href="{{ url()->previous()  }}" class="btn btn-lg btn-outline-secondary">Volver</a>
					{!! Form::submit('Actualizar', ['class'=>'btn-outline-info btn btn-lg']) !!}
				</div>
			</div>
		</div>

		<div class="row mb-4">
			
			<div class="col-md-2">
				{!! Form::label('tipo') !!}
				<?php $tipos = ['0'=>'App', '1'=>'Animacion', '2'=>'Diseño'] ?>
				{!! Form::select('tipo', $tipos, null, ['class'=>'form-control-lg form-control']) !!}
			</div>
			<div class="col-md-5">
				{!! Form::label('titulo') !!}
				{!! Form::text("titulo", null,['class'=>'form-control-lg form-control']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('device', 'Dispositivo Horizontal', []) !!}
				<?php $devices = ['laptop','desktop','tablet', 'tv', 'cellphone']; ?>
				{!! Form::select('device', $devices, 0, ['class'=>'form-control-lg form-control']) !!}
			</div>	
			<div class="col-md-1 text-center">
				{!! Form::label('Color') !!}
				{!! Form::text('color',  null, ['class'=>'form-control-lg form-control jscolor','style'=>'text-indent:-1093px;cursor: pointer;']) !!}
			</div>
			<div class="col-md-1 text-center">
				{!! Form::label('Lorem') !!}
				<button type="button" onclick="lorem();" class="form-control-lg  form-control"><i class="fa fa-magic"></i></button>
			</div>

		</div>
			
		<div class="row mb-4">
			
			<div class="col-md-2">
				{!! Form::label('cliente') !!}
				{!! Form::text("cliente", null,['class'=>'form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('año') !!}
				{!! Form::text("año", null,['class'=>'form-control']) !!}
			</div>
			
			<div class="col-md-3">
				{!! Form::label('link') !!}
				{!! Form::text("link", null,['class'=>'form-control']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('link_youtube') !!}
				{!! Form::text("link_youtube", null,['class'=>'form-control']) !!}
			</div>
			<div class="col-md-2">
				<?php $stores = ['ninguna','todas','ios','android'];?>
				{!! Form::label('stores', 'Tiendas', []) !!}
				{!! Form::select('stores', $stores, 0, ['class'=>'form-control']) !!}
			</div>
		</div>
		
		<div class="row mb-4">
			<div class="col-md-3">
				{!! Form::label('img_square','Imagen Cuadrada (240x240)') !!}
				{!! Form::file('img_square', ['class'=>' form-control']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('img_vertical','Imagen Vertical  (640x360)') !!}
				{!! Form::file('img_vertical', ['class'=>' form-control']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('img_horizontal','Imagen Horizontal (1280x800)') !!}
				{!! Form::file('img_horizontal', ['class'=>' form-control']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('img_concept','Imagen Concepto (640x360)') !!}
				{!! Form::file('img_concept', ['class'=>' form-control']) !!}
			</div>
		</div>

	@if( $work->img_square != "" ) 

		<div class="row text-center" style="border: 1px solid #{{ $work->color }};border-radius:10px; background-color: $work->color ;background-image: url({{ url('uploads/works').'/blur_'.$work->img_square}}); background-position: center; background-size: cover;padding-top:20px; padding-bottom: 10px; ">
			<div class="col-md-3">
				@if ($work->img_square)
					<img src="{{ asset( 'uploads/works/'.$work->img_square)}}" class=" rounded" height="150px">
					<p class="" style="color :#fff!important;">300x300px</p>
				@else 
					<p class="" style="color :#fff!important;">Sin Imagen</p>
				@endif
			</div>
			<div class="col-md-3">
				@if ($work->img_vertical)
					<img src="{{ asset( 'uploads/works/'.$work->img_vertical)}}" class=" rounded" height="150px">
					<p class="" style="color :#fff!important;">640x360px</p>
				@else 
					<p class="" style="color :#fff!important;">Sin Imagen</p>
				@endif
			</div>
			<div class="col-md-3">
				@if ($work->img_horizontal)
					<img src="{{ asset( 'uploads/works/'.$work->img_horizontal)}}" class=" rounded" height="150px">
					<p class="" style="color :#fff!important;">1280x800px</p>
				@else 
					<p class="" style="color :#fff!important;">Sin Imagen</p>
				@endif
			</div>

			<div class="col-md-3">
				@if ($work->img_concept)
					<img src="{{ asset( 'uploads/works/'.$work->img_concept)}}" class=" rounded" height="150px">
					<p class="" style="color :#fff!important;">1280x800px</p>
				@else 
					<p class="" style="color :#fff!important;">Sin Imagen</p>
				@endif
			</div>
		</div>
	@endif

	<div class="row mb-5 mt-3">
		<div class="col-md-3">
			{!! Form::label('attachment','Adjunto') !!}
			{!! Form::file('attachment', ['class'=>' form-control']) !!}
		</div>
		<div class="col-md-3">
			{!! Form::label('github') !!}
			{!! Form::text("github", null,['class'=>'form-control']) !!}
		</div>
		<div class="col-md-3">
			{!! Form::label('estado') !!}
			@php $estados = ['Sin comenzar','En desarrollo','Terminado','Nuevo','Cancelado','Proximamente']; @endphp
			{!! Form::select('estado', $estados,null, ['class'=>'form-control']) !!}
		</div><!-- /.col-md-3 -->
	</div><!-- /.row -->


	<div class="row mb-5">
		<div class="col-md-3">
			{!! Form::label('descripcion') !!} <br>
			<div class="btn-group">
				<button type="button" onclick='wrapText("descripcion", "<strong>", "</strong>")' class="btn btn-default"><i class="fa fa-bold"></i></button>
				<button type="button" onclick='wrapText("descripcion", "<em>", "</em>")' class="btn btn-default"><i class="fa fa-italic"></i></button>
				<button type="button" onclick='wrapText("descripcion", "<h4>", "</h4>")' class="btn btn-default"><i class="fa fa-header"></i></button>
				<button type="button" onclick='wrapText("descripcion", "<a href=# >", "</a>")' class="btn btn-default"><i class="fa fa-link"></i></button>
				<button type="button" onclick='addText("descripcion", "<br>")' class="btn btn-default"><i class="fa fa-long-arrow-down"></i></button>
				<button type="button" onclick='addText("descripcion", "<hr>")' class="btn btn-default"><i class="fa fa-long-arrow-right"></i></button>
			</div>
		</div>

		<div class="col-md-9">
			{!! Form::textarea('descripcion', null, ['rows'=>'8', 'class'=>'form-control-lg form-control']) !!}
		</div>
		
	</div>


	{!! Form::close() !!}


	
@stop