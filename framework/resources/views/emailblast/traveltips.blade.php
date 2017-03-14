@extends('layouts.default')

@section('title', 'Royal Reservations')

@section('metadescription','')


@section('container')

<div class="container">
	<div class="row text-center marginb50">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<img class="img-responsive center-block" src="{{ asset('img/small/best-deal.jpg') }}" alt="@lang('messages.seal1_alt')">
			<p class="cl500">@lang('messages.seal1')</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<img class="img-responsive center-block" src="{{ asset('img/small/free-wifi.jpg') }}" alt="@lang('messages.seal2_alt')">
			<p class="cl500">@lang('messages.seal2')</p>
		</div>
		<div class="clearfix visible-xs"></div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<img class="img-responsive center-block" src="{{ asset('img/small/kids-free.jpg') }}" alt="@lang('messages.seal3_alt')">
			<p class="cl500">@lang('messages.seal3')</p>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
			<img class="img-responsive center-block" src="{{ asset('img/small/ocean-view.jpg') }}" alt="@lang('messages.seal4_alt')">
			<p class="cl500">@lang('messages.seal4')</p>
		</div>
	</div>


	
	<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>

</div>


@stop
