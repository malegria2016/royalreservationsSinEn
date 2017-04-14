@extends('layouts.default')
@if(count($offer->contents) > 0)

@section('title', $offer->contents[0]->title)

@section('metadescription',$offer->contents[0]->metadescription)
@section('keywords', $offer->contents[0]->keywords)
@section('og_title', $offer->contents[0]->title)
@section('og_image', asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $offer->contents[0]->metadescription)


@section('style')
<link rel="stylesheet" href="{{ asset('css/reloj-contador.css') }}">
@endsection


@section('container')

{{--*/  $prefix='' /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif

<div class="container" id="offer">
	<div class="row" style="background-color: #ccc;">
    	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    		<img class="img-responsive" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg':'img/big/'.$offer->identifier.'-'.App::getLocale().'.jpg')}}" alt="{{$offer->contents[0]->alt}}"/>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
    </div>
    <div class="row" style="background-color:#000;">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<ul>
    			<li><a href="#">Best Deal</a></li>
    			<li><a href="#">Book Now and Pay Later</a></li>
    			<li><a href="#">Why Book with Us</a></li>
    		</ul>
    	</div>
    </div>
    <div class="row">
    	<!--DIV IZQ-->
    	<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">    		
    		<h2>{{$offer->contents[0]->title_short_description}}</h2>
    		<p>{{$offer->contents[0]->short_description}}</p>

    		<h1>{{$offer->contents[0]->headline}}</h1>
    		<h3>{{$offer->contents[0]->item1}}</h3>
    		<h4>{{$offer->contents[0]->item2}}</h4>

    		<div id="overview">{!!$offer->contents[0]->overview !!}</div>

    		@if($offer->contents[0]->room_only !='' && $offer->contents[0]->all_inclusive !='')
    		<div id="all-inclusive" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color: #abd6ac;">
    			<div>For All Inclusive Plan --</div>
    			<div>
    				{!!$offer->contents[0]->all_inclusive!!}
    				<button type="button" class="btn btn-warning">Reserve your Room</button>
    			</div>
    		</div>
    		<div id="room-only" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color: #d6caab;">
    			<div>For Room Only Plan **</div>
    			<div>
    				{!!$offer->contents[0]->room_only!!}
    				<button type="button" class="btn btn-warning">Reserve your Room</button>
    			</div>
    		</div>
    		@else
    			@if($offer->contents[0]->room_only !='')
	    		<div id="room-only" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #d6caab;">
	    			<div>For Room Only Plan **</div>
	    			<div>
	    			{!!$offer->contents[0]->room_only!!}
	    			<button type="button" class="btn btn-warning">Reserve your Room</button>
	    			</div>
	    		</div>
				@endif
				@if($offer->contents[0]->all_inclusive !='')
	    		<div id="all-inclusive" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="background-color: #abd6ac;">
	    			<div>For All Inclusive Plan --</div>
	    			<div>
	    			{!!$offer->contents[0]->all_inclusive!!}</div>
	    			<button type="button" class="btn btn-warning">Reserve your Room</button>
	    			</div>
				@endif	    		
    		@endif

    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    			-- Expiring on<br/>
    			{{ $end_date}}<br/>
    		</div>
    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    			<div>--Terms & Conditions</div>
    			<div>{!!$offer->contents[0]->conditions !!}</div>
    		</div>

    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    			<div>-- Travel window</div>
    			<div>
    				@foreach($tx_tw as $key=>$tw)
    					{{$tw['start_date']}} - {{$tw['end_date']}}
    				@endforeach
    			</div>
    		</div>


    	</div><!--FIN DIV IZQ-->

    	<!--DIV DER-->
    	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    		Expiring on<br/>
    		{{ $end_date}}<br/>

    		{{ $offer_resort2[0]['minimum'] }} nigth-stay minimum required<br/>

    		<br/>
    		This offer applies for<br/>

    		@foreach($resorts as $key=>$resort)
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><img class="img-responsive" src="{{asset('img/small/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
				</div>

				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><span>{{ $resort->name }}</span></a>
					<div class="resort_stars">
						{{--*/ $stars = round( $resort->stars * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
						@while($i <= $stars - 1)
							<i class="fa fa-star"></i>
							{{--*/ $i += 2; /*--}}
						@endwhile
						@if($stars & 1)
							<i class="fa fa-star-half-o"></i>
						@endif

						@if($resort->plan == 'All Inclusive')
						<div>All Inclusive</div>
						@elseif($resort->plan == 'All Inclusive/Room Only')
						<div>All Inclusive/Room Only</div>
						@endif

						@if($resort->plan == 'EP')
						<div>Only Room</div>
						@endif
					</div>
					
					<div>
						<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
							<input name="hotelid" type="hidden" value="{{$resort->ihotelier_id}}" />
							<input name="themeid" type="hidden" value="{{$resort->ihotelier_theme}}" />
							<button type="submit" class="btn btn-success">@lang('messages.book')</button>
						</form>
					</div>
				</div>
			@if(($key + 1) % 3 == 0)
			<div class="clearfix"></div>
			@endif
			@endforeach

			<div class="clearfix"></div>
			<br/><br/>
			Reviews<br/>

    		
    	</div><!--FIN DIV DER-->	
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		{!!$offer->contents[0]->footer !!}
    	</div>
    </div>

</div>

<div class="container">


    <script>  var travel_window = {!!  json_encode($travel_window->toArray()) !!};</script>

	<div class="row marginb50">
   
	</div>
</div>

@stop
@endif

@section('javascript')
<script>

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  return {
    'total': t,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

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

var deadline = new Date(2016,11,31, 06,00,00,00);

initializeClock('clockdiv', deadline);

</script>
@stop
