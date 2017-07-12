@extends('layouts.app')

@section('content')
	

	<div class="section section-footer" >
		<span class="titulo hidden-md">Blog</span>
		<div class="container">
				
			@foreach($posts as $post)
				<div class="row">
					<div class="hidden-xs hidden-sm col-md-2 col-lg-2">
						<img class="float-right single-dis-cover img-fluid" style="height: 250px;margin-top: 80px;" src="{{ asset('uploads/posts/').'/'.$post->image }}">
					</div>
					<div class=" col-sm-12 col-md-10 col-lg-10">
						<a href="{{ action('PostController@show', $post->id) }}">
							<small class="mt-2 float-right badge bg-faded text-muted">Creado el {{ $post->created_at->format('d/m/y')}}</small>
							<h2 style="color: $work->color">{{ $post->titulo }}  </h2>
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