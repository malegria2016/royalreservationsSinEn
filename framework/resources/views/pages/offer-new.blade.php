@extends('layouts.default')
@if(count($offer->contents) > 0)

@section('title', $offer->contents[0]->title)

@section('metadescription',$offer->contents[0]->metadescription)
@section('keywords', $offer->contents[0]->keywords)
@section('og_title', $offer->contents[0]->title)
@section('og_image', asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $offer->contents[0]->metadescription)


@section('style')
<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cinzel:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/landings.css') }}">
@endsection


@section('container')

{{--*/  $prefix='' /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif

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

	/*--}}

	@if($offer->end_date < $hoy)
	<div class="container mainarea">
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50">
    		<h2>@lang('messages.offers_old_1')</h2>
    	</div>
    	@if(count($all_offers) > 0)
    		@foreach($all_offers as $key=>$offers)
    			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 offer marginb50">
					<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offers->identifier)}}">
					<img class="img-responsive marco" src="{{ asset('img/medium/'.$offers->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offers->contents[0]->alt}}" title="{{$offers->contents[0]->alt}}">
					</a>
					<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offers->identifier)}}">
						<label class="pointer">{{$offers->contents[0]->headline}}</label>
					</a>
				</div>
			@endforeach
    	@endif
    </div>
    <div class="img-responsive"><img class="img-responsive" src="{{asset('img/general/division-01.png')}}" alt="separator"></div>
    </div>
	@endif

<div class="container mainarea">
	<div class="row">
    	<div class="col-md-8 nopadding">
    		<img class="img-responsive" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/small/'.$offer->identifier.'-'.App::getLocale().'.jpg':'img/offers/'.$offer->identifier.'-'.App::getLocale().'.jpg')}}" alt="{{$offer->contents[0]->alt}}"/>
    	</div>

    	@if($offer->end_date >= $hoy)
    	<div class="b002">
        	<p>@lang('messages.form_title')</p>
    	</div>
    	<div class="col-md-4 b00">
    		@include('includes.booking-single-offer-new',['rate_access_code'=>($offer->rate_access_code != '' ? $offer->rate_access_code : null),'offers_resorts'=>$offer_resort2, 'ihotelier_type'=>($offer->ihotelier_type != '' ? $offer->ihotelier_type : null)])
    	</div>
    	@else
		<div class="col-md-4 b02">
			<div class="offerInfo"><span style="">@lang('messages.offers_old_2')</span></div>
    		<h2>{{$offer->contents[0]->title_short_description}}</h2>
	        <p>{!!$offer->contents[0]->short_description!!}</p>
		</div>
		<div id="clockdiv" class="msgError"><span class="days"></span><span class="hours"></span><span class="minutes"></span><span class="seconds"></span></div><div id="clockday" class="msgError"><span class="days"></span><span class="hours"></span><span class="minutes"></span><span class="seconds"></span></div>
    	@endif

    	<div class="col-md-12 b01">
	        <div class="col-md-4 col-sm-12">
	            <img src="{{asset('img/general/b01-icon.jpg')}}" class="">
	            <p>@lang('messages.best_deal')</p>
	        </div>
	        <div class="col-md-4 col-sm-12">
	            <img src="{{asset('img/general/b01-icon.jpg')}}" class="">
	            <p>@lang('messages.book_now_pay_later')</p>
	        </div>
	        <div class="col-md-4 col-sm-12">
	            <img src="{{asset('img/general/b01-icon.jpg')}}" class="">
	            <p>@lang('messages.why_book_with_us')</p>
	        </div>
	        <div class="clear"></div>
	    </div>

	@if($offer->end_date >= $hoy)
    	<div class="col-md-8 b02">
	        <h2>{{$offer->contents[0]->title_short_description}}</h2>
	        <p>{!!$offer->contents[0]->short_description!!}</p>
	        <hr>
	    </div>

		<div class="col-md-4 nopadding b034">
			@if($offer->category==1)
    			@if($urgency==1)
    			<div id="clockday" class="col-md-12 nopadding b031">
		            <img src="{{asset('img/general/icon-01.png')}}" class="img01 b032">
		            <p>Time left (Hurry, <span>Only <span class="days"></span> days left</span>)</p>
		            <span class="msgError"><span class="hours"></span><span class="minutes"></span><span class="seconds"></span></span>
		        </div>
		        <div id="clockdiv" class="col-md-12 b03">
		        	<div><span class="days"></span><div class="smalltext">@choice('messages.days', 2)</div></div>
		            <div><span>:</span><div class="smalltext">&nbsp;</div></div>
		            <div class="b033"><span class="hours"></span><div class="smalltext">@lang('messages.hours')</div></div>
		            <div><span>:</span><div class="smalltext">&nbsp;</div></div>
		            <div class="b033"><span class="minutes"></span><div class="smalltext">@lang('messages.minutes')</div></div>
		            <div><span>:</span><div class="smalltext">&nbsp;</div></div>
		            <div class="b033"><span class="seconds"></span><div class="smalltext">@lang('messages.seconds')</div></div>
		        </div> 
    			@else
    			<div id="clockdiv" class="msgError"><div><span class="days"></span></div><div><span class="hours"></span></div><div><span class="minutes"></span></div><div><span class="seconds"></span></div></div><div id="clockday" class="msgError"><span class="days"></span><span class="hours"></span><span class="minutes"></span><span class="seconds"></span></div>
				<div class="col-md-12 b04">
		            <img src="{{asset('img/general/icon-01.png')}}" class="img01 b044">
		            <p>@lang('messages.act_now')</p>
		        </div>
		        <div class="col-md-12 b041">
		            <p class="b042">{{ $end_date}}</p>
		            <p class="b043">{{ $offer_resort2[0]['minimum'] }} @lang('messages.minimun')</p>
		        </div>

    			@endif
    		@else
    			<div id="clockdiv" class="msgError"><div><span class="days"></span></div><div><span class="hours"></span></div><div><span class="minutes"></span></div><div><span class="seconds"></span></div></div><div id="clockday" class="msgError"><span class="days"></span><span class="hours"></span><span class="minutes"></span><span class="seconds"></span></div>
    			<div class="col-md-12 b04">
		            <img src="{{asset('img/general/icon-01.png')}}" class="img01 b044">
		            <p>@lang('messages.tx_1')</p>
		        </div>
	    		<div class="col-md-12 b041">
		            <p class="b042">@lang('messages.tx_2')</p>
		            <p class="b043">{{ $offer_resort2[0]['minimum'] }} @lang('messages.minimun')</p>
		        </div>
    		@endif
    	</div>


	    <div class="col-md-8 b05">
	        @if($offer->contents[0]->overview !="")
	        <h1>{{$offer->contents[0]->headline}}</h1>
	        <h3>{{$offer->contents[0]->item1}}</h3>
	        <h4>{{$offer->contents[0]->item2}}</h4>
	        <div class="b054">{!!$offer->contents[0]->overview !!}</div>
	        @endif

	        @foreach($offer_contents_plan as $key=>$offer_content_plan)
	        <div class="col-md-6 b057">
	            <div class="b053">
	                <img src="{{asset('img/general/icon-plan-'.$offer_content_plan->plan_id.'.png')}}" class="img01 img013">
	                <p>{{$offer_content_plan->title}}</p>
	            </div>
	            <div class="b051 b058">
	                {!!$offer_content_plan->benefits!!}
	                <button type="button" id="btn-plan{{$offer_content_plan->plan_id>0?$offer_content_plan->plan_id:99}}" class="b059">@lang('messages.search')</button>
	            </div>
	        </div>
	        @if(($key + 1) % 2 == 0)
			<div class="clearfix"></div>
			@endif
	        @endforeach

	        <div class="col-md-6 b057">
	            <div class="">
	                <div class="b0531">
	                    <img src="{{asset('img/general/icon-05.png')}}" class="img01 img013">
	                    <p>@lang('messages.expiring')</p>
	                </div>
	                <div class="b051">
	                    <p>{{ $end_date}}</p>
	                </div>
	            </div>
	            
	            <div class="b0531">
	                <img src="{{asset('img/general/icon-06.png')}}" class="img01 img014">
	                <p>@lang('messages.travel_window')</p>
	            </div>
	            <div class="b051">
	                @foreach($tx_tw as $key=>$tw)
    					<p>{{$tw['start_date']}} - {{$tw['end_date']}}</p>
    				@endforeach
	            </div>
	        </div>

	        @if($offer->contents[0]->conditions!="")
	        <div class="col-md-6 b057">
	            <div class="">
	                <div class="b0531">
	                    <img src="{{asset('img/general/icon-07.png')}}" class="img01 img013">
	                    <p>@lang('messages.terms')</p>
	                </div>
	                <div class="b051 b058">{!!$offer->contents[0]->conditions !!}</div>
	            </div>
	        </div>
	        @endif

	    </div><!--FIN col-md-8-->

	    <div class="col-md-4 b06">
	        <p class="b061">@lang('messages.resorts_apply')</p>

	        @foreach($resorts as $key=>$resort)

	        <div class="b0611">
	            <div class="col-md-3 col-xs-3 b068">
	                <a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><img src="{{asset('img/thumbnail/'.$resort->identifier.'.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
	                <!-- BOTON DE VISTA DE CUARTO {SE HABILITARA APARTIR DEL 10-JUN-17} <a href="#" class="b0693">View Room</a> -->
	            </div>
	            <div class="col-md-9 col-xs-9 b069">
	                <p class="b062">{{ $resort->area }}, {{ $resort->location }}</p>
	                <p class="b063"><a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><span>{{ $resort->name }}</span></a></p>
	                <div class="resort_stars">
						{{--*/ $stars = round( $resort->stars * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
						@while($i <= $stars - 1)
							<i class="fa fa-star"></i>
							{{--*/ $i += 2; /*--}}
						@endwhile
						@if($stars & 1)
							<i class="fa fa-star-half-o"></i>
						@endif
						<img src="{{asset('img/general/tripadvisor-stars'.$resort->rating_trip_advisor.'.jpg')}}" class="b0691 img02">
						<div class="clear"></div>
						<hr>
						
					</div>
					@for($i=0;$i<count($offer_resort_plan); $i++)
						@if($offer_resort_plan[$i]->resort_id==$resort->id)
							<p class="b064"> {{ $offer_resort_plan[$i]->a_name}}</p>
							@if($offer_resort_plan[$i]->plan_id==1)
								<p class="b065">@lang('messages.ai')</p>
							@endif
							@if($offer_resort_plan[$i]->plan_id==2)
								<p class="b065">@lang('messages.ro')</p>
							@endif
							@if($offer_resort_plan[$i]->plan_id==3)
								<p class="b065">Bed and Breakfast</p>
							@endif
							<p class="b066"><span>@lang('messages.starting_at')</span> ${{ $offer_resort_plan[$i]->price}} USD <span>@lang('messages.per_night')</span></p>
							<div class="clear"></div>
	                		<hr>
						@endif
					@endfor
	           		<button type="button" id="btn-{{$resort->ihotelier_id}}" class="b067">@lang('messages.search')</button>  
	            </div>
	            <div class="clear"></div>
	            <hr class="b0692">
	        </div>


	        @if($offer->ihotelier_type==1) 
				@foreach($offer_resort2 as $key=>$offer_resort)
					@if($offer_resort['id']==$resort->id)
						{{--*/
						echo '<script languaje="JavaScript"> var Jrate'.$resort->ihotelier_id.'='.$offer_resort['ihotelier_rate_id'].'; var Jpackage'.$resort->ihotelier_id.'=1010; var Jminimum'.$resort->ihotelier_id.'='.$offer_resort['minimum'].'; </script>';
						/*--}}
					@endif
				@endforeach
			@endif

			@if($offer->ihotelier_type==2) 
				@foreach($offer_resort2 as $key=>$offer_resort)
					@if($offer_resort['id']==$resort->id)
						{{--*/
						echo '<script languaje="JavaScript"> var Jpackage'.$resort->ihotelier_id.'='.$offer_resort['ihotelier_rate_id'].'; var Jrate'.$resort->ihotelier_id.'=1010; var Jminimum'.$resort->ihotelier_id.'='.$offer_resort['minimum'].'; </script>';
						/*--}}
					@endif
				@endforeach
				<input type="hidden" name="packageId" id="packageId" value="">				
			@endif

	        @endforeach

	        <div class="b070">
	            <p class="b07">@lang('messages.reviews')</p>
	            @foreach($reviews as $key=>$review)
	            {{--*/ $d=date_create($review->review_date); /*--}}
				<p class="b071">{{$review->review}}</p>
				<p class="b074"><span class="b072">{{$review->traveler_name}}</span> - <span class="b073">{{$review->city}}, {{date_format($d,"m/d/Y")}}</span></p>
				@endforeach
	        </div>

	    </div> <!-- FIN COL 4-->

	    {!!$offer->contents[0]->footer !!}

	@endif

	</div><!--FIN ROW-->


			<!-- Modal -->
			<div id="dates" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div  class="modal-header m02">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 id="title" class="m07">@lang('messages.form_title')</h4>
			      </div>
			      <div class="modal-body">

			      	<form action="https://reservations.travelclick.com/bookings.jsp" method="GET" target="_blank" id="formModalSend" name="formModalSend">
			      		<input type="hidden" name="hotelid" id="hotelid">
			      		@if($offer->ihotelier_type==1)<input type="hidden" name="RatePlanID" id="RatePlanID">@endif

						@if($offer->ihotelier_type==2)<input type="hidden" name="packageId" id="packageId">@endif

						@if($offer->rate_access_code !='')<input type="hidden" name="identifier" id="identifier" value="{{$offer->rate_access_code}}">@endif

						<input type="hidden" name="datein" id="datein">
						<input type="hidden" name="dateout" id="dateout">
						<input type="hidden" name="adults" id="adults">
						<input type="hidden" name="children" id="children">

						@if($offer->ihotelier_type==1)<input type="hidden" name="children2" id="children2">@endif

			      	</form>
						
					<form action="https://reservations.travelclick.com/bookings.jsp" method="GET" target="_blank" id="formModal" name="formModal" onsubmit="return validateBookingModal();">	

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bookesp">
							<span class="lbForm" id="txHotel">@lang('messages.select_resort')</span>	

							<select class="form-control m08" id="hotelidC" name="hotelidC" onchange="asignaRatesC(this)">
								@foreach($offer_resort2 as $resort_route)
									@for($i=0;$i<count($offer_resort_plan); $i++)
										@if($offer_resort_plan[$i]->plan_id==1&& $offer_resort_plan[$i]->resort_id==$resort_route['id'])
										<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
										@endif
									@endfor
								@endforeach
							</select>
							<select class="form-control m08" id="hotelidD" name="hotelidD" onchange="asignaRatesD(this)">
								@foreach($offer_resort2 as $resort_route)
									@for($i=0;$i<count($offer_resort_plan); $i++)
										@if($offer_resort_plan[$i]->plan_id==2&& $offer_resort_plan[$i]->resort_id==$resort_route['id'])
										<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
										@endif
									@endfor
								@endforeach
							</select>
							<select class="form-control m08" id="hotelidE" name="hotelidE" onchange="asignaRatesE(this)">
								@foreach($offer_resort2 as $resort_route)
									@for($i=0;$i<count($offer_resort_plan); $i++)
										@if($offer_resort_plan[$i]->plan_id==3&& $offer_resort_plan[$i]->resort_id==$resort_route['id'])
										<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
										@endif
									@endfor
								@endforeach
							</select>
						</div>

						@if($offer->ihotelier_type==1)<input type="hidden" name="RatePlanIDB" id="RatePlanIDB">@endif

						@if($offer->ihotelier_type==2)<input type="hidden" name="packageIdB" id="packageIdB">@endif

						@if($offer->rate_access_code !='')<input type="hidden" name="identifierB" id="identifierB" value="{{$offer->rate_access_code}}">@endif

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<span class="lbForm">@lang('messages.arrival')</span>
							<div class='input-group date'>
		                        <input id="dateinB" name="dateinB" type="text" class="form-control m03 calendario" style="margin: 0px;" value="{{$dateInDefault}}" />
		                    </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<span class="lbForm">@lang('messages.departure')</span>
							<div class='input-group date'>
		                        <input id="dateoutB" name="dateoutB" type="text"  class="form-control m03 calendario" style="margin: 0px;" value="{{$dateOutDefault}}"/>
		                    </div>
						</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
					<span id="spAdultB" name="spAdultB" class="lbForm m06">@lang('messages.adults')</span>
					<select name="adultsB" class="form-control" id="adultsB">
						<option value="1">1</option>
						<option value="2" selected>2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
					<span id="spTeenB" name="spTeenB" class="lbForm m06">@lang('messages.teen')</span>
					<select name="childrenB" class="form-control" id="childrenB">
						<option value="0" selected>0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6" >
					<span id="spChildrenB" name="spChildrenB" class="lbForm m06">@lang('messages.children')</span>
					<select name="children2B" class="form-control" id="children2B">
						<option value="0" selected>0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m04">
					<button type="submit" class="btn {{ Agent::isMobile()? 'btn-lg':''}} col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control m05" id="btn-booking">@lang('messages.book_now')</button>
					<input type="hidden" name="minimumB" name="minimumB">
					<input type="hidden" name="tag_adultB" id="tag_adultB" value="@lang('messages.adults')">
					<input type="hidden" name="tag_adult2B" id="tag_adult2B" value="@lang('messages.adults2')">
					<input type="hidden" name="tag_teenB" id="tag_teenB" value="@lang('messages.teen')">
					<input type="hidden" name="tag_childrenB" id="tag_childrenB" value="@lang('messages.children')">
					<input type="hidden" name="tag_children2B" id="tag_children2B" value="@lang('messages.children2')">
				</div>
				<div class="clearfix"></div>
							
				<div class="alert alert-danger msgError" role="alert" id="error-minimum2">@lang('messages.error_minimum')</div>

				</form>
			      </div>
			    </div>

			  </div>
			</div>
			<!-- Modal -->


			<!-- Modal Modify / Cancel Reservation -->
			<div id="modifyForm" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header m02">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title m07">@lang('messages.cancel_title')</h4>
			      </div>
			      <div class="modal-body">
			      	@lang('messages.cancel_text')

			      	<form action="https://reservations.travelclick.com/bookings.jsp" method="GET" target="_blank" id="formModalReservation" name="formModalReservation">
					  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					    <span class="lbForm" id="txHotel">@lang('messages.select_resort')</span>
					    <select class="form-control" id="hotelid" name="hotelid"> <option value="0" selected="">Select Resort</option> <optgroup label="Mexican Caribbean">  <option value="95939" data-subtext="Riviera Maya">Grand Residences Riviera Cancun Resort</option>  <option value="86184" data-subtext="Playa del Carmen">The Royal Haciendas All Suites Resort &amp; Spa</option>  <option value="86169" data-subtext="Cancun Hotel Zone">The Royal Sands Resort &amp; Spa All Inclusive</option>  <option value="86182" data-subtext="Cancun Hotel Zone">The Royal Islander All Suites Resort</option>  <option value="86175" data-subtext="Cancun Hotel Zone">The Royal Caribbean All Suites Resort</option>  <option value="73601" data-subtext="Cancun Hotel Zone">The Royal Cancun All Suites  Resort</option>  </optgroup> <optgroup label="Caribbean Islands">  <option value="86179" data-subtext="Sint Maarten">Simpson Bay Resort &amp; Marina</option>  <option value="86180" data-subtext="Sint Maarten">The Villas at Simpson Bay Resort &amp; Marina</option>  <option value="86181" data-subtext="Curacao">The Royal Sea Aquarium Resort</option>  </optgroup> </select>
					  </div>
					  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
					    <span class="lbForm" id="txHotel">@lang('messages.lb_confirm')</span>
					    <input id="confirmId" name="confirmId" type="text" class="form-control m08" value="" placeholder="@lang('messages.lb_confirm')" />
					  </div>
					  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
					  	<input id="languageid" name="languageid" type="hidden" value="{{App::getLocale()=='en'?'1':'2'}}"/>
					  	<span class="lbForm">.</span>
					  	<button type="submit" class="btn btn-success" id="btn">@lang('messages.lb_continue')</button>
					  </div>
					</form>
					<div class="clearfix"></div>
			      </div>
			    </div>

			  </div>
			</div>

<div class="container">
    <script>  
    	var travel_window = {!!  json_encode($travel_window->toArray()) !!};
    </script>
	<div class="row marginb50"></div>
</div>

{{--*/
$variable_php=$offer->end_date;
echo '<script languaje="JavaScript"> var varjs="'.$variable_php.'";</script>';
/*--}}

@stop
@endif

@section('javascript')
<script type="text/javascript" src="{{ asset('js/offer.min.js') }}"></script>
@stop

@if($offer->id==1)
	@section('javascript')
	<!--Activity name for this tag: 137484-PageViews Expedia 02.05.2017-->
	<script type='text/javascript'>
	var axel = Math.random()+"";
	var a = axel * 10000000000000;
	document.write('<img src="https://pubads.g.doubleclick.net/activity;xsp=221297;ord='+ a +'?" width=1 height=1 border=0/>');
	</script>
	<noscript>
	<img src="https://pubads.g.doubleclick.net/activity;xsp=221297;ord=1?" width=1 height=1 border=0/>
	</noscript>
	@stop
@endif
