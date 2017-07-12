@extends('layouts.admin')

@section('form')
	<div class="container">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">
							Nueva cotización
						</h4>
						{!! Form::open(['action'=>'PresupuestoController@store', 'files' => false, 'method' => 'POST']) !!} 
						<div class="row mb-2">
							<div class="col-md-4">
								{!! Form::label('cliente', 'Ingrese su nombre') !!}
								{!! Form::text('cliente', null, ['class'=>'form-control']) !!}
								<p class="text-muted">Nombre de individuo o empresa</p>
							</div>
							<div class="col-md-4">
								{!! Form::label('email') !!}
								{!! Form::email('email', null, ['class'=>'form-control']) !!}
								<p class="text-muted">Email donde quiere recibir la cotizacion</p>
							</div>
							<div class="col-md-4">
								{!! Form::label('celular') !!}
								{!! Form::text('celular', null, ['class'=>'form-control']) !!}
								<p class="text-muted">Opcional</p>
							</div>
						</div>
						<div class="row mb-2">
							<?php $tipos = ['Web o Aplicación','Animación o video','Diseño y Gráfica']; ?>
							<div class="col-md-3">
								{!! Form::label('tipo') !!}
								{!! Form::select('tipo', $tipos, null, ['class'=>'form-control']) !!}
							</div>
							<div class="col-md-3">
								{!! Form::label('plazo','Cuando desea tener el trabajo?') !!}
								{!! Form::date('plazo', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
							</div>

							<div class="col-md-6">
								{!! Form::label('detalle','Detalle los requerimientos de su pedido') !!}
								{!! Form::textarea('detalle', null, ['rows'=>'4','class'=>'form-control']) !!}
							</div>
						</div>
						<div class="row mt-3 text-center">
							<div class="col-md-12">
								{!! Form::submit('Solicitar Cotizacion', ['class'=>'btn btn-lg btn-outline-success']) !!}
								
							</div>
						</div>

					</div>
				</div>		
			</div>
		</div>
	</div>

@endsection