@extends('layouts.app')

@section('body')
	

	<div class="section section-footer" >
		<span class="titulo hidden-md">Blog</span>
		<div class="container">
				
			@foreach($posts as $post)
				<div class="row">
					<div class="hidden-xs hidden-sm col-md-2 col-lg-2">
						<img class="pull-right single-dis-cover img-responsive" style="height: 250px;margin-top: 80px;" src="{{ asset('uploads/posts/').'/'.$post->image }}">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
						<a href="{{ action('PostController@show', $post->id) }}">
							<h1 style="color: $work->color">{{ $post->titulo }}</h1>
						</a>
						
						<p>
							{!! strip_tags($post->contenido) !!}
						</p>
					</div>
				</div>
				<br>
			@endforeach
		</div>
	</div>
	
@stop