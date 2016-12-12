@extends('layouts.admin')
@section('form')
	<h2>apps</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>titulo</th>
				<th>descripcion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($apps as $app)
				<tr>
					<td><img src="{{ asset('uploads/works/'.$app->img_square ) }}" class="img-rounded" width="70px"></td>
					<td>{{ $app->titulo }}</td>
					<td>{{ substr($app->descripcion,0,100) }} ... </td>
					<td>
						{!! Form::open(['action' => ['AdminController@destroy', $app->id], 'method' => 'delete']) !!}
						  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
						{!! Form::close() !!}
				    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<br>
	<h2>anims</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>titulo</th>
				<th>descripcion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($anims as $anim)
				<tr>
					<td><img src="{{ asset('uploads/works/'.$anim->img_square ) }}" class="img-rounded" width="110px" height="70px"></td>
					<td>{{ $anim->titulo }}</td>
					<td>{{ substr($anim->descripcion,0,100) }} ... </td>
					<td>
						{!! Form::open(['action' => ['AdminController@destroy', $anim->id], 'method' => 'delete']) !!}
						  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<br>
	<h2>diseños</h2>
	<table class="table table-hover">
		<thead>
			<tr>
				<th></th>
				<th>titulo</th>
				<th>descripcion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($diseños as $diseño)
				<tr>
					<td><img src="{{ asset('uploads/works/'.$diseño->img_square ) }}" class="img-thumbnail img-responsive" width="70px"></td>
					<td>{{ $diseño->titulo }}</td>
					<td>{{ substr($diseño->descripcion,0,100) }} ... </td>
					<td>
						{!! Form::open(['action' => ['AdminController@destroy', $diseño->id], 'method' => 'delete']) !!}
						  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-mini']) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop