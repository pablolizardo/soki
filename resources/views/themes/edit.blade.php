@extends('layouts.admin')
@section('form')

	{!! Form::model($theme, ['action'=>['ThemeController@update', $theme->id], 'files' => true, 'method' => 'PATCH']) !!} 
	{!! Form::token() !!}

		<div class="row">
			<div class="col-md-2 offset-md-1 ">
				{!! Form::label('name') !!}
				{!! Form::text("name", null,['class'=>' form-control']) !!}
			</div>
			<div class="col-md-3">
				{!! Form::label('frase') !!}
				{!! Form::text("frase", null,['class'=>' form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('Primario') !!}
				{!! Form::color("color_primary", null,['class'=>' form-control','style'=>'height: 38px;']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('Secundario') !!}
				{!! Form::color("color_secondary", null,['class'=>' form-control','style'=>'height: 38px;']) !!}
			</div>

			<div class="col-md-2">
				{!! Form::label('activo') !!}
				{!! Form::checkbox('activo', null, null, []) !!}
			</div>
		</div>

		<div class="row">
			<div class="offset-md-1 col-md-2">
				{!! Form::label('logo','logo ') !!}
				{!! Form::file('logo', ['class'=>'form-control-lg form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('apps_bg','apps_bg') !!}
				{!! Form::file('apps_bg', ['class'=>'form-control-lg form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('posts_bg','posts_bg') !!}
				{!! Form::file('posts_bg', ['class'=>'form-control-lg form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('anim_bg','anim_bg') !!}
				{!! Form::file('anim_bg', ['class'=>'form-control-lg form-control']) !!}
			</div>
			<div class="col-md-2">
				{!! Form::label('dis_bg','dis_bg') !!}
				{!! Form::file('dis_bg', ['class'=>'form-control-lg form-control']) !!}
			</div>
		</div>


	<br>
	<div class="row">
		<div class="col-md-12">
			{!! Form::submit('Guardar', ['class'=>'form-control-lg form-control btn-success']) !!}
		</div>
	</div>

	{!! Form::close() !!}


	
@stop