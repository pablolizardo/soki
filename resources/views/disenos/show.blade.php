@extends('layouts.app')


@section('content')

<div id="single ">
			

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="display-1" style="color: #{{ $diseno->color}};">
					{{ $diseno->titulo }}
				</h1>
				<p class="lead" >
					{{    $sentence = preg_replace('/(.*?[?!.](?=\s|$)).*/', '\\1', $diseno->descripcion) }}
					<small style="color : #{{ $diseno->color}} ">@if (Auth::check()) <a href="{{ action('WorkController@edit',$diseno->id) }}">Editar</a> @endif </small>

				</p>
			</div>
		</div>
	</div>
		
	<br>


	<div class="section section-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-4 col-md-6 col-lg-4">
					<div class="single-dis-cover" style="background-image: url({{ url('uploads/works').'/'.$diseno->img_vertical}}); "></div>
				</div>
				<div class="col-md-12 col-sm-8 col-md-6 col-lg-5">
						<p>
							@if ($diseno->img_square) 
					 			<img src="{{ asset('uploads/works').'/'.$diseno->img_square }}" class=" rounded " id="dis_img_square"> 
					 		@endif
							{!! html_entity_decode($diseno->descripcion) !!}
						</p>
					<hr>
				</div>
				<div class="hidden-xs hidden-sm hidden-md col-lg-3">
					@if ($diseno->img_horizontal) 
						<img src="{{ asset('uploads/works').'/'.$diseno->img_horizontal }}" class=" rounded img-fluid"> 
					@endif
					<dl class="">
						<dt style="color: #{{ $diseno->color}};">Cliente</dt><dd>{{$diseno->cliente}}</dd>
						<dt style="color: #{{ $diseno->color}};">Año</dt><dd>{{$diseno->año}}</dd>
						<dt style="color: #{{ $diseno->color}};">Tipo</dt><dd>{{$diseno->tipo()}}</dd>
						<dt style="color: #{{ $diseno->color}};">Link</dt><dd>{{$diseno->link }}</dd>
					</dl>
					
					@if($diseno->attachment) {!! $diseno->attachmentBadge($diseno->attachment) !!} @endif

					
				</div>		
			</div>	
		</div>
	</div>

	<div class="section section-body">
		
	</div>


</div>
@stop