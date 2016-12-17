@extends('layouts.app')

@section('body')

	<div class="section section-head" id="apps" >
		<span class="titulo hidden-md">Apps</span>
		<div class="container">
			<div class="row">
				@foreach ($apps as $app)
					<a href="{{ action('WorkController@show',$app->id) }}">
						<div class="col-xs-12 col-sm-6  col-md-4 col-lg-3 ">
							<div class="app-wrap">
								<div class="app-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}});"> </div>

								<h4 class="app-title">{{ $app->titulo}}</h4>
								
							</div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>

	<div class="section section-body" id="anims">
		<span class="titulo hidden-md">Animación</span>

		<div class="container">
			<div class="row">
				@foreach ($anims as $anim)
					<a href="{{ action('WorkController@show',$anim->id) }}">
						<div class="col-xs-12 col-sm-6  col-md-4 col-lg-3 ">
							<div class="anim-wrap">
								<div class="anim-image" style="background-image: url({{ url('uploads/works').'/'.$anim->img_horizontal}});"> </div>
								<h4 class="anim-title">{{ $anim->titulo}}</h4>
								<p class="anim-text hidden-sm hidden-xs">{{substr($anim->descripcion,0,90) }} ...</p>
							</div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>

	<div class="section section-footer" id="disenos">
		<span class="titulo hidden-md">Diseño</span>

		<div class="container">
			<div class="row">
				@foreach ($diseños as $diseño)
					<a href="{{ action('WorkController@show',$diseño->id) }}">
						<div class="col-xs-12 col-sm-3  col-md-3 col-lg-2 ">
							<div class="dis-wrap">
								<div class="dis-image" style="background-image: url({{ url('uploads/works').'/'.$diseño->img_square}});"> </div>
								<h5 class="dis-title">{{ $diseño->titulo}}</h5>
							</div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>


@stop