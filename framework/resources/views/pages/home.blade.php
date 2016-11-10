@extends('layouts.default')
@if($page)

@section('title', $page->title)

@section('metadescription',$page->metadescription)
@section('keywords', $page->keywords)

@section('og_title', $page->title)
@section('og_image', url('img/medium/'.$offers[0]->identifier.'-'.App::getLocale().'.jpg'))
@section('og_description', $page->metadescription)

@section('anuncio')
<div class="anuncio">
	<p><a href="#"><i class="fa fa-certificate iconbig"></i> @lang('messages.anuncio')</a></p>
</div>

{{--*/  $prefix=''; /*--}}
@if (App::getLocale() == 'en')
	{{--*/ $prefix=''/*--}}
@elseif (App::getLocale() == 'es')
	{{--*/ $prefix='es/'/*--}}
@endif

@section('booking')
@include('includes.booking')
@stop

@section('slider')

@include('includes.sliderHome',
[
'img1' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/home-medium/'.$offers[0]->identifier.'-'.App::getLocale().'.jpg':'img/home-big/'.$offers[0]->identifier.'-'.App::getLocale().'.jpg'),
'alt1'=> (count($offers[0]->contents) >0 ? $offers[0]->contents[0]->alt : 'N/A')
]
)
@stop


@section('container')

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1 class="marginb15b marginb50">{{ $page->h1 }}</h1>
			<div id="h1_content" class="marginb50">{!! $page->h1_content!!}</div>
		</div>
		@if(count($offers)>0)
			@foreach($offers as $offer)
				@if(count($offer->contents)>0)
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 offer mb50">
					<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offer->identifier)}}">
						<img class="img-responsive marco" src="{{ asset('img/small/'.$offer->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offer->contents[0]->alt}}">
					</a>
					<a href="{{url($prefix.Lang::get('routes.offers').'/'.$offer->identifier)}}">
						<label class="pointer">{{$offer->contents[0]->headline}}</label>
					</a>
				</div>
				@endif
			@endforeach
		@endif
	</div>
	<div class="img-responsive division-00"><img class="img-responsive" src="{{ asset('img/general/division-01.png') }}" alt="separator"></div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50">
		<a href="{{url($prefix.Lang::get('routes.offers').'/')}}">
			<img class="img-responsive marco" width="100%" src="{{asset((Agent::isMobile() && !Agent::isTablet()) ? 'img/small/banner-why-'.App::getLocale().'.jpg':'img/general/banner-why-'.App::getLocale().'.jpg')}}" alt="@lang('messages.whyBooking_alt')">
		</a>
    </div>

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

	<div class="row marginb50">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb50">
			<div class="embed-responsive embed-responsive-16by9 marco">
				@if(App::getLocale() == 'es')
				<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/129797529?color=ffffff&title=0&byline=0&portrait=0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				@else
				<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/129797529?color=ffffff&title=0&byline=0&portrait=0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				@endif
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h2>{{ $page->h2 }}</h2>
			<div id="h2_content">{!! $page->h2_content!!}</div>
		</div>
	</div>
	
	<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{url($prefix.Lang::get('routes.resorts'))}}">
				<img class="img-responsive marco" src="{{ asset('img/medium/royal-resorts.jpg') }}" alt="{{$page->alt3}}">
			</a>
			<div class="marcoInferior">
				<h3>{!! $page->h3 !!}</h3>
				<div id="h3_content">{!! $page->h3_content !!}</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<a href="{{url($prefix.Lang::get('routes.experiences'))}}">
				<img class="img-responsive marco" src="{{ asset('img/medium/royal-resorts-experiences.jpg') }}" alt="{{$page->alt4}}">
			</a>
			<div class="marcoInferior">
				<h4>{!! $page->h4 !!}</h4>
				<div id="h4_content">{!! $page->h4_content !!}</div>
			</div>
		</div>
	</div>
</div>


@stop

@endif

@stop
