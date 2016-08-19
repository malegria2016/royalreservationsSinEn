@extends('layouts.default')
@if(count($offer->contents) > 0)

@section('title', $offer->contents[0]->title)

@section('metadescription',$offer->contents[0]->metadescription)
@section('keywords', $offer->contents[0]->keywords)
@section('og_title', $offer->contents[0]->title)
@section('og_image', asset('img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $offer->contents[0]->metadescription)

@section('booking')
@include('includes.booking-offer',['rate_access_code'=>($offer->rate_access_code != '' ? $offer->rate_access_code : null),'offers_resorts'=>$resorts])
@stop

{{--*/  $prefix='' /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<img class="img-responsive margint50 marginb50 marco" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.$offer->identifier.'-'.App::getLocale().'.jpg':'img/big/'.$offer->identifier.'-'.App::getLocale().'.jpg')}}" alt="{{$offer->contents[0]->alt}}">
			<h1>{{$offer->contents[0]->headline}}</h1>
		</div>
	</div>
	<div class="row marginb50">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div id="overview">{!!$offer->contents[0]->overview !!}</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div id="terms">{!!$offer->contents[0]->conditions !!}</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		@foreach($resorts as $key=>$resort)
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 resort-small">
			<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}"><img class="img-responsive marco" src="{{asset('img/small/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
			@if($resort->plan == 'All Inclusive')
			<div class="resort-all"></div>
			@elseif($resort->plan == 'All Inclusive/Room Only')
			<div class="resort-all-room"></div>
			@endif
			<div class="marcoInferior marginb100">
				<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}" class="offersHotels"><span>{{ $resort->name }}</span></a>
				<div class="resort_stars">
					{{--*/ $stars = round( $resort->stars * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
					@while($i <= $stars - 1)
						<i class="fa fa-star"></i>
						{{--*/ $i += 2; /*--}}
					@endwhile
					@if($stars & 1)
						<i class="fa fa-star-half-o"></i>
					@endif
				</div>
				<label class="offersPorcentage">@lang('messages.up_to') {{ $resort->discount }}% @lang('messages.off')</label>
				<div class="ofertaBook">
					<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
						<input name="hotelid" type="hidden" value="{{$resort->ihotelier_id}}" />
						<input name="themeid" type="hidden" value="{{$resort->ihotelier_theme}}" />
						<button type="submit" class="btn btn-danger pull-right">@lang('messages.book')</button>
					</form>
				</div>
			</div>
		</div>
		@if(($key + 1) % 3 == 0)
		<div class="clearfix"></div>
		@endif
		@endforeach
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50 text-center">
			<a href="{{url($prefix.Lang::get('routes.offers'))}}" class="btn btn-danger btn-lg">@lang('messages.back_offers')</a>
		</div>
	</div>
</div>
@stop
@endif
