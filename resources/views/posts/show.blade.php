@extends('layouts.app')

@section('body')

<div class="section section-footer" >
		<div class="container">
				
				<div class="row">
					<div class="hidden-xs hidden-sm col-md-4 text-right">
						<img class="pull-right single-dis-cover img-responsive" src="{{ asset('uploads/posts/').'/'.$post->image }}" >
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8">
						<a href="{{ action('PostController@show', $post->id) }}">
							<h1>{{ $post->titulo }}</h1>
						</a>
						<p>
						<img class="visible-sm visible-xs pull-left  img-responsive img-rounded" style="margin: 0px 15px 12px 0px;" src="{{ asset('uploads/posts/').'/'.$post->image }}" width="30%">
							{!! html_entity_decode($post->contenido) !!}
						</p>
							

					</div>
				</div>
				<br>
		</div>
	</div>

	
@stop