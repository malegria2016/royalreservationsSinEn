@extends('layouts.default')
@if(count($destination->contents)>0 && count($offers)>0)

@section('title', $destination->contents[0]->offers_title)

@section('metadescription', $destination->contents[0]->offers_metadescription)
@section('keywords', $destination->contents[0]->offers_keywords)

@section('og_title', $destination->contents[0]->offers_title)
@section('og_image', url('img/medium/'.$offers[0]->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $destination->contents[0]->offers_metadescription)

{{--*/  $prefix='' /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50">{!! $destination->contents[0]->offers_description !!}</div>
	</div>
	<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-lg-12 marginb50">
			<div class="form-inline" action="#">
				<div class="form-group">
					<label for="resorts">@lang('messages.resorts')</label>
					<select class="form-control" id="resorts">
						<optgroup label="@lang('messages.mexico')">
							@foreach($resorts_routes_mex as $resort_route)
							<option value="{{$resort_route->identifier}}">{{$resort_route->name}}</option>
							@endforeach
						</optgroup>
						<optgroup label="@lang('messages.caribbean')">
							@foreach($resorts_routes_car as $resort_route)
							<option value="{{$resort_route->identifier}}">{{$resort_route->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
				<button class="btn btn-default btnAzul" id="btn-resorts">@lang('messages.get_offers')</button>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-lg-12 marginb50">
			<div class="form-inline" >
				<div class="form-group">
					<label for="destinations">@lang('messages.destinations')</label>
					<select class="form-control" id="destinations">
						<optgroup label="@lang('messages.mexico')">
							@foreach($destinations_routes_mex as $destination_route)
							<option value="{{$destination_route->identifier}}">{{$destination_route->name}}</option>
							@endforeach
						</optgroup>
						<optgroup label="@lang('messages.caribbean')">
							@foreach($destinations_routes_car as $destination_route)
							<option value="{{$destination_route->identifier}}">{{$destination_route->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
				<button  class="btn btn-default btnAzul" id="btn-destinations">@lang('messages.get_offers')</button>
			</div>
		</div>
	</div>
	<div class="row">
		@if(count($offers)>0)
		@foreach($offers as $key=>$offer)
		@if(count($offer->contents) >0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offer marginb50">
			<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offer->identifier)}}">
				<img class="img-responsive marco" src="{{ asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offer->contents[0]->alt}}">
			</a>
			<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offer->identifier)}}">
				<label class="pointer">{{$offer->contents[0]->headline}}</label>
			</a>
		</div>
		@endif
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endforeach
		@endif

		@if($destination->location == "Mexican Caribbean" && $destination->id !="4")
		@if(count($package->contents)>0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 package">
			<a href="{{url($prefix.Lang::get('routes.packages').'/'.$package->identifier)}}">
				<img class="img-responsive marco" src="{{ asset('img/medium/'.$package->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$package->contents[0]->alt}}">
			</a>
			<a href="{{url($prefix.Lang::get('routes.packages').'/'.$package->identifier)}}">
				<label class="pointer">{{$package->contents[0]->headline}}</label>
			</a>
		</div>
		@endif
		@endif
	</div>
</div>
@stop

@section('javascript')
<script>
	$(document).ready(function () {
		setClassActive("li-offers");
		if ('{{$destination->location}}' == 'Caribbean Islands') {
			$("#li-all-inc").hide();
		}
		$("#btn-destinations").click(function () {
					var destinationIdentifier = $("#destinations").val();
					var offersDestinationUrl = "{{url($prefix.Lang::get('routes.offers').'/'.Lang::get('routes.destinations'))}}"+"/"+ destinationIdentifier;
					//console.log(offersDestinationUrl);
					window.location.href = offersDestinationUrl;
				});
				$('#destinations option').each(function() {
					//console.log($(this).val());
					if($(this).val() == "{{$destination->identifier}}") {
						$(this).prop("selected", true);
					}
				});
				$("#btn-resorts").click(function () {
					var resortIdentifier = $("#resorts").val();
					var offersResortUrl = "{{url($prefix.Lang::get('routes.offers').'/'.Lang::get('routes.resorts'))}}"+"/"+ resortIdentifier;
					window.location.href = offersResortUrl;
				});
	});
</script>
@stop

@endif
