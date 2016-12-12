@extends('layouts.app')

@section('body')

	<section class="apps">
		<span class="titulo hidden-md">Apps</span>
		<div class="container">
			@foreach ($apps as $app)
					<div class="col-md-3 col-sm-4 col-xs-6 app">
						<figure style="background-image: url({{ url('uploads/works').'/'.$app->img_square}});"> </figure>

						<h4><a href="{{ action('WorkController@show',$app->id) }}">{{ $app->titulo}}</a></h4>
					</div>
			@endforeach
		</div>
	</section>

	<section class="anims">
		<span class="titulo hidden-md">Animación</span>

		<div class="container">
			@foreach ($anims as $anim)
					<div class="col-md-3 col-sm-4 col-xs-6 anim">
						<figure style="background-image: url({{ url('uploads/works').'/'.$anim->img_square}});"> </figure>
						<h4><a href="{{ action('WorkController@show',$anim->id) }}">{{ $anim->titulo}}</a></h4>
						<p>{{substr($anim->descripcion,0,90) }} ...</p>
					</div>
			@endforeach
		</div>
	</section>

	<section class="diseños">
		<span class="titulo hidden-md">Diseño</span>

		<div class="container">
			@foreach ($diseños as $diseño)
					<div class="col-md-2 col-sm-3 col-xs-6 diseño">
						<figure style="background-image: url({{ url('uploads/works').'/'.$diseño->img_square}});"> </figure>
						<h5><a href="{{ action('WorkController@show',$diseño->id) }}">{{ $diseño->titulo}}</a></h5>
					</div>
			@endforeach
		</div>
	</section>


@stop