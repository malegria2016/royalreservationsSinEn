@extends('layouts.default')
@if(count($offer->contents) > 0)

@section('title', $offer->contents[0]->title)

@section('metadescription',$offer->contents[0]->metadescription)
@section('keywords', $offer->contents[0]->keywords)
@section('og_title', $offer->contents[0]->title)
@section('og_image', asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $offer->contents[0]->metadescription)


@section('style')
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

<div class="container mainarea">
	<div class="row">
    	<div class="col-md-8 nopadding">
    		<img class="img-responsive" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg':'img/big/'.$offer->identifier.'-'.App::getLocale().'.jpg')}}" alt="{{$offer->contents[0]->alt}}"/>
    	</div>
    	<div class="b002">
        	<p>Grab this offer now</p>
    	</div>
    	<div class="col-md-4 b00">
    		@include('includes.booking-single-offer-new',['rate_access_code'=>($offer->rate_access_code != '' ? $offer->rate_access_code : null),'offers_resorts'=>$offer_resort2, 'ihotelier_type'=>($offer->ihotelier_type != '' ? $offer->ihotelier_type : null)])
    	</div>

    	<div class="col-md-12 b01">
	        <div class="col-md-4 col-sm-12">
	            <img src="{{asset('img/general/b01-icon.jpg')}}" class="">
	            <p>Best Deal <span>Guaranteed</span></p>
	        </div>
	        <div class="col-md-4 col-sm-12">
	            <img src="{{asset('img/general/b01-icon.jpg')}}" class="">
	            <p>Book Now, <span>Pay Later</span></p>
	        </div>
	        <div class="col-md-4 col-sm-12">
	            <img src="{{asset('img/general/b01-icon.jpg')}}" class="">
	            <p>Reasons to <span>Book With Us</span></p>
	        </div>
	        <div class="clear"></div>
	    </div>
    	<div class="col-md-8 b02">
	        <h2>{{$offer->contents[0]->title_short_description}}</h2>
	        <p>{!!$offer->contents[0]->short_description!!}</p>
	        <hr>
	    </div>

		<div class="col-md-4 nopadding">
			@if($offer->category==1)
    			@if($urgency==1)
    			<div class="col-md-12 nopadding b031">
		            <img src="{{asset('img/general/icon-01.png')}}" class="img01">
		            <p>Time left (Hurry, <span>Only 1 day left</span>)</p>
		        </div>
		        <div id="clockdiv" class="col-md-12 b03">
		        	<div><span class="days">01</span><div class="smalltext">Days</div></div>
		            <div><span>:</span><div class="smalltext">&nbsp;</div></div>
		            <div><span class="hours">23</span><div class="smalltext">Hours</div></div>
		            <div><span>:</span><div class="smalltext">&nbsp;</div></div>
		            <div><span class="minutes">18</span><div class="smalltext">Minutes</div></div>
		            <div><span>:</span><div class="smalltext">&nbsp;</div></div>
		            <div><span class="seconds">34</span><div class="smalltext">Seconds</div></div>
		        </div> 
    			@else
    			<div id="clockdiv" style="display:none;"><div><span class="days">01</span><div class="smalltext">Days</div></div><div><span>:</span><div class="smalltext">&nbsp;</div></div><div><span class="hours">23</span><div class="smalltext">Hours</div></div><div><span>:</span><div class="smalltext">&nbsp;</div></div><div><span class="minutes">18</span><div class="smalltext">Minutes</div></div><div><span>:</span><div class="smalltext">&nbsp;</div></div><div><span class="seconds">34</span><div class="smalltext">Seconds</div></div></div>
				<div class="col-md-12 b04">
		            <img src="{{asset('img/general/icon-01.png')}}" class="img01 b044">
		            <p>Act now! This offer must end on…</p>
		        </div>
		        <div class="col-md-12 b041">
		            <p class="b042">{{ $end_date}}</p>
		            <p class="b043">{{ $offer_resort2[0]['minimum'] }} @lang('messages.minimun')</p>
		        </div>

    			@endif
    		@else
    			<div id="clockdiv" style="display:none;"><div><span class="days">01</span><div class="smalltext">Days</div></div><div><span>:</span><div class="smalltext">&nbsp;</div></div><div><span class="hours">23</span><div class="smalltext">Hours</div></div><div><span>:</span><div class="smalltext">&nbsp;</div></div><div><span class="minutes">18</span><div class="smalltext">Minutes</div></div><div><span>:</span><div class="smalltext">&nbsp;</div></div><div><span class="seconds">34</span><div class="smalltext">Seconds</div></div></div>
    			<div class="col-md-12 b04">
		            <img src="{{asset('img/general/icon-01.png')}}" class="img01 b044">
		            <p>----</p>
		        </div>
	    		<div class="col-md-12 b041">
		            <p class="b042">¡Book Now and Save!</p>
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
	        <div class="col-md-6 b056 b0551">
	            <div class="b053">
	                <img src="{{asset('img/general/icon-03.png')}}" class="img01 img013">
	                <p>{{$offer_content_plan->title}}</p>
	            </div>
	            <div class="b051">
	                {!!$offer_content_plan->benefits!!}
	                <button type="button" id="btn-plan{{$offer_content_plan->plan_id>0?$offer_content_plan->plan_id:99}}" class="btn btn-warning">Reserve your room now</button>
	            </div>
	        </div>
	        @if(($key + 1) % 2 == 0)
			<div class="clearfix"></div>
			@endif
	        @endforeach

	        <div class="col-md-6 b057 b0552">
	            <div class="">
	                <div class="b0531">
	                    <img src="{{asset('img/general/icon-05.png')}}" class="img01 img013">
	                    <p>This offer must end on…</p>
	                </div>
	                <div class="b051">
	                    <p>{{ $end_date}}</p>
	                </div>
	            </div>
	            
	            <div class="b0531">
	                <img src="{{asset('img/general/icon-06.png')}}" class="img01 img014">
	                <p>When you can travel</p>
	            </div>
	            <div class="b051">
	                @foreach($tx_tw as $key=>$tw)
    					<p>{{$tw['start_date']}} - {{$tw['end_date']}}</p>
    				@endforeach
	            </div>
	        </div>

	        @if($offer->contents[0]->conditions!="")
	        <div class="col-md-6 b058 b0552">
	            <div class="">
	                <div class="b0531">
	                    <img src="{{asset('img/general/icon-07.png')}}" class="img01 img013">
	                    <p>@lang('messages.terms')</p>
	                </div>
	                <div class="b051">{!!$offer->contents[0]->conditions !!}</div>
	            </div>
	        </div>
	        @endif

	    </div><!--FIN col-md-8-->

	    <div class="col-md-4 b06">
	        <p class="b061">Your choice of hotels</p>

	        @foreach($resorts as $key=>$resort)

	        <div class="b0611">
	            <div class="b068 img01">
	                <a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><img src="{{asset('img/thumbnail/'.$resort->identifier.'.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
	            </div>
	            <div class="b069 img01">
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
						<br/>
						
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
							<p class="b066">${{ $offer_resort_plan[$i]->price}} dlls <span>per person</span></p>
							<div class="clear"></div>
	                		<hr>
						@endif
					@endfor
	           		
	                <img src="{{asset('img/general/tripadvisor-stars'.$resort->rating_trip_advisor.'.jpg')}}" class="img01 b0691">
	                <div class="clear"></div>
	                
	                <button type="button" id="btn-{{$resort->ihotelier_id}}" class="b067">Check Availability</button>
	            </div>
	            <div class="clear"></div>
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
	            <p class="b07">What our guests are saying</p>
	            @foreach($reviews as $key=>$review)
	            {{--*/ $d=date_create($review->review_date); /*--}}
				<p class="b071">{{$review->review}}</p>
				<p class="b074"><span class="b072">{{$review->traveler_name}}</span> - <span class="b073">{{$review->city}}, {{date_format($d,"m/d/Y")}}</span></p>
				@endforeach
	        </div>

	    </div> <!-- FIN COL 4-->


	    <!--<div class="col-md-12 b08">
	        <p class="b081">Your best option for a great deal</p>
	        <p class="b082">Royal Reservations Official Website</p>
	        <p class="b083">Phasellus ante tortor, tempus et luctus quis, tristique id quam. Aenean mollis ullamcorper elit ac dignissim. Suspendisse ornare sem nibh, a mollis dolor pretium at. Maecenas malesuada suscipit mauris vitae dictum. Sed pharetra vitae libero in congue. Morbi id rutrum neque.</p>
	    </div>

	    <div class="col-md-12 b09">
	        <div class="col-md-4">
	            <img src="https://royalreservations.com/img/general/book-now-icons.jpg" class="img01">
	            <p>Direct Booking with Royal Reservations guarantees great benefits such as payment flexibility, regardless of the resort you choose your room is always secured and guaranteed; Pay up to 14 days before your arrival date (restrictions may apply see payment policies when booking).</p>
	            <p class="b091">Book Now, Pay Later</p>
	        </div>
	        <div class="col-md-4">
	            <img src="https://royalreservations.com/img/general/best-deal-icons.jpg" class="img01">
	            <p>We want you to be confident that <strong>direct booking is always your best option</strong>; you will not only be getting the <strong>Best Deal Guaranteed</strong> but the lowest online price and exclusive benefits only available at <strong>Royal Reservations</strong>.</p>
	            <p class="b091">Best Deal Guaranteed</p>
	        </div>
	        <div class="col-md-4">
	            <img src="https://royalreservations.com/img/general/why-book-icons.jpg" class="img01">
	            <p><strong>Free Transfers, Resort Credits, Tour Credit, you name it, Royal Reservations has it all, </strong>reserve quickly, easily and securely; always get <strong>the lowest price</strong> online, no intermediaries means no surprises, <strong>Direct Booking is always your best option.</strong></p>
	            <p class="b091">Reasons to Book With Us</p>
	        </div>
	    </div>-->

	    {!!$offer->contents[0]->footer !!}

	</div><!--FIN ROW-->


			<!-- Modal -->
			<div id="dates" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div  class="modal-header">
			      	<h4 id="title" class="c_brown tx_bold"></h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body">

			      	<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" id="formModalSend" name="formModalSend">
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
						
					<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" id="formModal" name="formModal" onsubmit="return validateBookingModal();">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bookesp">
							<span class="lbForm" id="txHotel">@lang('messages.select_resort')</span>
							<!--<select class="form-control" id="hotelidB" name="hotelidB" onchange="asignaRates(this)">
								@foreach($offer_resort2 as $resort_route)
									<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
								@endforeach
							</select>-->	

							<select class="form-control" id="hotelidC" name="hotelidC" onchange="asignaRatesC(this)">
								@foreach($offer_resort2 as $resort_route)
									@for($i=0;$i<count($offer_resort_plan); $i++)
										@if($offer_resort_plan[$i]->plan_id==1&& $offer_resort_plan[$i]->resort_id==$resort_route['id'])
										<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
										@endif
									@endfor
								@endforeach
							</select>
							<select class="form-control" id="hotelidD" name="hotelidD" onchange="asignaRatesD(this)">
								@foreach($offer_resort2 as $resort_route)
									@for($i=0;$i<count($offer_resort_plan); $i++)
										@if($offer_resort_plan[$i]->plan_id==2&& $offer_resort_plan[$i]->resort_id==$resort_route['id'])
										<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
										@endif
									@endfor
								@endforeach
							</select>
							<select class="form-control" id="hotelidE" name="hotelidE" onchange="asignaRatesE(this)">
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
		                        <input id="dateinB" name="dateinB" type="text" class="form-control" style="margin: 0px;" value="{{$dateInDefault}}" />
		                    </div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<span class="lbForm">@lang('messages.departure')</span>
							<div class='input-group date'>
		                        <input id="dateoutB" name="dateoutB" type="text"  class="form-control" style="margin: 0px;" value="{{$dateOutDefault}}"/>
		                    </div>
						</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<span id="spAdultB" name="spAdultB" class="lbForm">@lang('messages.adults')</span>
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
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<span id="spTeenB" name="spTeenB" class="lbForm">@lang('messages.teen')</span>
					<select name="childrenB" class="form-control" id="childrenB">
						<option value="0" selected>0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
					<span id="spChildrenB" name="spChildrenB" class="lbForm">@lang('messages.children')</span>
					<select name="children2B" class="form-control" id="children2B">
						<option value="0" selected>0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<button type="submit" class="btn btn-success {{ Agent::isMobile()? 'btn-lg':''}} col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control btnTemporal" id="btn-booking">@lang('messages.book_now')</button>

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
					
					<br/><br/>
			      </div>
			    </div>

			  </div>
			</div>
			<!-- Modal -->


			




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



@stop
@endif

@section('javascript')
<script>

function validateBookingModal(){
	var minimumBB  =document.formModal.minimumB.value;

	var DateIn  = new Date(document.formModal.dateinB.value);
	var DateOut = new Date(document.formModal.dateoutB.value);

	if(((DateOut - DateIn) /1000/60/60/24) < minimumBB){
	  $j("#error-minimum2").show("slow");
	  return false;
	}
	else{
	  $j("#error-minimum2").hide("slow");

	  document.formModalSend.datein.value=document.formModal.dateinB.value;
	  document.formModalSend.dateout.value=document.formModal.dateoutB.value;


	  if(document.getElementById('hotelidC').style.display=='inline'){
	  	document.formModalSend.hotelid.value=document.formModal.hotelidC.value;
	  }
	  if(document.getElementById('hotelidD').style.display=='inline'){
	  	document.formModalSend.hotelid.value=document.formModal.hotelidD.value;
	  }
	  if(document.getElementById('hotelidE').style.display=='inline'){
	  	document.formModalSend.hotelid.value=document.formModal.hotelidE.value;
	  }

	  if(document.formModal.RatePlanIDB) { document.formModalSend.RatePlanID.value=document.formModal.RatePlanIDB.value;}
	  if(document.formModal.packageIdB) { document.formModalSend.packageId.value=document.formModal.packageIdB.value;}
		
	  var adultsBB   =document.formModal.adultsB.value;
	  var childrenBB =document.formModal.childrenB.value;
	  var children2BB=document.formModal.children2B.value;
		
	  $j("#adults").val(adultsBB);
	  $j("#children").val(childrenBB);
	  $j("#children2").val(children2BB);

	  document.formModalSend.submit();
	}
	return false;
}
function asignaRatesC(T){
	var rate=$j('#hotelidC option:selected').attr('id');
	var min=$j('#hotelidC option:selected').attr('name');
	var resort=$j('#hotelidC option:selected').attr('value');

	if(document.formModal.RatePlanIDB) { document.formModal.RatePlanIDB.value=rate;}
	if(document.formModal.packageIdB) { document.formModal.packageIdB.value=rate;}
	document.formModal.minimumB.value=min;

	changeBooking2(resort);
}
function asignaRatesD(T){
	var rate=$j('#hotelidD option:selected').attr('id');
	var min=$j('#hotelidD option:selected').attr('name');
	var resort=$j('#hotelidD option:selected').attr('value');

	if(document.formModal.RatePlanIDB) { document.formModal.RatePlanIDB.value=rate;}
	if(document.formModal.packageIdB) { document.formModal.packageIdB.value=rate;}
	document.formModal.minimumB.value=min;

	changeBooking2(resort);
}
function asignaRatesE(T){
	var rate=$j('#hotelidE option:selected').attr('id');
	var min=$j('#hotelidE option:selected').attr('name');
	var resort=$j('#hotelidE option:selected').attr('value');

	if(document.formModal.RatePlanIDB) { document.formModal.RatePlanIDB.value=rate;}
	if(document.formModal.packageIdB) { document.formModal.packageIdB.value=rate;}
	document.formModal.minimumB.value=min;

	changeBooking2(resort);
}
function changeBooking2(resort_id){
	var tag_adultB = $j('#tag_adultB').val();
	var tag_adult2B = $j('#tag_adult2B').val();
	var tag_teenB = $j('#tag_teenB').val();
	var tag_childrenB = $j('#tag_childrenB').val();
	var tag_children2B = $j('#tag_children2B').val();

	if(resort_id == "95939"){
	    $j("#children2B").val("0");
	    $j("#children2B").hide();
	    $j("#spChildrenB").hide();
	    $j("#spAdultB").text(tag_adult2B);
	    $j("#spTeenB").text(tag_childrenB);
	}
	if(resort_id == "86182" || resort_id == "86175"){
	    $j("#children2B").val("0");
	    $j("#children2B").hide();
	    $j("#spChildrenB").hide();
	    $j("#spAdultB").text(tag_adultB);
	    $j("#spTeenB").text(tag_children2B);
	}
	if(resort_id != "86182" && resort_id != "86175" && resort_id != "95939"){
	    $j("#childrensB").val("0");
	    $j("#spAdultB").text(tag_adultB);
	    $j("#spTeenB").text(tag_teenB);
	    $j("#spChildrenB").text(tag_childrenB);
	    $j("#children2B").show();
	    $j("#spChildrenB").show();
	}

}
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days':days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
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

//var deadline = new Date(2017,03,24, 01,00,00);
var deadline = new Date(varjs);

initializeClock('clockdiv', deadline);

$j(document).ready(function(){
	$j('#btn-73601').click(function(){ 
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(73601);
		$j('#dates').modal('show'); 
		document.formModalSend.hotelid.value=73601;
		if(Jrate73601 !=1010){ document.formModal.RatePlanIDB.value=Jrate73601; }
		if(Jpackage73601 !=1010){ document.formModal.packageIdB.value=Jpackage73601; }
		document.formModal.minimumB.value=Jminimum73601;
	});
	$j('#btn-86175').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86175);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86175;
		if(Jrate86175 !=1010){ document.formModal.RatePlanIDB.value=Jrate86175; }
		if(Jpackage86175 !=1010){ document.formModal.packageIdB.value=Jpackage86175; }
		document.formModal.minimumB.value=Jminimum86175;
	});
	$j('#btn-86182').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86182);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86182;
		if(Jrate86182 !=1010){ document.formModal.RatePlanIDB.value=Jrate86182; }
		if(Jpackage86182 !=1010){ document.formModal.packageIdB.value=Jpackage86182; }
		document.formModal.minimumB.value=Jminimum86182;
	});
	$j('#btn-86169').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86169);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86169;
		if(Jrate86169 !=1010){ document.formModal.RatePlanIDB.value=Jrate86169; }
		if(Jpackage86169 !=1010){ document.formModal.packageIdB.value=Jpackage86169; }
		document.formModal.minimumB.value=Jminimum86169;
	});
	$j('#btn-86184').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86184);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86184;
		if(Jrate86184 !=1010){ document.formModal.RatePlanIDB.value=Jrate86184; }
		if(Jpackage86184 !=1010){ document.formModal.packageIdB.value=Jpackage86184; }
		document.formModal.minimumB.value=Jminimum86184;		
	});
	$j('#btn-95939').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(95939);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=95939;
		if(Jrate95939 !=1010){ document.formModal.RatePlanIDB.value=Jrate95939; }
		if(Jpackage95939 !=1010){ document.formModal.packageIdB.value=Jpackage95939; }
		document.formModal.minimumB.value=Jminimum95939;
	});
	$j('#btn-86179').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86179);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86179;
		if(Jrate86179 !=1010){ document.formModal.RatePlanIDB.value=Jrate86179; }
		if(Jpackage86179 !=1010){ document.formModal.packageIdB.value=Jpackage86179; }
		document.formModal.minimumB.value=Jminimum86179;
	});
	$j('#btn-86180').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86180);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86180;
		if(Jrate86180 !=1010){ document.formModal.RatePlanIDB.value=Jrate86180; }
		if(Jpackage86180 !=1010){ document.formModal.packageIdB.value=Jpackage86180; }
		document.formModal.minimumB.value=Jminimum86180;
	});
	$j('#btn-86181').click(function(){
		document.getElementById('txHotel').style.display='none'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		changeBooking2(86181);
		$j('#dates').modal('show');
		document.formModalSend.hotelid.value=86181;
		if(Jrate86181 !=1010){ document.formModal.RatePlanIDB.value=Jrate86181; }
		if(Jpackage86181 !=1010){ document.formModal.packageIdB.value=Jpackage86181; }
		document.formModal.minimumB.value=Jminimum86181;
	});
	$j('#btn-plan1').click(function(){
		document.getElementById('txHotel').style.display='inline'; 
		document.getElementById('hotelidC').style.display='inline';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='none';
		var r=$j('#hotelidC option:selected').attr('value');
		changeBooking2(r);
		$j('#dates').modal('show');
		var rate=$j('select option:selected').attr('id');
		var min=$j('select option:selected').attr('name');
		if(document.formModal.RatePlanIDB){ $j("#RatePlanID").val(rate); document.formModal.RatePlanIDB.value=rate;}
		if(document.formModal.packageIdB) { $j("#packageId").val(rate);  document.formModal.packageIdB.value=rate;}
		document.formModal.minimumB.value=min;
		
	});
	$j('#btn-plan2').click(function(){
		document.getElementById('txHotel').style.display='inline'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='inline';
		document.getElementById('hotelidE').style.display='none';
		var r=$j('#hotelidD option:selected').attr('value');
		changeBooking2(r);
		$j('#dates').modal('show');
		
		var rate=$j('select option:selected').attr('id');
		var min=$j('select option:selected').attr('name');

		if(document.formModal.RatePlanIDB){ $j("#RatePlanID").val(rate); document.formModal.RatePlanIDB.value=rate;}
		if(document.formModal.packageIdB) { $j("#packageId").val(rate);  document.formModal.packageIdB.value=rate;}
		
		document.formModal.minimumB.value=min;
	});
	$j('#btn-plan3').click(function(){
		document.getElementById('txHotel').style.display='inline'; 
		document.getElementById('hotelidC').style.display='none';
		document.getElementById('hotelidD').style.display='none';
		document.getElementById('hotelidE').style.display='inline';
		var r=$j('#hotelidE option:selected').attr('value');
		changeBooking2(r);
		$j('#dates').modal('show');
		
		var rate=$j('select option:selected').attr('id');
		var min=$j('select option:selected').attr('name');

		if(document.formModal.RatePlanIDB){ $j("#RatePlanID").val(rate); document.formModal.RatePlanIDB.value=rate;}
		if(document.formModal.packageIdB) { $j("#packageId").val(rate);  document.formModal.packageIdB.value=rate;}
		
		document.formModal.minimumB.value=min;
	});

	if(typeof(travel_window) != "undefined"){
      var temp = new Date();
      var hoy  = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0);
      temp = new Date('1950-01-01');
      var start = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0);
      temp = new Date('2100-12-31');
      var end   = new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0);

      for(var i=0; i<travel_window.length; i++){
        temp= new Date(travel_window [i]['start_date']);
        eval('var endDate'+(i+1)+ '= new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0)');  
        temp= new Date(travel_window [i]['end_date']);
        eval('var startDate'+(i+2)+ '= new Date(temp.getFullYear(), temp.getMonth(), temp.getDate(), 0, 0, 0, 0)');  
        if (hoy.valueOf() > endDate1.valueOf()){
          endDate1=hoy;
        }
      }
    }
    else{
      var nowTemp = new Date();
      var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    }

    var checkin = $j('#dateinB').datepicker({

        onRender: function (date) {                

          if(typeof(travel_window) == "undefined"){
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }

          if(travel_window.length==1){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled'; } 
            else if (date.valueOf() < end.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled';} else{ return false; }
          }
          if(travel_window.length==2){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled';}else{ return false;}
          }
          if(travel_window.length==3){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate4.valueOf()) { return 'disabled'; }else{ return false;}
          }
          if(travel_window.length==4){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==5){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==6){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==7){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==8){if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==9){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==10){
            if (date.valueOf() < endDate1.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate10.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate11.valueOf()) {return 'disabled';}else{return false;}
          }
               
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        validateBookingSingle();
        $j('#dateoutB')[0].focus();
    }).data('datepicker');
    var checkout = $j('#dateoutB').datepicker({
        onRender: function (date) {

          if(typeof(travel_window) == "undefined"){
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }

          if(travel_window.length==1){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled'; } 
            else if (date.valueOf() < end.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled';} else{ return false; }
          }
          if(travel_window.length==2){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) { return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled';}else{ return false;}
          }
          if(travel_window.length==3){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) { return 'disabled'; }
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate4.valueOf()) { return 'disabled'; }else{ return false;}
          }
          if(travel_window.length==4){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==5){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==6){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==7){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==8){if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==9){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}else{return false;}
          }
          if(travel_window.length==10){
            if (date.valueOf() < checkin.date.valueOf() && date.valueOf() > start.valueOf()) {return  'disabled';} 
            else if (date.valueOf() < endDate2.valueOf() && date.valueOf() > startDate2.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate3.valueOf() && date.valueOf() > startDate3.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate4.valueOf() && date.valueOf() > startDate4.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate5.valueOf() && date.valueOf() > startDate5.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate6.valueOf() && date.valueOf() > startDate6.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate7.valueOf() && date.valueOf() > startDate7.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate8.valueOf() && date.valueOf() > startDate8.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate9.valueOf() && date.valueOf() > startDate9.valueOf()) {return 'disabled';}
            else if(date.valueOf() < endDate10.valueOf() && date.valueOf() > startDate10.valueOf()) {return 'disabled';}
            else if(date.valueOf() < end.valueOf() && date.valueOf() > startDate11.valueOf()) {return 'disabled';}else{return false;}
          }

        }
    }).on('changeDate', function (ev) {
        checkout.hide();
        validateBookingSingle();
    }).data('datepicker');


});

</script>
@stop
