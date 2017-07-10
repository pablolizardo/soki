@extends('layouts.app')

@section('body')


	<div class="row">
		<div class="col-md-12">
			<h1 class="display-1">{{ $work->titulo }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<p class="lead">
				{{ $work->descripcion }}
			</p>
		</div>
		<div class="col-md-4">
			<dl class="dl-horizontal">
				<dt>Cliente</dt><dd>{{$work->cliente}}</dd>
				<dt>Año</dt><dd>{{$work->año}}</dd>
				<dt>Tipo</dt><dd>{{$work->tipo()}}</dd>
				<dt>Link</dt><dd>{{$work->link }}</dd>
			</dl>
		</div>
	</div>

@stop
