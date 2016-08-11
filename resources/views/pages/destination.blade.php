@extends('layouts.default')
@if(count($destination->contents)>0)

@section('title', $destination->contents[0]->title)

@section('metadescription',$destination->contents[0]->metadescription)
@section('keywords', $destination->contents[0]->keywords)

@section('og_title', $destination->contents[0]->title)
@section('og_image', url('img/medium/'.$destination->identifier.'-1.jpg'))
@section('og_description', $destination->contents[0]->metadescription)

@section('slider')
@include('includes.slider',
[
'img1' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$destination->identifier.'-1.jpg':'img/big/'.App::getLocale().'-'.$destination->identifier.'-1.jpg'),
'img2' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$destination->identifier.'-2.jpg':'img/big/'.App::getLocale().'-'.$destination->identifier.'-2.jpg'),
'img3' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$destination->identifier.'-3.jpg':'img/big/'.App::getLocale().'-'.$destination->identifier.'-3.jpg'),
'caption1'=> $destination->contents[0]->caption1 ,
'caption2'=> $destination->contents[0]->caption2,
'caption3'=> $destination->contents[0]->caption3,
'alt1'=> $destination->contents[0]->alt1,
'alt2'=> $destination->contents[0]->alt2,
'alt3'=> $destination->contents[0]->alt3
]

)
@stop

@section('booking')
@include('includes.booking')
@stop

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb50">
			@if($destination->location == "Caribbean Islands")
				<!-- IMAGEN DE TELEFONO DESHABILITADO -->
				<!--<img class="img-responsive margint50 marginb50" src="{{asset('img/big/new-phone-number.jpg')}}" alt="europe">-->
			@endif
			<h1>{{$destination->name}}</h1>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50 text-justify">{!! $destination->contents[0]->overview !!}</div>
		<div class="clearfix"></div>
		<div id="resort-video" class="marco fondoVideoDestino marginb50 fondoVideoDestino-xs">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hotelesRecuadro">{!! $destination->contents[0]->tips !!}</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="embed-responsive embed-responsive-16by9 marco marcosin">
					<iframe class="embed-responsive-item" src="{{$destination->contents[0]->url_video}}" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<a href="{{url(App::getLocale().'/'.Lang::get('routes.offers').'/'.Lang::get('routes.destinations').'/'.$destination->identifier)}}" class="btn btn-danger btn-lg">@lang('messages.more_offers')</a>
		<div class="clearfix"></div>
	</div>
	<div class="img-responsive division-00"><img class="img-responsive" src="{{ asset('img/general/division-01.png') }}" alt="separator"></div>
	<div class="row">
		@if(count($resorts) > 0)
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-center marginb50">Resorts</h3>
		</div>
		@foreach($resorts as $key=>$resort)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 resort">
			<a href="{{url(App::getLocale().'/'.Lang::get('routes.resorts').'/'.$resort->identifier)}}">
				<img class="img-responsive marco" src="{{asset('img/medium/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}">
			</a>
			@if($resort->plan == 'All Inclusive')
			<div class="resort-all"></div>
			@elseif($resort->plan == 'All Inclusive/Room Only')
			<div class="resort-all-room"></div>
			@endif
			<div class="marcoInferior marginb50">
				<span class="tituloHoteles"><a href="{{url(App::getLocale().'/'.Lang::get('routes.resorts').'/'.$resort->identifier)}}">{{ $resort->name }}</a></span>
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
				<div id="short_description" class="short_description">{!! $resort->contents[0]->short_description !!}</div>
				@if($resort->contents[0]->short_offer)
				<div class="short_offer"><label>{{ $resort->contents[0]->short_offer }}</label></div>
				@endif
			</div>
		</div>
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
	$(document).ready(function () {
		setClassActive("li-destinations");
		if ('{{$destination->location}}' == 'Caribbean Islands') {
			$("#li-all-inc").hide();
		}
	});
</script>
@stop

@endif
