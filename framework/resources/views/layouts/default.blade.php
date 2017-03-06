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
		<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
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

		@include('includes.redes-sociales')
		@include('includes.footer')
		
		<script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>

		@yield('javascript')

		<!-- Google Tag Manager The Royal Sands Resort & Spa All Inclusive -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-TS9W4GP');</script><!-- End Google Tag Manager -->

		<!-- Google Tag Manager (noscript) The Royal Sands Resort & Spa All Inclusive --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TS9W4GP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

		<!-- Google Tag Manager (noscript) The Royal Cancun All Suites Resort -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-55S6TV3"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) The Royal Caribbean All Suites Resort --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-56V8CMQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) The Royal Islander All Suites Resort --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2FF4RG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) The Royal Haciendas All Suites Resort & Spa --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MSFR4BB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) Grand Residences Riviera Cancun Resort --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH2WD66" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) Simpson Bay Resort & Marina --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBK2QQM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) The Villas at Simpson Bay Resort & Marina --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLJLFZ5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- Google Tag Manager (noscript) The Royal Sea Aquarium Resort --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T78JDTV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

		<!-- MOUSE FLOW -->
		<script type="text/javascript">
		   var _mfq = _mfq || [];
		   (function() {
		       var mf = document.createElement("script"); mf.type = "text/javascript"; mf.async = true;
		       mf.src = "//cdn.mouseflow.com/projects/daf21553-7c24-4bad-b65f-d4fbd3e394d9.js";
		       document.getElementsByTagName("head")[0].appendChild(mf);
		   })();
		</script><!-- END MOUSE FLOW -->
		<!-- CRAZYEGG -->
		<script type="text/javascript">
			setTimeout(function(){var a=document.createElement("script");
			var b=document.getElementsByTagName("script")[0];
			a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0039/3605.js?"+Math.floor(new Date().getTime()/3600000);
			a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
		</script><!--END CRAZYEGG -->
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
		/></noscript><!-- End Facebook Pixel Code -->

		<script type="text/javascript">
		    adroll_adv_id = "4TFE4LNYMRBF3JG6NS4QLS";
		    adroll_pix_id = "GWVJV3PU6NCJHNN6Z4GUAZ";
		    /* OPTIONAL: provide email to improve user identification */
		    /* adroll_email = "username@example.com"; */
		    (function () {
		        var _onload = function(){
		            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
		            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
		            var scr = document.createElement("script");
		            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
		            scr.setAttribute('async', 'true');
		            scr.type = "text/javascript";
		            scr.src = host + "/j/roundtrip.js";
		            ((document.getElementsByTagName('head') || [null])[0] ||
		                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
		        };
		        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
		        else {window.attachEvent('onload', _onload)}
		    }());
		</script>

		<!--TripAdvisor Activity name for this tag: TA_Caribbean_Islands_Travel_Royal Resorts_Transaction_8.26.14 -->
		<script type='text/javascript'>
		var axel = Math.random() + '';
		var a = axel * 10000000000000;
		document.write('<img src="https://pubads.g.doubleclick.net/activity;dc_iu=/5349/DFPAudiencePixel;ord=' + a + ';dc_seg=456767929?" width=1 height=1 border=0/>');
		</script>
		<noscript>
		<img src="https://pubads.g.doubleclick.net/activity;dc_iu=/5349/DFPAudiencePixel;ord=1;dc_seg=456767929?" width=1 height=1 border=0/>
		</noscript><!-- End TripAdvisor-->

	</body>
</html>
