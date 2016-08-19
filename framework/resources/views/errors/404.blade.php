<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="shortcut icon" href="https://royalreservations.com/favicon.ico">

		<meta name="author" content="">
		<meta name="description" content="">
		<meta name="keywords" content="">

		<!-- Open Graph data revision de sitio-->
		<meta property="og:title" content="" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://royalreservations.com/packages/chichen-itza" />
		<meta property="og:image" content="https://royalreservations.com/img/medium/chichen-itza-en.jpg" />
		<meta property="og:description" content="" />
		<meta property="og:site_name" content="Royal Reservations" />
		<meta property="fb:app_id" content="1419780141570768" />

		<link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/bootstrap.min.css">
		<link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/ui.totop.css">
		<link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/datepicker.css">
		<link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/font-awesome.min.css">
		<link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/jquery.floating-social-share.css">
		<link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/main.css">
		
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<style>
			.link {color:#FF6600;}
			.tx-white { color: white; padding: 10px 0; }
			div#overview.text-justify ul li a:focus {color: #769DBF;}
		</style>
	</head>

	<body>
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="container">
						<div class="navbar-header">
							<a class="navbar-brand" href="https://royalreservations.com">
								<img src="https://royalreservations.com/img/logo/royal-reservations-logo.png"/>
							</a>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<section>
			<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<img class="img-responsive margint50 marginb50 marco" src="https://royalreservations.com/img/big/404.jpg" alt="Royal Reservations">

					<p class="marginb30"><strong> @lang('messages.tx_404')</strong></p>
				</div>
			</div>
			{{--*/  $prefix='' /*--}}
			@if (App::getLocale() == 'en')
				{{--*/ $prefix=''/*--}}
			@elseif (App::getLocale() == 'es')
				{{--*/ $prefix='es/'/*--}}
			@endif
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
					<div id="overview" class="text-justify">
						<h2 class="marginb15b link">Resorts</h2>
						<span><strong>@lang('messages.mexico')</strong></span>
						<ul>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/grand-residences')}}">Grand Residences Riviera Cancun Resort</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-royal-haciendas')}}">The Royal Haciendas All Suites Resort & Spa</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-royal-sands')}}">The Royal Sands Resort & SPA All Inclusive</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-royal-islander')}}">The Royal Islander, An All Suites Resort</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-royal-caribbean')}}">The Royal Caribbean, An All Suites Resort</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-royal-cancun')}}">The Royal Cancun All Suites Resort</a></li>
						</ul>
						<strong>@lang('messages.caribbean')</strong>
						<ul>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/simpson-bay-resort-and-marina')}}">Simpson Bay Resort and Marina</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-villas-at-simpson-bay-resort-and-marina')}}">The Villas at Simpson Bay Resort & Marina</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.resorts').'/the-royal-sea-aquarium')}}">The Royal Sea Aquarium Resort</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
					<div id="overview" class="text-justify">
						<h2 class="marginb15b link">@lang('messages.tx_general')</h2>
						<strong>@lang('messages.all-inclusive')</strong>
						<ul>
							<li><a href="{{url($prefix.Lang::get('routes.all-inclusive'))}}">@lang('messages.tx_refine')</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.all-inclusive'))}}">All-in Grand Experience</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.all-inclusive'))}}">@lang('messages.tx_allinc')</a></li>
						</ul>
						<strong>@lang('messages.offers')</strong>
						<ul>
							<li><a href="{{url($prefix.Lang::get('routes.offers'))}}">{{  (App::getLocale()=='es')? 'Todas las ':'All '}} @lang('messages.offers')</a></li>
						</ul>
						<strong>@lang('messages.tx_packages')</strong>
						<ul>
							<li><a href="{{url($prefix.Lang::get('routes.offers'))}}">{{  (App::getLocale()=='es')? 'Todos los ':'All '}} @lang('messages.tx_packages')</a></li>
						</ul>

					</div>
					
				</div>
				<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
					<div id="terms" class="text-center">
						<a href="{{url($prefix)}}"><img src=" https://royalreservations.com/img/general/logo-royal-404.png " alt="Royal Reservations"></a>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center margint50"> 
						<a href="{{url($prefix)}}" class="btn btn-danger">@lang('messages.tx_home')</a>
					</div>

				</div>
			</div>
		</section>
		<footer class="margint50">
			<div class="container-fluid footerNewsletter">
				<div class="container">
					<div class="row">
						<div class="col-lg-10 tx-white">404 - Sorry Page not found or No longer Available</div>
						<div class="simH2 col-lg-2">
							<a href="https://www.facebook.com/RoyalReservations" target="_blank"><img src="https://royalreservations.com/img/logo/facebook.jpg"></a>
							<a href="http://www.twitter.com/royalresorts" target="_blank"><img src="https://royalreservations.com/img/logo/twitter.jpg"></a></div>
					</div>
				</div>
			</div>
		</footer>


		<script src="https://royalreservations.com/js/jquery.js"></script>
		<script src="https://royalreservations.com/js/bootstrap.min.js"></script>
		<script src="https://royalreservations.com/js/jquery.ui.totop.min.js"></script>
		<script src="https://royalreservations.com/js/easing.js"></script>
		<script src="https://royalreservations.com/js/bootstrap-datepicker.js"></script>
		<script src="https://royalreservations.com/js/jquery.floating-social-share.js"></script>
		<script src="https://royalreservations.com/js/main.js"></script>

		<!-- Google Tag Manager -->
		<noscript>
			<iframe src="//www.googletagmanager.com/ns.html?id=GTM-NLLFCQ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<script>
			(function(w,d,s,l,i)
				{
					w[l]=w[l]||[];w[l].push(
						{
							'gtm.start':
							new Date().getTime(),event:'gtm.js'
						});var f=d.getElementsByTagName(s)[0],
					j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
					'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
				})(window,document,'script','dataLayer','GTM-NLLFCQ');
		</script>
		<!-- End Google Tag Manager -->
	</body>
</html>