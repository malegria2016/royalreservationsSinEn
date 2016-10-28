@extends('layouts.default')
@if($page)

@section('title', $page->title)

@section('metadescription',$page->metadescription)
@section('keywords', $page->keywords)

@section('og_title', $page->title)
@section('og_image', $page->og_image)
@section('og_description', $page->metadescription)


{{--*/  $prefix='';  /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1>{{ $page->h1 }}</h1>
			<div id="h1_content">{!! $page->h1_content!!}</div>
		</div>
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

		{{--*/  
		
		   	$ban_promo=1;
			$banner="-dia";

			if($offer->id==69 || $offer->id==70 || $offer->id==73){
				if(date("H:i:s") > '20:00:00' || date("H:i:s") < '05:59:00'){
					$ban_promo=1;
					$banner="-noche";
				}
				else{
					$ban_promo=0;
					$banner="-dia";
				}
			}

		/*--}}

		@if(count($offer->contents) >0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offer marginb50">
			<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offer->identifier)}}">
				@if($offer->id==69 || $offer->id==70 || $offer->id==73)
					
					@if((date("H:i:s") > '20:00:00') && (date("H:i:s") < '05:59:00'))
					<img class="img-responsive marco" src="{{ asset('img/medium/'.$offer->identifier.'-'.App::getLocale().$banner.'.jpg') }}" alt="{{$offer->contents[0]->alt}}">
					@else
					<img class="img-responsive marco" src="{{ asset('img/medium/'.$offer->identifier.'-'.App::getLocale().$banner.'.jpg') }}" alt="{{$offer->contents[0]->alt}}">
					@endif
				@else
				<img class="img-responsive marco" src="{{ asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offer->contents[0]->alt}}">
				@endif
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
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50">
			<h2 class="simH1 text-center">{!! $page->h2 !!}</h2>
			<div id="h2_content" class="simH2">{!! $page->h2_content!!}</div>
		</div>
	</div>
	<div class="row">
		@if(count($packages)>0)
		@foreach($packages as $key=>$package)
		@if(count($package->contents)>0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 package marginb50">
			<a href="{{url($prefix.Lang::get('routes.packages').'/'.$package->identifier)}}">
				<img class="img-responsive marco" src="{{ asset('img/medium/'.$package->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$package->contents[0]->alt}}">
			</a>
			<a href="{{url($prefix.Lang::get('routes.packages').'/'.$package->identifier)}}">
				<label class="pointer">{{$package->contents[0]->headline}}</label>
			</a>
		</div>
		@endif
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endforeach
		@endif
	</div>
</div>
@stop

@section('javascript')
<script>
	$j(document).ready(function () {
		/*setClassActive("li-offers");*/
			$j("#btn-resorts").click(function () {
					var resortIdentifier = $j("#resorts").val();
					var offersResortUrl = "{{url($prefix.Lang::get('routes.offers').'/'.Lang::get('routes.resorts'))}}"+"/"+ resortIdentifier;
					window.location.href = offersResortUrl;
				});
			$j("#btn-destinations").click(function () {
					var destinationIdentifier = $j("#destinations").val();
					var offersDestinationUrl = "{{url($prefix.Lang::get('routes.offers').'/'.Lang::get('routes.destinations'))}}"+"/"+ destinationIdentifier;
					//console.log(offersDestinationUrl);
					window.location.href = offersDestinationUrl;
				});
		});
</script>
@stop

@endif
