@extends('layouts.admin')
@section('form')
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	
	<h2 class="text-muted">Apps</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($apps as $app)
				<tr style="border-left: 5px solid #{{ $app->color }} ; ">
					<td>@if ($app->img_square) <img src="{{ asset('uploads/works/'.$app->img_square ) }}" class="img-rounded" width="40px">@endif</td>
					<td><strong>{{ $app->titulo }}</strong><p class="small text-muted">{{ substr($app->descripcion,0,20) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $app->id], 'method' => 'delete']) !!}
							<div class="btn-group" role="group" >
								<a href="{{ action('WorkController@show',$app->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-eye"></i></a>
								<a href="{{ action('WorkController@edit',$app->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-pencil"></i></a>
								{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-danger btn-xs','type'=>'submit']) !!}
							</div>
						{!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

	<h2 class="text-muted">Anims</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($anims as $anim)
				<tr style="border-left: 5px solid #{{ $anim->color }} ; ">
					<td>@if ($anim->img_square) <img src="{{ asset('uploads/works/'.$anim->img_square ) }}" class="img-rounded" width="40px">@endif</td>
					<td><strong>{{ $anim->titulo }}</strong><p class="small text-muted">{{ substr($anim->descripcion,0,20) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $anim->id], 'method' => 'delete']) !!}
							<div class="btn-group" role="group" >
								<a href="{{ action('WorkController@show',$anim->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-eye"></i></a>
								<a href="{{ action('WorkController@edit',$anim->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-pencil"></i></a>
								{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-danger btn-xs','type'=>'submit']) !!}
						  </div>						
						  {!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

	<h2 class="text-muted">Diseños</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($diseños as $diseño)
				<tr style="border-left: 5px solid #{{ $diseño->color }} ; ">
					<td>@if ($diseño->img_square) <img src="{{ asset('uploads/works/'.$diseño->img_square ) }}" class="img-rounded" width="40px">@endif</td>
					<td><strong>{{ $diseño->titulo }}</strong><p class="small text-muted">{{ substr($diseño->descripcion,0,20) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $diseño->id], 'method' => 'delete']) !!}
							<div class="btn-group" role="group" >
								<a href="{{ action('WorkController@show',$diseño->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-eye"></i></a>
								<a href="{{ action('WorkController@edit',$diseño->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-pencil"></i></a>
								{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-danger btn-xs','type'=>'submit']) !!}
						  
							</div>						
						{!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<br>
<hr>
<br>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

	<h2 class="text-muted">Posts</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($posts as $post)
				<tr style="border-left: 5px solid {{ $post->color }} ; ">
					<td>@if ($post->image) <img src="{{ asset('uploads/works/'.$post->image ) }}" class="img-rounded" width="40px">@endif</td>
					<td><strong>{{ $post->titulo }}</strong><p class="small text-muted">{{ substr($post->contenido,0,150) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $post->id], 'method' => 'delete']) !!}
							<div class="btn-group" role="group" >
								<a href="{{ action('WorkController@show',$post->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-eye"></i></a>
								<a href="{{ action('WorkController@edit',$post->id) }}" class="btn btn-default btn-xs"><i class="fa fa-btn fa-pencil"></i></a>
								{!! Form::button('<i class="fa fa-btn fa-trash"></i>', ['class'=>'btn btn-danger btn-xs','type'=>'submit']) !!}
						  </div>						
						  {!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop