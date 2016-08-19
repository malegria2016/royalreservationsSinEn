@extends('layouts.default')
@if(count($package->contents) > 0)

@section('title', $package->contents[0]->title)

@section('metadescription',$package->contents[0]->metadescription)
@section('keywords', $package->contents[0]->keywords)
@section('og_title', $package->contents[0]->title)
@section('og_image', asset('img/medium/'.$package->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $package->contents[0]->metadescription)

@section('booking')
@include('includes.booking')
@stop

@section('container')
<div class="container">
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<img class="img-responsive margint50 marginb50 marco" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$package->identifier.'-'.App::getLocale().'.jpg':'img/big/'.$package->identifier.'-'.App::getLocale().'.jpg')}}" alt="{{$package->contents[0]->alt}}">
		<h1>{{$package->contents[0]->headline}}</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div id="overview" class="text-justify">{!! $package->contents[0]->overview !!}</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
		<div id="terms">{!! $package->contents[0]->conditions !!}</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<form class="form-inline" action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
			<label for="hotelid"><strong>@lang('messages.select_resort')</strong></label>
			<select class="form-control" name="hotelid">
				@foreach($resorts_routes_mex as $resort_route)
				  @if($resort_route->ihotelier_id !='95939')
					<option value="{{$resort_route->ihotelier_id}}">{{$resort_route->name}}</option>
				  @endif
				@endforeach
					</select>
					<button type="submit" class="btn btn-success">@lang('messages.book')</button>
		</form>
		<br><br>
	</div>
</div>
<div class="row">
	@if(count($packages)>0)
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h5>@lang('messages.also_like')</h5>
	</div>
	@foreach($packages as $key=>$package)
	@if(count($package->contents)>0)
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 package">
		<a href="{{url(App::getLocale()=='en'?Lang::get('routes.packages').'/'.$package->identifier:'/es/'.Lang::get('routes.packages').'/'.$package->identifier)}}">
			<img class="img-responsive marco" src="{{ asset('img/small/'.$package->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$package->contents[0]->alt}}">
		</a>
		<a href="{{url(App::getLocale()=='en'?Lang::get('routes.packages').'/'.$package->identifier:'/es/'.Lang::get('routes.packages').'/'.$package->identifier)}}">
		<label class="pointer">{{$package->contents[0]->headline}}</label>
		</a>
	</div>
	@endif
	@if(($key + 1) % 3 == 0)
	<div class="clearfix"></div>
	@endif
	@endforeach
	@endif
</div>
@stop
@endif
