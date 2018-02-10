@php use App\Theme; $theme = Theme::where('activo','1')->first(); @endphp

<!DOCTYPE html>
<html lang="es" @if(Request::is('works/*') )  itemscope itemtype="http://schema.org/Article" @endif  prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name') }} @yield('title')</title>
		<meta name="keywords" content="soki studio, soki, studio, rio grande, tierra del fuego, argentina, animacion, diseño, app, presupuesto, cotizacion, web, webs, 3d, blender, php , opensource, free software, estudio, soki estudio, diseño grafico, Río Grande, Patagonia @yield('keywords')"/>

		<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">       
		
		<!-- Google Tag Manager -->
		{{--  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-WM3269V');</script>  --}}
		<!-- End Google Tag Manager -->

		@if(Request::is('works*') ) 
			{{-- IS SINGLE PAGE OR BLOG POST --}}
			<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lightbox2/dist/css/lightbox.min.css') }}">
			@yield('metadata')
		@else 
			{{-- IS HOME --}}
			<meta name="description" content="{{ config('app.name') }} @yield('title') - {{ $theme->frase }} "/>
			<meta name="copyright" content="Soki Studio 2017">
			<meta name="author" content="Soki Studio"/>
			<meta name="application-name" content="{{ config('app.name') }} @yield('title')">
			<link rel="author" href="https://plus.google.com/+SokistudioArg/posts"/>
			<link rel="publisher" href="https://plus.google.com/+SokistudioArg"/>
			<meta itemprop="name" content="{{ config('app.name') }}">
			<meta itemprop="description" content="{{ $theme->frase }}">
			<meta itemprop="image" content="{{ asset('uploads/themes/'.$theme->apps_bg) }}">
			<meta name="twitter:card" content="summary_large_image">
			<meta name="twitter:site" content="@sokistudio">
			<meta name="twitter:creator" content="@pablolizardo">
			<meta name="twitter:title" content="{{ config('app.name') }}">
			<meta name="twitter:text:description" content="{{ $theme->frase }}">
			<meta name="twitter:description" content="{{ $theme->frase }}">
			<meta name="twitter:image" content="{{ asset('uploads/themes/'.$theme->apps_bg) }}">
			<meta name="twitter:image:src" content="{{ asset('uploads/themes/'.$theme->apps_bg) }}">
			<meta property="og:title" content="{{ config('app.name') }}" />
			<meta property="og:type" content="article" />
			<meta property="og:url" content="{{ Request::url() }}" />
			<meta property="og:image" content="{{ asset('uploads/themes/'.$theme->apps_bg) }}" />
			<meta property="og:video" content="https://www.youtube.com/user/SokiARG" />
			<meta property="og:site_name" content="{{ config('app.name') }}" />
			<meta property="og:description" content="{{ $theme->frase }}" />
			<meta property="og:site_name" content="{{ config('app.name') }}" />
			<meta property="article:published_time" content="2017-01-01" />
			<meta property="article:modified_time" content="2017-01-01" />
			<meta property="fb:admins" content="208715565813337" />
			<meta property="og:locale" content="es_ES" />
			<meta property="og:locale:alternate" content="en_GB" />

			{{-- SCHEMA.ORG --}}
			<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "Organization",
					"url": "http://www.soki.com.ar",
					"logo": "http://www.soki.com.ar/public/img/logo_nuevo.png"
				}
			</script>

		@endif

		{{-- FACEBOOK --}}
		{{--  <script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-2791566-23', 'auto'); ga('send', 'pageview'); </script>  --}}

		{{-- GOOGLE --}}
		{{--  <script src="https://apis.google.com/js/platform.js" async defer> {lang: 'es-419'} </script>  --}}

		{{-- COLOR THEME ON LINKS --}}
		<style type="text/css"> a , .btn {color : #{{$theme->color_primary}}; } </style>


	</head>

		<body class="{{ Request::is('/') ? 'home' : 'single' }} ">

		<!-- Google Tag Manager (noscript) -->
		{{--  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WM3269V" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>  --}}
		<!-- End Google Tag Manager (noscript) -->
		
		{{-- FACEBOOK --}}
		{{--  <div id="fb-root"></div> <script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>  --}}

		@include( 'layouts.header' )
		
		<div id="app">
			@yield('content')
		</div>
			
		@include('layouts.footer')

		<script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script> 
		<script type="text/javascript" src="{{ asset('bower_components/vivus/dist/vivus.min.js') }}"></script>
		@if( Request::is('works*') ) <script type="text/javascript" src="{{ asset('bower_components/lightbox2/dist/js/lightbox.min.js') }}"></script> @endif
		
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

		@yield('scripts')

		</body>
</html>