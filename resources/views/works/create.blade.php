@extends('layouts.admin')
@section('form')

		
	
	{!! Form::open(['action'=>'WorkController@store', 'files' => true, 'method' => 'POST']) !!} 
	{!! Form::token() !!}

		<div class="row">
			
			<div class="col-xs-9">
				{!! Form::label('titulo') !!}
				{!! Form::text("titulo", null,['class'=>'input-lg form-control']) !!}
			</div>
			<div class="col-xs-3">
				{!! Form::label('tipo') !!}
				<?php $tipos = ['0'=>'App', '1'=>'Animacion', '2'=>'Diseño'] ?>
				{!! Form::select('tipo', $tipos, null, ['class'=>'input-lg form-control']) !!}
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
			{!! Form::label('img_square','Imagen Cuadrada') !!}
			{!! Form::file('img_square', ['class'=>'input-lg form-control']) !!}
		</div>
		<div class="col-xs-4">
			{!! Form::label('img_vertical','Imagen Vertical') !!}
			{!! Form::file('img_vertical', ['class'=>'input-lg form-control']) !!}
		</div>
	</div>

	<br>
	<div class="row">
		<div class="col-xs-12">
			{!! Form::label('descripcion') !!}
			{!! Form::textarea('descripcion', null, ['rows'=>'5', 'class'=>'input-lg form-control']) !!}
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