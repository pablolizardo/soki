@extends('layouts.app')

@section('body')

<div class="section section-footer" >
		<div class="container">
				
				<div class="row">
					<div class="col-xs-2">
						<img class="img-responsive" src="{{ asset('uploads/posts/').'/'.$post->image }}">
					</div>
					<div class="col-xs-10">
						<a href="{{ action('PostController@show', $post->id) }}">
							<h2>{{ $post->titulo }}</h2>
						</a>
						<p>{{ $post->contenido }}</p>
					</div>
				</div>
				<br>
		</div>
	</div>

	
@stop