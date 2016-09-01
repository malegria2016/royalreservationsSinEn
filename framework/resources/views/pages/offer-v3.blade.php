@extends('layouts.default')

@section('title', 'St Maarten Deal')

@section('metadescription','Book your next Caribbean vacations and discover  St Maarten Island.')
@section('og_title', 'St Maarten Deal')
@section('og_image', asset('img/small/SBR-beach-and-pool.jpg')) 

@section('container')
<div class="container">

	{{--*/ 
		$hoy = date("Y-m-d H:i:s"); 
		$ban = 9;

		$end_day='2017-08-31 23:50:00';  
	/*--}}

	@if($end_day < $hoy)

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50">
    		<h2>@lang('messages.offers_old_1')</h2>
    	</div>
    	@if(count($all_offers) > 0) 
    		@foreach($all_offers as $key=>$offers)
    			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 offer marginb50">
					<a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/'.$offers->identifier:'/es/'.Lang::get('routes.offers').'/'.$offers->identifier)}}">
					<img class="img-responsive marco" src="{{ asset('img/medium/'.$offers->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offers->contents[0]->alt}}">
					</a>
					<a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/'.$offers->identifier:'/es/'.Lang::get('routes.offers').'/'.$offers->identifier)}}">
						<label>{{$offers->contents[0]->headline}}</label>
					</a>
				</div>
			@endforeach
    	@endif
    </div>
    <div class="img-responsive"><img class="img-responsive" src="https://royalreservations.com/img/general/division-01.png" alt="separator"></div>
	@endif


	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="img-responsive margint50 marginb50 marco" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/bonnier-st-maarten-deal.jpg':'img/big/bonnier-st-maarten-deal.jpg')}}" alt="St Maarten Deal">
		</div>
	</div>

@if($end_day >= $hoy)
<div class="row"> 
  <section> 
    <form class="booking" action="https://bookings.ihotelier.com/bookings.jsp" method="POST" target="_blank">  
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bookesp marginb15"> 
        <select class="form-control" id="hotelid" name="hotelid" onchange="obtenerRatePlan();"> 
          <option selected="" readonly="" value="0">Select Resort</option>  
          <option value="86179">Simpson Bay Resort and Marina</option>  
          <option value="86180">The Villas at Simpson Bay Resort &amp; Marina</option>  
        </select> 
      </div>
      <input type="hidden" name="identifier" id="identifier" value="SXMDEAL">
      <input type="hidden" name="RatePlanID" id="RatePlanID" value=""> 
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bookesp marginb15b"> 
        <div class="input-group espCalendario"> 
          <input type="text" class="form-control calendario" id="datein" name="datein" placeholder="Arrival Date" readonly=""> 
        </div> 
      </div> 
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bookesp marginb15b"> 
        <div class="input-group espCalendario"> 
          <input type="text" class="form-control calendario" id="dateout" name="dateout" placeholder="Departure Date" readonly=""> 
        </div> 
      </div> 
      <div class="clearfix"></div> 
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bookesp2 marginb15b"> 
        <select name="adults" class="form-control" id="select-adults"> 
          <option selected="" readonly="" value="0">Adults (+18)</option> 
          <option value="1">1</option> 
          <option value="2">2</option> 
          <option value="3">3</option> 
          <option value="4">4</option> 
          <option value="5">5</option> 
        </select> 
      </div> 
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bookesp2a marginb15b"> 
        <select name="children" class="form-control" id="select-teens"> 
          <option selected="" readonly="" value="0">Teen (13-17)</option> 
          <option value="1">1</option> 
          <option value="2">2</option> 
          <option value="3">3</option> 
          <option value="4">4</option> 
          <option value="5">5</option> 
        </select> 
      </div> 
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bookesp3 marginb15b"> 
        <select name="children2" class="form-control" id="select-childrens"> 
          <option selected="" readonly="" value="0">Children (0-12)</option> 
          <option value="1">1</option> 
          <option value="2">2</option> 
          <option value="3">3</option> 
          <option value="4">4</option> 
          <option value="5">5</option> 
        </select> 
      </div> 
      <div class="clearfix"></div> 
      <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 bookesp"> 
        <button type="submit" class="btn btn-success form-control col-lg-1 btnTemporal" id="btn-booking">Get This Offer</button> 
      </div> 
      <div class="clear"></div> 
    </form> 
    <div class="alert alert-danger" role="alert" id="error-date" style="display: none">Please verify your travel window</div> 
    
    <input type="hidden" name="tag_adult" id="tag_adult" value="Adults (+18)"> 
    <input type="hidden" name="tag_adult2" id="tag_adult2" value="Adults (+13)"> 
    <input type="hidden" name="tag_teen" id="tag_teen" value="Teen (13-17)"> 
    <input type="hidden" name="tag_children" id="tag_children" value="Children (0-12)"> 
    <input type="hidden" name="tag_children2" id="tag_children2" value="Children (0-17)"> 
  </section> 
</div>
@endif

	<div class="row marginb50">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h1>St Maarten Deal</h1>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@if($end_day < $hoy)
				<div class="offerInfo marginb50">
      				<span style="">@lang('messages.offers_old_2')</span>
      			</div>
      		@endif
			<div id="overview">

			<h2><strong>Book now and receive 50% OFF and 2 Free Breakfasts!</strong></h2>

			<p>Live an unforgettable vacation surrounded by the natural beauty of the Caribbean and all the comfort of our Royal Resorts in St. Maarten. Such special times demand a warm paradise with the turquoise shades of the ocean, as backdrop, the best tailor-made services and your family and friends. Take advantage of our discount 50% off in your stay at The Villas at Simpson Bay or Simpson Bay Resort & Marina.</p>

			<p>This offer includes: </p>

			<ul>
			<li>50% OFF your St Maarten accommodation</li>
			<li>2 Free Daily Breakfast per Booked night</li>
			<li>Free Wi-Fi in room and across the resort</li>
			<li>Children (-12 years old) stay free</li>
			<li>Maid service mid-week</li>
			<li>On-site parking</li>
			</ul>

			<p>This offer applies for: </p>
			<ul>
			<li>Simpson Bay Resort & Marina </li>
			<li>The Villas at Simpson Bay </li>
			</ul>

			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div id="terms">
			<p>
				<strong>Booking Window: </strong><br>
				Jun 16th 2016 - August 31th 2016 
			</p>
			<p>
				<strong>Travel Window: </strong><br>
				Jun 16th 2016 - December 18th 2017
			</p>
			<p> <strong>Terms & Conditions</strong></p>
				<ul>
					<li>2 Free Daily a la Carte Breakfasts per booked night</li>
				</ul>
			</div>
		</div>
	</div>
</div>

@stop

