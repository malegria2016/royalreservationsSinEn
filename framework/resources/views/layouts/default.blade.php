<!DOCTYPE html>
<html lang="{{App::getLocale()}}">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#00345E">
		<meta name="ROBOTS" content="INDEX, FOLLOW">
		<title>@yield('title')</title>
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
		<meta name="apple-itunes-app" content="app-id=1082759536">

		<meta name="author" content="">
		<meta name="description" content="@yield('metadescription')">
		<meta name="keywords" content="@yield('keywords')">

		<!-- Open Graph data revision de sitio-->
		<meta property="og:title" content="@yield('og_title')" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="{{Request::url()}}" />
		<meta property="og:image" content="@yield('og_image')" />
		<meta property="og:description" content="@yield('og_description')" />
		<meta property="og:site_name" content="Royal Reservations" />
		<meta property="fb:app_id" content="1419780141570768" />

		<!-- Pinterest Tag -->
		<meta name="p:domain_verify" content="7282384a2a65a29c20cbe64a13b1c3a0"/>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		@yield('style')
	</head>

	<body>

		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/datepicker.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

		<link rel="preload" href="{{ asset('css/font-awesome.min.css') }}" as="style" onload="this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"></noscript>

		<link rel="preload" href="{{ asset('css/jquery.floating-social-share.css') }}" as="style" onload="this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="{{ asset('css/jquery.floating-social-share.css') }}"></noscript>

		<link rel="preload" href="{{ asset('css/flexslider.css') }}" as="style" onload="this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="{{ asset('css/flexslider.css') }}"></noscript>

		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>

		@include('includes.header')

		@yield('anuncio')

		@yield('booking')

		@yield('slider')

		<section>
			@yield('container')
		</section>

		@include('includes.footer')

		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.floating-social-share.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('js/easing.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery.ui.totop.min.js')}}"></script>
		
		@yield('javascript')
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NLLFCQ"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NLLFCQ');</script>
		<!-- End Google Tag Manager -->

		<!-- MOUSE FLOW -->
		<script type="text/javascript">
		   var _mfq = _mfq || [];
		   (function() {
		       var mf = document.createElement("script"); mf.type = "text/javascript"; mf.async = true;
		       mf.src = "//cdn.mouseflow.com/projects/daf21553-7c24-4bad-b65f-d4fbd3e394d9.js";
		       document.getElementsByTagName("head")[0].appendChild(mf);
		   })();
		</script>
		<!-- END MOUSE FLOW -->

		<!-- CRAZYEGG -->
		<script type="text/javascript">
			setTimeout(function(){var a=document.createElement("script");
			var b=document.getElementsByTagName("script")[0];
			a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0039/3605.js?"+Math.floor(new Date().getTime()/3600000);
			a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
		</script>
		<!--END CRAZYEGG -->

		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '1547902258864923');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1547902258864923&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->

	</body>
</html>
