@extends('layouts.app')


@section('scripts')
<script type="text/javascript">
	
simpleslider.getSlider({
      container: document.getElementById('galeria'),
      init: -100,
      show: 0,
      end: 100,
      unit: '%'
    });

</script>

@stop

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
				<div class="col-md-12 col-sm-8 col-md-6 col-lg-8">
					<dl class="row">
						<dt class="col-md-1 mt-0" style="color: #{{ $diseno->color}};">Cliente</dt>
						<dd class="col-md-4 mt-0">{{$diseno->cliente}}</dd>
						<dt class="col-md-1 mt-0" style="color: #{{ $diseno->color}};">Año</dt>
						<dd class="col-md-1 mt-0">{{$diseno->año}}</dd>
						<dt class="col-md-1 mt-0" style="color: #{{ $diseno->color}};">Link</dt>
						<dd class="col-md-1 mt-0"><a href="{{$diseno->link }}" style="color :{{ $diseno->color }}">Ir <i class="fa fa-arrow-right"></i></a></dd>
					</dl>
					<p> 
						{{-- @if ($diseno->img_square) 
				 			<img src="{{ asset('uploads/works').'/'.$diseno->img_square }}" class=" rounded float-right ml-5" id="dis_img_square"> 
				 		@endif --}}
				 		<div id="galeria-icon" class="float-right ml-3 mb-5">
							@if($diseno->img_concept)
								<a href="{{ asset('uploads/works/'.$diseno->img_concept)}}" data-lightbox="image-1" data-title="{{ $diseno->titulo }}">
									<img src="{{ asset('uploads/works/thumb_'.$diseno->img_concept)}}" >
								</a>
							@endif
							@if($diseno->img_vertical)
								 <a href="{{ asset('uploads/works/'.$diseno->img_vertical)}}" data-lightbox="image-1" data-title="{{ $diseno->titulo }}">
								 	<img src="{{ asset('uploads/works/thumb_'.$diseno->img_vertical) }}" >
								 </a>
							@endif
							@if($diseno->img_square)
								<a href="{{ asset('uploads/works/'.$diseno->img_square)}}" data-lightbox="image-1" data-title="{{ $diseno->titulo }}">
									<img src="{{ asset('uploads/works/thumb_'.$diseno->img_square)}}">
								</a>
							@endif
						</div>
				 		{!! html_entity_decode($diseno->descripcion) !!} 
				 	</p>
					
				    @if($diseno->attachment) 
					     {!! $diseno->attachmentBadge($diseno->attachment) !!} 
				    @endif
					
				</div>		
			</div>	
		</div>
	</div>

	<div class="section section-body">
		
	</div>


</div>
@stop