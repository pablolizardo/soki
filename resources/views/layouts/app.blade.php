<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lightbox2/dist/css/lightbox.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">       

    </head>
    <body class="{{ Request::is('/') ? 'home' : 'single' }} ">

        @include( 'layouts.menu' )
        @php
            use App\Theme;
            $theme = Theme::where('activo','1')->first();
        @endphp

        <style type="text/css">
            a , .btn {color : #{{$theme->color_primary}}; }
        </style>

    @yield('scripts')
    
    <div class="container" >
      <div class="row" id="header">
                <div class="col-md-12 text-center">
                    <a href="{{ url('/') }}">
                        <svg  xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 304.09039 94.414215" version="1.1" height="94.414215" width="304.09039" id="logo">
                          <defs id="defs2" />
                          <g transform="translate(-1.367872e-6,-985.58578)" id="Base" style="stroke: #{{$theme->color_primary}} ">
                            <path   id="S" d="M 69.53608,1000.4074 C 51.1147,979.53956 4.74779,984.28298 4.74779,1008.633 c 0,27.795 64.40174,18.5772 64.78829,44.7268 0.42926,29.0388 -48.84831,30.846 -68.90183,14.3948" />
                            <circle id="O" r="45.5" cy="1032.7928" cx="135.09039" />
                            <path   id="k1" d="m 207.09039,987.04289 v 91.50001" />
                            <path   id="k2" d="m 206.59039,1047.2929 61,-61.00001" />
                            <path   id="k3" d="m 232.34039,1021.7929 57.5,57.5" />
                            <path   id="i" d="m 303.09039,987.04289 v 91.50001"  />
                          </g>
                        </svg>
                      </a>
                </div>

                <div class="col-md-12 text-center">
                    <ul id="menu">
                        <li><a class="menu-app" href="#apps">Apps, </a></li> 
                        <li><a class="menu-ani" href="#anims">Animación </a></li> 
                        <li><a class="menu-dis" href="#disenos">y Diseño</a></li>
                    </ul>
                </div>
                 <div class="col-md-12">
                   @if(Session::has('message'))
                        <br>
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                </div>
            </div> <!-- fin row -->
        </div>
    <div id="main">
      
      @yield('content')
      
    </div>

    <footer>
      <div class="container text-center" >
       
          <div class="row">
            
            <div class="col-sm-4 text-center footer-links">
                <a class="btn btn-outline-secondary" href="{{ action('PresupuestoController@create') }}">Solicitar cotizacion</a>
            <br>
            <br>
                <div hidden>
                    
                @if (Request::is('/') )
                    <a href="{{ url('#apps') }}">Apps, </a>
                    <a href="{{ url('#anims') }}">Animación</a>
                    <a href="{{ url('#disenos') }}">y Diseño.</a>
                @else
                    <a href="{{ url('/') }}">Apps, </a>
                    <a href="{{ url('/') }}">Animación</a>
                    <a href="{{ url('/') }}">y Diseño.</a>
                @endif
                <br>
                </div>
                <small> También tenemos <a href="{{ url('/blog/') }}"> blog</a> </small>
            </div>
            
            <div class="col-sm-4">
             <h4 class="mt-4">
                 <a href="{{ url('/') }}"><strong>soki</strong>studio</a>
                 <a href="{{ url('https://es.wikipedia.org/wiki/R%C3%ADo_Grande_(Tierra_del_Fuego)') }}"><br><small>Río Grande , Tierra del Fuego AR</small></a>
             </h4>
              <p class="small">
                diseño y desarrollo por <a href="mailto:lizardo.pablo@gmail.com">Pablo Lizardo</a>
              </p>
            </div>
            <div class="col-sm-4 footer-social">
                <a href="{{ url('/blog/') }}"><i class="fa fa-facebook-square"></i></a>
                <a href="{{ url('/blog/') }}"><i class="fa fa-instagram"></i></a>
                <a href="{{ url('/blog/') }}"><i class="fa fa-twitter-square"></i></a>
                <a href="{{ url('/blog/') }}"><i class="fa fa-google-plus-square"></i></a>
            </div>
          </div>
      </div>
    </footer>

    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('bower_components/lightbox2/dist/js/lightbox.min.js') }}"></script> 
    {{-- <script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/dist/util.js') }}"></script>  --}}
    {{-- <script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/dist/carousel.js') }}"></script>  --}}
    <script type="text/javascript" src="{{ asset('js/parallax.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('bower_components/simple-slider/dist/simpleslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/vivus/dist/vivus.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/jquery.smoothState.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>