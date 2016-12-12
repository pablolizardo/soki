@extends('layouts.app')

@section('page')
works
@stop

@section('body')


	<?php $row  = 0 ?>

	@foreach ($works as $work)
		
		@if ($row%4 ==0 ) <div class="row">	@endif
			<div class="col-md-3 col-sm-4 col-xs-6 ">
				<figure>
					<img src="{{ url('uploads/works').'/'.$work->img_square}}" class=" 	">
					<h3><a href="{{ action('WorkController@show',$work->id) }}">{{ $work->titulo}}</a></h3>
					<h6>{{ $work->tipo() }}</h6>
					{{-- <p>{{ substr($work->descripcion,0,130) }} ...</p> --}}
				</figure>
			</div>
			<?php $row ++ ?>
		@if ($row%4 ==0 ) </div> @endif

	@endforeach

@stop