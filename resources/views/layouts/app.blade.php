<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  		<title>{{ config('app.name') }}</title>
  		<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  	</head>
	<body class="{{ Request::is('/') ? 'home' : 'single' }} ">
    <div class="container" >
      <div class="row" id="header">
  <div id="admin" class="">
    <a href="{{ url('/admin/index') }}"  >index</a>
    <a href="{{ url('/admin/create') }}" >create</a>
  </div>
				<div class="col-xs-12 text-center">
					<a href="{{ url('/') }}">
            <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 304.09039 94.414215" version="1.1" height="94.414215" width="304.09039" id="logo">
              <defs id="defs2" />
              <g transform="translate(-1.367872e-6,-985.58578)" id="Base" style="stroke: @if (isset($color)) #{{$color}}  @endif">
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
				<div class="col-xs-12 text-center">
					<ul id="menu">
						<li><a class="menu-app" href="#apps">Apps, </a></li> 
						<li><a class="menu-ani" href="#anims">Animación </a></li> 
						<li><a class="menu-dis" href="#disenos">y Diseño</a></li>
					</ul>
				</div>
			</div> <!-- fin row -->
		</div>
    <div id="main">
      
      @yield('body')
      
    </div>

    <footer>
      <div class="container text-center">
        <div class="col-xs-12 col-sm-offset-4 col-sm-4">
         <h3><strong>soki</strong>studio<br><small>Río Grande , Tierra del Fuego AR</small></h3>
          <p class="small">
            diseño y desarrollo por Pablo Lizardo
          </p>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script> 
		<script type="text/javascript" src="{{ asset('js/parallax.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('bower_components/vivus/dist/vivus.min.js') }}"></script>
		{{-- <script type="text/javascript" src="{{ asset('js/jquery.smoothState.min.js') }}"></script> --}}
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	</body>
</html>