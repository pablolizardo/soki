@extends('layouts.app')

@section('content')

    <div class="section section-head" id="apps" style="background-image: url('{{ url('uploads/themes'.'/'.$theme->apps_bg) }}');">
        <span class="titulo hidden-md">Apps y Web</span>
        <div class="container">
            <div class="row">
                @foreach ($apps as $app)
                    
                        <div class=" col-sm-6  col-md-4 col-lg-3 ">
                            <div class="app-wrap">
                                <a href="{{ action('WorkController@show',$app->id) }}">
                                    <div class="app-icon" style="background-image: url({{ url('uploads/works').'/'.$app->img_square}});"> </div>
                                    <h4 class="app-title">{{ $app->titulo}}</h4>
                                </a>
                                
                            </div>
                        </div>
                    
                @endforeach
            </div>
        </div>
    </div>

    <div class="section section-body" id="anims">
        <span class="titulo hidden-md">Animación</span>

        <div class="container">
            <div class="row">
                @foreach ($anims as $anim)
                    <div class=" col-sm-6  col-md-4 col-lg-3 ">
                        <div class="anim-wrap">
                            <a href="{{ action('WorkController@show',$anim->id) }}">
                                <div class="anim-image" style="background-image: url({{ url('uploads/works').'/'.$anim->img_horizontal}});"> </div>
                                <h4 class="anim-title  mt-3 mb-3 ml-1">{{ $anim->titulo}}</h4>
                            </a>
                            <p class="anim-text hidden-sm hidden-xs  ml-1">
                                {!! strip_tags(substr($anim->descripcion,0,90)) !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section section-footer" id="disenos">
        <span class="titulo hidden-md">Diseño</span>

        <div class="container">
            <div class="row">
                @foreach ($diseños as $diseño)
                    <div class=" col-sm-3  col-md-3 col-lg-2 ">
                        <div class="dis-wrap">
                            <a href="{{ action('WorkController@show',$diseño->id) }}">
                                <div class="dis-image" style="background-image: url({{ url('uploads/works').'/'.$diseño->img_vertical}});"> </div>
                                <h5 class="dis-title mt-3 mb-3 ml-1">{{ $diseño->titulo}}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@stop