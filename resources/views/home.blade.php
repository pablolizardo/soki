@extends('layouts.app')

@section('body')

	<section class="apps" id="apps">
		<span class="titulo hidden-md">Apps</span>
		<div class="container">
			@foreach ($apps as $app)
				<a href="{{ action('WorkController@show',$app->id) }}">
					<div class="col-xs-12 col-sm-6  col-md-4 col-lg-3 app">

						<figure style="background-image: url({{ url('uploads/works').'/'.$app->img_square}});"> </figure>

						<h4>{{ $app->titulo}}</h4>
					</div>
				</a>
			@endforeach
		</div>
	</section>

	<section class="anims" id="anims">
		<span class="titulo hidden-md">Animación</span>

		<div class="container">
			@foreach ($anims as $anim)
				<a href="{{ action('WorkController@show',$anim->id) }}">
					<div class="col-xs-12 col-sm-6  col-md-4 col-lg-3 anim">
						<figure style="background-image: url({{ url('uploads/works').'/'.$anim->img_square}});"> </figure>
						<h4>{{ $anim->titulo}}</h4>
						<p class="hidden-sm hidden-xs">{{substr($anim->descripcion,0,90) }} ...</p>
					</div>
				</a>
			@endforeach
		</div>
	</section>

	<section class="diseños" id="diseños">
		<span class="titulo hidden-md">Diseño</span>

		<div class="container">
			@foreach ($diseños as $diseño)
				<a href="{{ action('WorkController@show',$diseño->id) }}">
					<div class="col-xs-12 col-sm-3  col-md-3 col-lg-2 diseño">
						<figure style="background-image: url({{ url('uploads/works').'/'.$diseño->img_square}});"> </figure>
						<h5>{{ $diseño->titulo}}</h5>
					</div>
				</a>
			@endforeach
		</div>
	</section>


@stop