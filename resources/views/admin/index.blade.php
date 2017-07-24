@extends('layouts.admin')
@section('form')

</div>
<div class="container-fluid">


<div class="row mt-4">
	

	<div class="col-md-6">
		<h4 class="text-muted">Cotizaciones</h4>
		<table class="table table-sm small small">
			<tbody>
				@foreach($presupuestos as $presupuesto)
					<tr >
						<td><strong>{{ $presupuesto->cliente }}</strong><p hidden class="small text-muted mb-0">{!! $presupuesto->detalle !!} </p></td>
						<td>{{ $presupuesto->tipo }}</td>
						<td>{{ $presupuesto->email }}</td>
						<td>{{ $presupuesto->celular }}</td>
						<td>{{ $presupuesto->plazo->format('d/m/y') }}</td>
						<td class="text-right">
							{!! Form::open(['action' => ['ThemeController@destroy', $presupuesto->id], 'method' => 'delete']) !!}
								<div class="btn-group btn-group-sm" role="group" >
									<a href="mailto:{{ $presupuesto->email }}" class="btn"><i class="fa fa-envelope"></i></a>
									<a href="{{ action('ThemeController@edit',$presupuesto->id) }}" class="btn"><i class="fa fa-btn fa-pencil"></i></a>
									{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn','type'=>'submit']) !!}
							  </div>						
							  {!! Form::close() !!}
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div><!-- /.-->

	<div class="col-md-6">
		<h4 class="text-muted">Themes <a class="btn btn-outline-secondary btn-sm " href="{{ url('blog/create') }}" >Nuevo</a></h4>
		<table class="table table-sm small small">
			<tbody>
				@foreach($themes as $theme)
					<tr style="border-left: 5px solid #{{ $theme->color }} ; ">
						<td>@if ($theme->logo) <img src="{{ asset('uploads/themes/'.$theme->logo ) }}" class="rounded" width="28px">@endif</td>
						<td><strong>{{ $theme->name }}</strong><p  class="small text-muted mb-0">{!! $theme->frase !!} </p></td>
						<td><span class="badge " style="color: transparent; background-color: #{{ $theme->color_primary }}">. </span></td>
						<td><span class="badge " style="color: transparent; background-color: {{ $theme->color_secondary }}">. </span></td>
						<td>@if ($theme->apps_bg) <img src="{{ asset('uploads/themes/'.$theme->apps_bg ) }}" class="rounded" width="56px">@endif</td>
						<td>@if ($theme->anim_bg) <img src="{{ asset('uploads/themes/'.$theme->anim_bg ) }}" class="rounded" width="20px">@endif</td>
						<td>@if ($theme->dis_bg) <img src="{{ asset('uploads/themes/'.$theme->dis_bg ) }}" class="rounded" width="20px">@endif</td>
						<td>@if ($theme->posts_bg) <img src="{{ asset('uploads/themes/'.$theme->posts_bg ) }}" class="rounded" width="20px">@endif</td>
						{{-- <td>{{ $theme->frase }}</td> --}}
						<td>@if( $theme->activo ) <i class="fa fa-btn fa-check"></i> @endif</td>
						<td class="text-right">
							{!! Form::open(['action' => ['ThemeController@destroy', $theme->id], 'method' => 'delete']) !!}
								<div class="btn-group" role="group" >
									<a href="{{ action('ThemeController@edit',$theme->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-pencil"></i></a>
									{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-outline-danger btn-sm','type'=>'submit']) !!}
							  </div>						
							  {!! Form::close() !!}
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div><!-- /.-->

</div><!-- /.row -->



<div class="row">

	<div class="col-md-12 col-sm-12 col-md-3 col-lg-3">
		
		<h4 class="text-muted">Apps</h4>
		<table class="table table-sm small">

			<tbody>
				@foreach($apps as $app)
					<tr style="border-left: 5px solid #{{ $app->color }} ; ">
						<td>@if ($app->img_square) <img src="{{ asset('uploads/works/thumb_'.$app->img_square ) }}" class="rounded" width="28px">@endif</td>
						<td>{{ $app->titulo }}<p hidden class="small text-muted mb-0">{!! strip_tags(substr($app->descripcion,0,20)) !!} ... </p></td>
						<td class="text-right">
							{!! Form::open(['action' => ['AdminController@destroy', $app->id], 'method' => 'delete']) !!}
								<div class="btn-group" role="group" >
									<a href="{{ action('WorkController@show',$app->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-eye"></i></a>
									<a href="{{ action('WorkController@edit',$app->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-pencil"></i></a>
									{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-outline-danger btn-sm','type'=>'submit']) !!}
								</div>
							{!! Form::close() !!}
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-sm-12 col-md-3 col-lg-3">

		<h4 class="text-muted">Anims</h4>
		<table class="table table-sm small">

			<tbody>
				@foreach($anims as $anim)
					<tr style="border-left: 5px solid #{{ $anim->color }} ; ">
						<td>@if ($anim->img_square) <img src="{{ asset('uploads/works/thumb_'.$anim->img_square ) }}" class="rounded" width="28px">@endif</td>
						<td>{{ $anim->titulo }}<p hidden class="small text-muted mb-0">{!! strip_tags(substr($anim->descripcion,0,20)) !!} ... </p></td>
						<td class="text-right">
							{!! Form::open(['action' => ['AdminController@destroy', $anim->id], 'method' => 'delete']) !!}
								<div class="btn-group" role="group" >
									<a href="{{ action('WorkController@show',$anim->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-eye"></i></a>
									<a href="{{ action('WorkController@edit',$anim->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-pencil"></i></a>
									{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-outline-danger btn-sm','type'=>'submit']) !!}
							  </div>						
							  {!! Form::close() !!}
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


	<div class="col-sm-12 col-md-3 col-lg-3">
		<h4 class="text-muted">Diseños</h4>
		<table class="table table-sm small">

			<tbody>
				@foreach($diseños as $diseño)
					<tr style="border-left: 5px solid #{{ $diseño->color }} ; ">
						<td>@if ($diseño->img_square) <img src="{{ asset('uploads/works/thumb_'.$diseño->img_square ) }}" class="rounded" width="28px">@endif</td>
						<td>{{ $diseño->titulo }}<p hidden class="small text-muted mb-0">{!! strip_tags(substr($diseño->descripcion,0,20)) !!}... </p></td>
						<td class="text-right">
							{!! Form::open(['action' => ['AdminController@destroy', $diseño->id], 'method' => 'delete']) !!}
								<div class="btn-group" role="group" >
									<a href="{{ action('WorkController@show',$diseño->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-eye"></i></a>
									<a href="{{ action('WorkController@edit',$diseño->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-pencil"></i></a>
									{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-outline-danger btn-sm','type'=>'submit']) !!}
							  
								</div>						
							{!! Form::close() !!}
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


	<div class="col-sm-12 col-md-3 col-lg-3">
		<h4 class="text-muted">Posts <a class="btn btn-outline-secondary btn-sm " href="{{ url('blog/create') }}" >Nuevo</a></h4>
		<table class="table table-sm small">

			<tbody>
				@foreach($posts as $post)
					<tr style="border-left: 5px solid #{{ $post->color }} ; ">
						<td>{{ $post->titulo }}<p hidden class="small text-muted mb-0">{!! strip_tags(substr($post->contenido,0,20)) !!} ... </p></td>

						<td class="text-right">
							{!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'delete']) !!}
								<div class="btn-group" role="group" >
									<a href="{{ action('PostController@show',$post->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-eye"></i></a>
									<a href="{{ action('PostController@edit',$post->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-btn fa-pencil"></i></a>
									{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-outline-danger btn-sm','type'=>'submit']) !!}
							  </div>						
							  {!! Form::close() !!}
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@stop