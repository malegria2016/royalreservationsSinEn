@extends('layouts.default')
@if(count($offer->contents) > 0)

@section('title', $offer->contents[0]->title)

@section('metadescription',$offer->contents[0]->metadescription)
@section('keywords', $offer->contents[0]->keywords)
@section('og_title', $offer->contents[0]->title)
@section('og_image', asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $offer->contents[0]->metadescription)


@section('style')
<style>
#clockdiv{
	font-family: sans-serif;
	color: #000;
	display: inline-block;
	font-weight: 70;
	text-align: center;
	font-size: 100px;
	margin: 40px 0 0 0%;
    width: 100%;
}

#clockdiv > div{
	padding: 10px;
	display: inline-block;
}

#clockdiv div > span{
	padding: 15px;
	background: #7aaf39;
	border: 10px solid #8dc53e;
	border-radius: 50%;
	color: white;
	font-weight: bolder;
}

.smalltext{
	padding-bottom: 25px;
	font-size: 16px;
	font-family: 'Oswald', sans-serif;
}
@media screen and (max-width: 480px) {
	#clockdiv {
		font-size: 30px;
	}

	#clockdiv div > span {
		border: 5px solid #8dc53e;
	}
}

</style>

@endsection



@section('container')

{{--*/  $prefix='' /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif




<link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">

<div>
	{{--*/
		$hoy = date("Y-m-d H:i:s");
		$ban = 9;

    	if(isset($travel_window)){
    		if($travel_window[0]['start_date']>$hoy){
    			$date= strtotime($travel_window[0]['start_date']);
    			$dateInDefault=  date('m/d/Y', $date);

    			$dateOutDefault=date('m/d/Y', strtotime('+5 day',$date));
    		}
    		else{
    			$dateInDefault= date("m/d/Y",strtotime("+25 day"));
    			$dateOutDefault=date("m/d/Y",strtotime("+30 day"));
    		}
    	}
    	else{
    		$dateInDefault= date("m/d/Y",strtotime("+25 day"));
    		$dateOutDefault=date("m/d/Y",strtotime("+30 day"));
    	}
    	$ban_promo=1;
    	$banner="-dia";

    	if($offer->id==69 || $offer->id==70){
    		if(date("H:i:s") > '13:00:00' && date("H:i:s") < '23:59:00'){
    			$ban_promo=1;
    			$banner="-noche";
    		}
    		else{
    			if(date("H:i:s") > '9:01:00' && date("H:i:s") < '11:00:00'){
    				$ban_promo=1;
    				$banner="-noche";
    			}
    			else{
    				$ban_promo=0;
    				$banner="-dia";
    			}
    		}
    	}


	/*--}}

	@if($offer->end_date >= $hoy)
		@if($ban_promo !=0)
  		<div>
    		@include('includes.booking-single-offer',['rate_access_code'=>($offer->rate_access_code != '' ? $offer->rate_access_code : null),'offers_resorts'=>$offer_resort2, 'ihotelier_type'=>($offer->ihotelier_type != '' ? $offer->ihotelier_type : null)])
  		</div>
  		@endif
	@endif
</div>

<div class="container">

	@if($offer->end_date < $hoy)

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50">
    		<h2>@lang('messages.offers_old_1')</h2>
    	</div>
    	@if(count($all_offers) > 0)
    		@foreach($all_offers as $key=>$offers)
    			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 offer marginb50">
					<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offers->identifier)}}">
					<img class="img-responsive marco" src="{{ asset('img/medium/'.$offers->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offers->contents[0]->alt}}">
					</a>
					<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offers->identifier)}}">
						<label class="pointer">{{$offers->contents[0]->headline}}</label>
					</a>
				</div>
			@endforeach
    	@endif
    </div>
    <div class="img-responsive"><img class="img-responsive" src="https://royalreservations.com/img/general/division-01.png" alt="separator"></div>
	@endif

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			@if($offer->id==69 || $offer->id==70)
				
				{{--*/  /*--}}

				@if((date("H:i:s") > '13:00:00' && date("H:i:s") < '23:59:00') || (date("H:i:s") > '00:01:00' && date("H:i:s") < '18:59:00'))
				
				<div id="clockdiv">
					<div>
						<div class="smalltext">Hours</div>
						<span class="hours"></span>						
					</div>
					<span>:</span>
					<div>
						<div class="smalltext">Minutes</div>
						<span class="minutes"></span>						
					</div>
					<span>:</span>
					<div>
						<div class="smalltext">Seconds</div>
						<span class="seconds"></span>
						
					</div>
				</div>

				<img class="img-responsive margint50 marco" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$offer->identifier.'-'.App::getLocale().$banner.'.jpg':'img/big/'.$offer->identifier.'-'.App::getLocale().$banner.'.jpg')}}" alt="{{$offer->contents[0]->alt}}">

				@else
				<img class="img-responsive margint50 marco" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$offer->identifier.'-'.App::getLocale().$banner.'.jpg':'img/big/'.$offer->identifier.'-'.App::getLocale().$banner.'.jpg')}}" alt="{{$offer->contents[0]->alt}}">
				@endif
			@else
			<img class="img-responsive margint50 marco" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg':'img/big/'.$offer->identifier.'-'.App::getLocale().'.jpg')}}" alt="{{$offer->contents[0]->alt}}">
			@endif
		</div>
	</div>

    <script>  var travel_window = {!!  json_encode($travel_window->toArray()) !!};</script>

	<div class="row marginb50">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h1>{{$offer->contents[0]->headline}}</h1>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

			@if($offer->end_date < $hoy)
				<div class="offerInfo marginb50">
      				<span style="">@lang('messages.offers_old_2')</span>
      			</div>
      		@endif

			<div id="overview">{!!$offer->contents[0]->overview !!}</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div id="terms">{!!$offer->contents[0]->conditions !!}</div>
		</div>
	</div>
</div>

@if($offer->id==69 || $offer->id==70)

@else
<div class="container">
	<div class="row">
		@foreach($resorts as $key=>$resort)
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 resort-small">
			<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><img class="img-responsive marco" src="{{asset('img/small/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
			@if($resort->plan == 'All Inclusive')
			<div class="resort-all"></div>
			@elseif($resort->plan == 'All Inclusive/Room Only')
			<div class="resort-all-room"></div>
			@endif
			<div class="marcoInferior marginb100">
				<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}" class="offersHotels"><span>{{ $resort->name }}</span></a>
				<div class="resort_stars">
					{{--*/ $stars = round( $resort->stars * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
					@while($i <= $stars - 1)
						<i class="fa fa-star"></i>
						{{--*/ $i += 2; /*--}}
					@endwhile
					@if($stars & 1)
						<i class="fa fa-star-half-o"></i>
					@endif
				</div>
				<label class="offersPorcentage">@lang('messages.up_to') {{ $resort->discount }}% @lang('messages.off')</label>
				<div class="ofertaBook">
					<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
						<input name="hotelid" type="hidden" value="{{$resort->ihotelier_id}}" />
						<input name="themeid" type="hidden" value="{{$resort->ihotelier_theme}}" />
						<button type="submit" class="btn btn-danger pull-right">@lang('messages.book')</button>
					</form>
				</div>
			</div>
		</div>
		@if(($key + 1) % 3 == 0)
		<div class="clearfix"></div>
		@endif
		@endforeach
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50 text-center">
			<a href="{{url($prefix.Lang::get('routes.offers'))}}" class="btn btn-danger btn-lg">@lang('messages.back_offers')</a>
		</div>
	</div>

</div>


@endif


@stop
@endif

@section('javascript')
<script>

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  //var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  //var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    //daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(2016, 10,20, 04,00,00,00);

initializeClock('clockdiv', deadline);

</script>
@stop
