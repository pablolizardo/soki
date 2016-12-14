@extends('layouts.admin')
@section('form')
<div class="col-xs-4">
	
	<h2>Apps</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($apps as $app)
				<tr>
					<td><img src="{{ asset('uploads/works/'.$app->img_square ) }}" class="img-rounded" width="40px"></td>
					<td>{{ $app->titulo }}<p class="small">{{ substr($app->descripcion,0,25) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $app->id], 'method' => 'delete']) !!}
							<div class="btn-group" role="group" >

						  <a href="{{ action('WorkController@edit',$app->id) }}" class="btn btn-success btn-xs">Edit</a>
						  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-xs']) !!}
						  </div>

						{!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="col-xs-4">

	<h2>Anims</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($anims as $anim)
				<tr>
					<td><img src="{{ asset('uploads/works/'.$anim->img_square ) }}" class="img-rounded" width="40px"></td>
					<td>{{ $anim->titulo }}<p class="small">{{ substr($anim->descripcion,0,25) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $anim->id], 'method' => 'delete']) !!}
							<div class="btn-group" role="group" >

						  <a href="{{ action('WorkController@edit',$anim->id) }}" class="btn btn-success btn-xs">Edit</a>
						  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-xs']) !!}
						  </div>						{!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


<div class="col-xs-4">

	<h2>Diseños</h2>
	<table class="table table-condensed">

		<tbody>
			@foreach($diseños as $diseño)
				<tr>
					<td><img src="{{ asset('uploads/works/'.$diseño->img_square ) }}" class="img-rounded" width="40px"></td>
					<td>{{ $diseño->titulo }}<p class="small">{{ substr($diseño->descripcion,0,25) }} ... </p></td>
					<td class="text-right">
						{!! Form::open(['action' => ['AdminController@destroy', $diseño->id], 'method' => 'delete']) !!}
<div class="btn-group" role="group" >

						  <a href="{{ action('WorkController@edit',$diseño->id) }}" class="btn btn-success btn-xs">Edit</a>
						  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-xs']) !!}
						  </div>						{!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


@stop