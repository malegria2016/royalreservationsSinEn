@extends('layouts.default')
@if($resort)

@section('title', $resort->contents[0]->dining_title)

@section('metadescription', $resort->contents[0]->dining_metadescription)
@section('keywords', $resort->contents[0]->keywords)

@section('og_title', $resort->contents[0]->title)
@section('og_image', url('img/medium/'.$resort->identifier.'-1.jpg'))
@section('og_description', $resort->contents[0]->metadescription)


@section('container')
<div class="container">
	<div class="row margint30">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btnHotel">
			<a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/resorts/'.$resort->identifier:'/es/'.Lang::get('routes.offers').'/resorts/'.$resort->identifier)}}" class="btnOfferResort"><i class="fa fa-tag fac"></i> @lang('messages.offers')</a>

			<a href="{{url(App::getLocale()=='en'?'resorts/'.$resort->identifier:'/es/resorts/'.$resort->identifier)}}" class="btnOfferResort"><i class="fa fa-bookmark fac"></i> @lang('messages.overview')</a>

			<a href="{{url(App::getLocale()=='en'?'resorts/'.$resort->identifier.'/'.Lang::get('routes.accommodations'):'/es/resorts/'.$resort->identifier.'/'.Lang::get('routes.accommodations'))}}" class="btnOfferResort"><i class="fa fa-bed fac"></i> @lang('messages.accommodations')</a>

			<a href="#" class="btnOfferResort menuBook"><i class="fa fa-cutlery fac"></i> @lang('messages.dining')</a>

			<a href="{{url(App::getLocale()=='en'?'resorts/'.$resort->identifier.'/'.Lang::get('routes.activities'):'/es/resorts/'.$resort->identifier.'/'.Lang::get('routes.activities'))}}" class="btnOfferResort"><i class="fa fa-suitcase fac"></i> @lang('messages.activities')</a>
		</div>
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

</div>
@stop



@endif
