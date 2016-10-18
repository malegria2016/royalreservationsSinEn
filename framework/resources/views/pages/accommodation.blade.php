@extends('layouts.default')
@if($resort)

@section('title', $resort->contents[0]->accommodations_title)

@section('metadescription', $resort->contents[0]->accommodations_metadescription)
@section('keywords', $resort->contents[0]->keywords)

@section('og_title', $resort->contents[0]->title)
@section('og_image', url('img/medium/'.$resort->identifier.'-1.jpg'))
@section('og_description', $resort->contents[0]->metadescription)

@section('style')
	<style type="text/css">
		@media (min-width: 768px)
			.modal-dialog {
			    width: 1024px !important;
			    margin: 30px auto;
			}
	</style>	
@endsection

@section('container')
<div class="container">
	<div class="row margint30">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btnHotel">
			<a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/resorts/'.$resort->identifier:'/es/'.Lang::get('routes.offers').'/resorts/'.$resort->identifier)}}" class="btnOfferResort"><i class="fa fa-tag fac"></i> @lang('messages.offers')</a>

			<a href="{{url(App::getLocale()=='en'?'resorts/'.$resort->identifier:'/es/resorts/'.$resort->identifier)}}" class="btnOfferResort"><i class="fa fa-bookmark fac"></i> @lang('messages.overview')</a>

			<a href="#" class="btnOfferResort menuBook"><i class="fa fa-bed fac"></i> @lang('messages.accommodations')</a>

			<a href="{{url(App::getLocale()=='en'?'resorts/'.$resort->identifier.'/'.Lang::get('routes.dining'):'/es/resorts/'.$resort->identifier.'/'.Lang::get('routes.dining'))}}" class="btnOfferResort"><i class="fa fa-cutlery fac"></i> @lang('messages.dining')</a>

			<a href="{{url(App::getLocale()=='en'?'resorts/'.$resort->identifier.'/'.Lang::get('routes.activities'):'/es/resorts/'.$resort->identifier.'/'.Lang::get('routes.activities'))}}" class="btnOfferResort"><i class="fa fa-suitcase fac"></i> @lang('messages.activities')</a>
		</div>
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
			<a href="#" data-toggle="modal" data-target="#myModal">
				<img class="img-responsive marco" src="{{asset('img/medium/'.$accomodation->identifier.'.jpg')}}" alt="{{$accomodation->contents[0]->alt}}">
			</a>
			<div class="marcoInferior hotelRooms">
				<strong>{!! $accomodation->contents[0]->name !!}</strong>
				<div class="accommodation_description">{!!$accomodation->contents[0]->short_description  !!}</div>
				<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro" aria-hidden="true"></i> @lang('messages.viewsrender')</a>
				<br><br>
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
	
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<img class="img-responsive" src="{{asset('img/rooms/'.$accomodation->identifier.'.jpg')}}" alt="{{$accomodation->contents[0]->alt}}">
	</div>
	<!--
  
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  

  -->
</div>

@stop

@endif

