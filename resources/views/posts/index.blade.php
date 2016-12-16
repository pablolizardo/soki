@extends('layouts.app')

@section('body')
	

	<div class="section section-footer" >
		<span class="titulo hidden-md">Blog</span>
		<div class="container">
			<div class="row">
				@foreach($posts as $post)
					<h2>{{ $post->titulo }}</h2>
					<p>{{ $post->contenido }}</p>
				@endforeach
			</div>
		</div>
	</div>
	
@stop