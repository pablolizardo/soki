@extends('layouts.app') 
@section('content')

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">SOKI</h1>
        <p class="lead font-weight-normal">Diseño y Desarrollo.</p>
        <a class="btn btn-outline-secondary" href="#">Río Grande, Tierra del Fuego , Patagonia Argentina</a>
    </div>
    <div class="product-device box-shadow d-none d-md-block"></div>
    <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
</div>
<div class="d-md-flex flex-md-equal my-md-3 pl-md-3">
    @foreach ($apps as $app)
    <div class=" mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white " style="overflow:hidden;  background-color:#{{ $app->color }}; ">
        <div class="my-3 py-3">
            <h2 class="display-5">{{ $app->titulo}}</h2>
            <p class="lead">{!! strip_tags(substr($app->descripcion,0,90)) !!}.</p>
        </div>
        <div class="bg-light box-shadow mx-auto" style="width: 70%; height: 130px; border-radius: 21px 21px 0 0;background-size: cover; background-image: url({{ asset('uploads/works/'.$app->img_square )}}"></div>
        {{--  <img class="box-shadow mx-auto" src="{{ asset('uploads/works/'.$app->img_square )}}">  --}}
    </div>
    @endforeach
</div>

<div class="d-md-flex flex-md-equal my-md-3 pl-md-3">
    @foreach ($anims as $anim)
    <div class=" mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white " style="overflow:hidden;  background-color:#{{ $anim->color }}; ">
        <div class="my-3 py-3">
            <h2 class="display-5">{{ $anim->titulo}}</h2>
            <p class="lead">{!! strip_tags(substr($anim->descripcion,0,90)) !!}.</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 90%; height: 120px; border-radius: 21px 21px 0 0; background-size: cover; background-image: url({{ asset('uploads/works/thumb_'.$anim->img_horizontal )}});"></div>
    </div>
    @endforeach
</div>
<div class="d-md-flex flex-md-equal my-md-3 pl-md-3">
    @foreach ($diseños as $diseño)
    <div class=" mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white " style="overflow:hidden;  background-color:#{{ $diseño->color }}; ">
        <div class="my-3 py-3">
            <h2 class="display-5">{{ $diseño->titulo}}</h2>
            <p class="lead">{!! strip_tags(substr($diseño->descripcion,0,90)) !!}.</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 90%; height: 120px; border-radius: 21px 21px 0 0;background-size: cover; background-image: url({{ asset('uploads/works/thumb_'.$diseño->img_horizontal )}});"></div>
    </div>
    @endforeach
</div>


@stop