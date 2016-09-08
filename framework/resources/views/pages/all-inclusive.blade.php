@extends('layouts.default')
@if($page)
@section('title', $page->title)

@section('metadescription',$page->metadescription)
@section('keywords', $page->keywords)

@section('og_title', $page->title)
@section('og_image', $page->og_image)
@section('og_description', $page->metadescription)

@section('slider')
@include('includes.slider',
[
'img1' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-all-inclusive-1.jpg':'img/big/'.App::getLocale().'-all-inclusive-1.jpg'),
'img2' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-all-inclusive-2.jpg':'img/big/'.App::getLocale().'-all-inclusive-2.jpg'),
'img3' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-all-inclusive-3.jpg':'img/big/'.App::getLocale().'-all-inclusive-3.jpg'),
'caption1'=> $page->caption1 ,
'caption2'=> $page->caption2,
'caption3'=> $page->caption3,
'alt1'=> $page->alt1,
'alt2'=> $page->alt2,
'alt3'=> $page->alt3
]

)
@stop

@section('booking')
@include('includes.booking-all-inclusive')
@stop

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1>{{ $page->h1 }}</h1>
			<div id="h1_content">{!! $page->h1_content!!}</div>
		</div>
		<div class="clearfix"></div>
		<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img src="{{asset('img/medium/all-inclusive-4.jpg')}}" alt="{{$page->alt4}}" class="img-responsive marco" />
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h2>{{ $page->h2 }}</h2>
			<div id="h2_content">{!! $page->h2_content!!}</div>
		</div>
		<div class="clearfix"></div>
		<div class="marginb50"></div>

		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mb50">
			<h3>{{ $page->h3 }}</h3>
			<div id="h3_content">{!! $page->h3_content!!}</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img src="{{asset('img/medium/all-inclusive-5.jpg')}}" alt="{{$page->alt5}}" class="img-responsive marco" />
		</div>
		<div class="clearfix"></div>
		<div class="marginb50"></div>

		<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h4 class="text-center">{{ $page->h4 }}</h4>
		</div>
		<div class="clearfix"></div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img src="{{asset('img/medium/all-inclusive-6.jpg')}}" alt="{{$page->alt6}}" class="img-responsive marco" />
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div id="h4_content">{!! $page->h4_content !!}</div>
		</div>
		<div class="clearfix"></div>
		<div class="marginb50"></div>

		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mb50">
			<div id="h5_content">{!! $page->h5_content !!}</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img src="{{asset('img/medium/all-inclusive-7.jpg')}}" alt="{{$page->alt6}}" class="img-responsive marco" />
		</div>
	</div>
	<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50">
			<h5 class="text-center">@lang('messages.all_inc_resorts')</h5>
		</div>
		<div class="clearfix"></div>
		@section('booking')
		@include('includes.booking')
		@stop

		{{--*/  $prefix='' /*--}}
		@if (App::getLocale() == 'en')
			{{--*/ $prefix=''/*--}}
		@elseif (App::getLocale() == 'es')
			{{--*/ $prefix='es/'/*--}}
		@endif
		@foreach($resorts as $key=>$resort)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 resort">
			<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}">
				<img class="img-responsive marco" src="{{asset('img/medium/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}">
			</a>
			@if($resort->plan == 'All Inclusive')
			<div class="resort-all"></div>
			@elseif($resort->plan == 'All Inclusive/Room Only')
			<div class="resort-all-room"></div>
			@endif
			<div class="marcoInferior marginb50">
				<span class="tituloHoteles"><a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort->identifier)}}">{{ $resort->name }}</a></span>
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
				<div class="short_description">{!! $resort->contents[0]->short_description !!}</div>
			</div>
		</div>
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endforeach
	</div>
</div>
@stop

@section('javascript')
<script>
	$(document).ready(function () {
		setClassActive("li-all-inc");
	});
</script>
@stop

@endif
