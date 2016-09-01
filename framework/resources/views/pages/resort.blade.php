@extends('layouts.default')
@if($resort)

@section('title', $resort->contents[0]->title)

@section('metadescription', $resort->contents[0]->metadescription)
@section('keywords', $resort->contents[0]->keywords)

@section('og_title', $resort->contents[0]->title)
@section('og_image', url('img/medium/'.$resort->identifier.'-1.jpg'))
@section('og_description', $resort->contents[0]->metadescription)
{{--*/ $latLng = explode(',', $resort->coordinates); /*--}}
@section('style')
<style>
.fondoVideoHotel {background: url({{asset('img/general/'.$resort->identifier.'-fondo.jpg')}}) no-repeat;padding: 20px 10px;width: 100%;height: 363px;}
@media screen
and (max-width : 384px)  {
	.fondoVideoHotel-xs {background: url({{asset('img/general/'.$resort->identifier.'-fondo-xs.jpg')}}) no-repeat;padding: 20px 10px;width: 100%;height: 500px;}
}
</style>

@endsection

@section('slider')
@include('includes.slider',
[
'img1' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$resort->identifier.'-1.jpg':'img/big/'.App::getLocale().'-'.$resort->identifier.'-1.jpg'),
'img2' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$resort->identifier.'-2.jpg':'img/big/'.App::getLocale().'-'.$resort->identifier.'-2.jpg'),
'img3' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$resort->identifier.'-3.jpg':'img/big/'.App::getLocale().'-'.$resort->identifier.'-3.jpg'),
'caption1'=>(count($resort->contents)> 0 ? $resort->contents[0]->caption1 : 'N/A') ,
'caption2'=> (count($resort->contents)> 0 ? $resort->contents[0]->caption2 : 'N/A'),
'caption3'=> (count($resort->contents)> 0 ? $resort->contents[0]->caption3 : 'N/A'),
'alt1'=> (count($resort->contents)> 0 ? $resort->contents[0]->alt1 : 'N/A'),
'alt2'=> (count($resort->contents)> 0 ? $resort->contents[0]->alt2 : 'N/A'),
'alt3'=> (count($resort->contents)> 0 ? $resort->contents[0]->alt3 : 'N/A')
]

)
@stop

@section('booking')
@include('includes.booking-resort')
@stop

@section('container')
<div class="container">
	<div class="row margint30">
		<div class="col-lg-12 col-md-12 col-sm-12 hidden-xs btnHotel">
			<a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/resorts/'.$resort->identifier:'/es/'.Lang::get('routes.offers').'/resorts/'.$resort->identifier)}}" class="btnOfferResort"><i class="fa fa-tag fac"></i> @lang('messages.offers')</a>
			<button id="btn-overview" type="button" class="btn btn-resorts btn-lg"><i class="fa fa-bookmark fac"></i> @lang('messages.overview')</button>
			<button id="btn-room" type="button" class="btn btn-resorts btn-lg"><i class="fa fa-bed fac"></i> @lang('messages.accommodations')</button>
			<button id="btn-dining" type="button" class="btn btn-resorts btn-lg"><i class="fa fa-cutlery fac"></i> @lang('messages.dining')</button>
			<button id="btn-activity" type="button" class="btn btn-resorts btn-lg"><i class="fa fa-suitcase fac"></i> @lang('messages.activities')</button>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 visible-xs mt50">
			<p class="location">@lang('messages.you_are')</p>
			<select id="select-hotel" class="form-control visible-xs  xs-selector">
				<option value="btn-overview">@lang('messages.overview')</option>
				<option value="btn-room" >@lang('messages.accommodations')</option>
				<option value="btn-dining">@lang('messages.dining')</option>
				<option value="btn-activity">@lang('messages.activities')</option>
				<option value="btn-offer">@lang('messages.offers')</option>
			</select>
		</div>
	</div>
	<!-- SECCION HOTEL OVERVIEW -->
	<div id="overview" class="row" itemscope itemtype="https://schema.org/Hotel">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 itemprop="name">{{ $resort->name }}</h1>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12 text-justify marginb50">{!! $resort->contents[0]->overview !!}</div>
		<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
			<!-- TEMPORALMENTE SUSPENDIDO PARA COLOCAR CORRECTAMENTE EL WEB SERVICE DEL TIEMPO
			<p>32° Cancun, Quintana Roo</p>
			-->
			<div class="resort_stars">
				{{--*/ $stars = round( $resort->stars * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
				@while($i <= $stars - 1)
					<i class="fa fa-star fa-lg"></i>
					{{--*/ $i += 2; /*--}}
				@endwhile
				@if($stars & 1)
					<i class="fa fa-star-half-o fa-lg"></i>
				@endif
				<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
     	Rating: <span itemprop="ratingValue"><b>{{$resort->stars}}</b></span> out of <span itemprop="bestRating"><b>5</b></span> based on <span itemprop="reviewCount"><b>{{$resort->review_count}}</b></span> reviews</div>
			</div>

			<!--IMPRIME TRIPADVISOR AWARDS-->
			{!! $resort->contents[0]->tripadvisor_awards !!}

		</div>
		
		<div class="clearfix"></div>

		@if(($resort->id===6 && App::getLocale()=== 'en') || ($resort->id===6 && App::getLocale()=== 'es'))


		<div style="border: 1px solid rgba(0,0,0,0.1); margin: 5px 0 40px 0; padding: 30px; -webkit-border-radius: 4px; -moz-border-radius: 4px;border-radius: 4px;">
			<div class="flexslider">
			  <ul class="slides">
			    <li>
			    	<div class="hotelDiningTitulo"><strong>@lang('messages.review_gr_title1')</strong></div>
			      	<i><b>"@lang('messages.review_gr_body1')"</b></i><br>
			      	<div style="margin: 10px; font-size: 14px;"><b><span>-@lang('messages.review_gr_name1')</span></b> </div>
			      	<div><span style="font-size: 14px; color: #ccc;">@lang('messages.review_gr_date1')</span></div>
			    </li>
			    <li>
			    	<div class="hotelDiningTitulo"><strong>@lang('messages.review_gr_title2')</strong></div>
			     	<i><b>"@lang('messages.review_gr_body2')"</b></i>
			     	<div style="margin: 10px; font-size: 14px;"><b><span>-@lang('messages.review_gr_name2')</span></b> </div>
			      	<div><span style="font-size: 14px; color: #ccc;">@lang('messages.review_gr_date2')</span></div>
			    </li>
			    <li>
			    	<div class="hotelDiningTitulo"><strong>@lang('messages.review_gr_title3')</strong></div>
					<i><b>"@lang('messages.review_gr_body3')"</b></i>
					<div style="margin: 10px; font-size: 14px;"><b><span>-@lang('messages.review_gr_name3')</span></b> </div>
			      	<div><span style="font-size: 14px; color: #ccc;">@lang('messages.review_gr_date3')</span></div>
			    </li>
			  </ul>
			</div>
		</div>
	

		@endif

		<div id="resort-video" class="marco fondoVideoHotel marginb50 fondoVideoHotel-xs">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="embed-responsive embed-responsive-16by9 marco marcosin">
					<iframe class="embed-responsive-item" src="{{$resort->contents[0]->url_video}}" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hotelesRecuadro">{!! $resort->contents[0]->highlights !!}</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 margint30">
			<p class="location"><strong>@lang('messages.location')</strong> {{ $resort->contents[0]->address }}</p>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mb50">
			<div id="map-container" class="marco" ></div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >{!! $resort->contents[0]->tripadvisor_widget !!}</div>
		<div class="clearfix"></div>
		@if($resort->website)
			<a href="{{$resort->website}}" class="btn btn-primary marginb50 margint50" target="_blank" >@lang('messages.website')</a>
		@endif
	</div>
	<!-- SECCION HOTEL ACCOMMODATIONS -->
	<div id="room" class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50 text-center">{!! $resort->contents[0]->accommodation !!}</div>
		<div class="clearfix"></div>
		<div class="marginb50"></div>
		@if(count($accommodations = $resort->accommodations)> 0)
		@foreach($accommodations as $key=>$accomodation)
		@if(count($accomodation->contents) > 0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 room marginb50">
			<img class="img-responsive marco" src="{{asset('img/medium/'.$accomodation->identifier.'.jpg')}}" alt="{{$accomodation->contents[0]->alt}}">
			<div class="marcoInferior hotelRooms">
				<strong>{!! $accomodation->contents[0]->name !!}</strong>
				<div class="accommodation_description">{!!$accomodation->contents[0]->short_description  !!}</div>
				@if($resort->plan == 'EP')
				<span class="pull-left price">${{$accomodation->price}} USD <small>@lang('messages.starting_room')</small></span>
				@else
					@if($resort->id===6)
						<span class="pull-left price">${{$accomodation->price}} USD <small>@lang('messages.starting_night')</small></span>
					@else
						<span class="pull-left price">${{$accomodation->price}} USD <small>@lang('messages.starting_person')</small></span>
					@endif
				@endif
					<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
					<input name="hotelid" type="hidden" value="{{$resort->ihotelier_id}}" />
					<input name="themeid" type="hidden" value="{{$resort->ihotelier_theme}}" />
					@if($accomodation->ihotelier_id)
					<input name="roomtypeid" type="hidden" value="{{$accomodation->ihotelier_id}}" />
					@endif
					<button type="submit" class="btn btn-danger pull-right">@lang('messages.search')</button>
				</form>
			</div>
		</div>
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endif
		@endforeach
		@endif

		@if($resort->id===6)
			<p class="txtright">@lang('messages.starting_policy')</p>
		@endif
	</div>
	<!-- SECCION HOTEL DINING -->
	<div id="dining" class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50 text-center hotelDining">{!! $resort->contents[0]->dining !!}</div>
		<div class="clearfix"></div>
		@if(count($dinings = $resort->dinings)> 0)
		@foreach($dinings as $key=>$dining)
		@if(count($dining->contents) > 0)
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img class="img-responsive marco" src="{{asset('img/small/'.$dining->identifier.'.jpg')}}" alt="{{$dining->contents[0]->alt}}">
			<div class="marcoInferior marginb50 hotelDiningTitulo">
				<strong>{!! $dining->name !!}</strong>
				<div class="dining_description">{!! $dining->contents[0]->short_description !!}</div>
			</div>
		</div>
		@if(($key + 1) % 3 == 0)
		<div class="clearfix"></div>
		@endif
		@endif
		@endforeach
		@endif
	</div>
	<!-- SECCION HOTEL ACTIVITIES -->
	<div id="activity" class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50 text-center hotelActivities">{!! $resort->contents[0]->activity !!}</div>
		<div class="clearfix"></div>
		@if(count($activities = $resort->activities)> 0)
		@foreach($activities as $key=>$activity)
		@if(count($activity->contents) > 0)
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img class="img-responsive marco" src="{{asset('img/small/'.$activity->identifier.'.jpg')}}" alt="{{$activity->contents[0]->alt}}">
			<div class="marcoInferior marginb50 hotelDiningTitulo">
				<strong>{!! $activity->contents[0]->name !!}</strong>
				<div class="activity_description">{!! $activity->contents[0]->short_description !!}</div>
			</div>
		</div>
		@if(($key + 1) % 3 == 0)
		<div class="clearfix"></div>
		@endif
		@endif
		@endforeach
		@endif

	</div>

</div>
@stop



@section('javascript')
<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script>
	hideAll();
	function hideAll() {
		$("#room").hide();
		$("#dining").hide();
		$("#activity").hide();
	}
	$(document).ready(function () {
		$('.flexslider').flexslider({
	    	animation: "fade",
			controlsContainer: ".flex-container" ,
			controlNav: true,
			directionNav: false
    	});

		setClassActive("li-resorts");
		if ('{{$resort->location}}' == 'Caribbean Islands') {
			$("#li-all-inc").hide();
		}
		changeBooking({{$resort->ihotelier_id}});
			$('#hotelid option').each(function() {
					if($(this).val() == {{$resort->ihotelier_id}}) {
						$(this).prop("selected", true);
					}
				});
			$("#btn-overview").click(function () {
					$("#room").hide();
					$("#dining").hide();
					$("#activity").hide();
					$("#overview").show('slow');
					$("body").animate({scrollTop: $("#overview").offset().top});
				});
			$("#btn-room").click(function () {
					$("#overview").hide();
					$("#dining").hide();
					$("#activity").hide();
					$("#room").show('slow');
					$("body").animate({scrollTop: $("#room").offset().top});
				});
			$("#btn-dining").click(function () {
					$("#overview").hide();
					$("#room").hide();
					$("#activity").hide();
					$("#dining").show('slow');
					$("body").animate({scrollTop: $("#dining").offset().top});
				});
			$("#btn-activity").click(function () {
					$("#overview").hide();
					$("#room").hide();
					$("#dining").hide();
					$("#activity").show('slow');
					$("body").animate({scrollTop: $("#activity").offset().top});
				});
			/*$("#btn-offer").click(function () {
					$("#overview").hide();
					$("#room").hide();
					$("#dining").hide();
					$("#activity").hide();
					$("body").animate({scrollTop: $("#offer").offset().top});
				});*/
			/*$('#select-hotel').on('change', function () {
					if (this.value === 'btn-overview') {
						$("#room").hide();
						$("#dining").hide();
						$("#activity").hide();
						$("#overview").show('slow');
						$("body").animate({scrollTop: $("#overview").offset().top});
					} else if (this.value === "btn-room") {
						$("#overview").hide();
						$("#dining").hide();
						$("#activity").hide();
						$("#room").show('slow');
						$("body").animate({scrollTop: $("#room").offset().top});
					} else if (this.value === 'btn-dining') {
						$("#overview").hide();
						$("#room").hide();
						$("#activity").hide();
						$("#dining").show('slow');
						$("body").animate({scrollTop: $("#dining").offset().top});
					} else if (this.value === 'btn-activity') {
						$("#overview").hide();
						$("#room").hide();
						$("#dining").hide();
						$("#activity").show('slow');
						$("body").animate({scrollTop: $("#activity").offset().top});
					} else if (this.value === 'btn-offer') {
						$("#overview").hide();
						$("#room").hide();
						$("#dining").hide();
						$("#activity").hide();
						$("body").animate({scrollTop: $("#offer").offset().top});
					}
				});*/
		});
	function init_map() {
		var var_location = new google.maps.LatLng({{$resort->coordinates}});

		var var_mapoptions = {
			center: var_location,
			zoom: 16,
			scrollwheel: false,
			draggable: false
		};

		var var_marker = new google.maps.Marker({
				position: var_location,
				map: var_map,
				title: "{{$resort->name}}"
			});

		var var_map = new google.maps.Map(document.getElementById("map-container"),
			var_mapoptions);

		var_marker.setMap(var_map);

	}

	google.maps.event.addDomListener(window, 'load', init_map);
</script>
<!--<script type="application/ld+json">
{
   "@context":"http://schema.org/",
   "@type":"Hotel",
   "name":"{{$resort->name}}",
   "description":"{{$resort->contents[0]->metadescription}}",
   "location":{
      "@type":"PostalAddress",
      "streetAddress":"{{$resort->contents[0]->address}}",
      "addressCountry":"{{$resort->location}}"
   },
   "geo":{
      "@type":"GeoCoordinates",
      "latitude":"{{$latLng[0]}}",
      "longitude":"{{$latLng[1]}}"
   },
   "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "{{$resort->rating}}",
    "reviewCount": "{{$resort->review_count}}"
  },
   "image":{
      "@type":"ImageObject",
      "contentUrl":"{{url('img/medium/'.$resort->identifier.'-1.jpg')}}"
   }
}
</script>-->
@stop


@endif
