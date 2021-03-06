@extends('layouts.app')

@section('content')

<div class="section section-footer" >
		<div class="container">
				
				<div class="row">
					<div class="hidden-xs hidden-sm col-md-4 text-right">
						<img class="float-right single-dis-cover img-fluid" src="{{ asset('uploads/posts/').'/'.$post->image }}" >
					</div>
					<div class=" col-sm-12 col-md-8">
						<a href="{{ action('PostController@show', $post->id) }}">
							<small class="mt-2 float-right badge bg-faded text-muted">Creado el {{ $post->created_at->format('d/m/y')}}</small>
							<h1>{{ $post->titulo }}</h1>
							@if(Auth::check()) <a href="{{ action('PostController@edit',$post->id) }}">Editar</a> @endif
						</a>
						<p>
						{{-- <img class="visible-sm visible-xs float-left  img-fluid rounded" style="margin: 0px 15px 12px 0px;" src="{{ asset('uploads/posts/').'/'.$post->image }}" width="30%"> --}}
							{!! html_entity_decode($post->contenido) !!}
						</p>
							

					</div>
				</div>
				<br>
		</div>
	</div>

	
@stop