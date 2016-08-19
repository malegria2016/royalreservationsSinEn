@extends('layouts.default')
@if(count($experience->contents)>0)

@section('title', $experience->contents[0]->title)

@section('metadescription',$experience->contents[0]->metadescription)
@section('keywords', $experience->contents[0]->keywords)

@section('og_title', $experience->contents[0]->title)
@section('og_image', url('img/medium/'.$experience->identifier.'-1.jpg'))
@section('og_description', $experience->contents[0]->metadescription)

@section('slider')
@include('includes.slider',
[
'img1' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$experience->identifier.'-1.jpg':'img/big/'.App::getLocale().'-'.$experience->identifier.'-1.jpg'),
'img2' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$experience->identifier.'-2.jpg':'img/big/'.App::getLocale().'-'.$experience->identifier.'-2.jpg'),
'img3' => ((Agent::isMobile() && !Agent::isTablet()) ? 'img/medium/'.App::getLocale().'-'.$experience->identifier.'-3.jpg':'img/big/'.App::getLocale().'-'.$experience->identifier.'-3.jpg'),
'caption1'=> $experience->contents[0]->caption1 ,
'caption2'=> $experience->contents[0]->caption2,
'caption3'=> $experience->contents[0]->caption3,
'alt1'=> $experience->contents[0]->alt1,
'alt2'=> $experience->contents[0]->alt2,
'alt3'=> $experience->contents[0]->alt3
]

)
@stop

@section('booking')
@include('includes.booking')
@stop

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1>{{$experience->contents[0]->name}}</h1>
			<div id="overview" class="marginb50 text-justify">{!! $experience->contents[0]->overview !!}</div>
			<h3>{{ $experience->contents[0]->items_title }}</h3>
		</div>
	</div>
	@if($experience->contents[0]->item1)
	<div id="item_1" class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-4.jpg')}}" alt="{{$experience->contents[0]->alt4}}">
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos mb50">{!! $experience->contents[0]->item1 !!}</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	@if($experience->contents[0]->item2)
	<div id="item_2" class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos mb50">{!! $experience->contents[0]->item2 !!}</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-5.jpg')}}" alt="{{$experience->contents[0]->alt5}}">
		</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	@if($experience->contents[0]->item3)
	<div id="item_3" class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-6.jpg')}}" alt="{{$experience->contents[0]->alt6}}">
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos mb50">{!! $experience->contents[0]->item3 !!}</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	@if($experience->contents[0]->item4)
	<div id="item_4" class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos mb50">{!! $experience->contents[0]->item4 !!}</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-7.jpg')}}" alt="{{$experience->contents[0]->alt7}}">
		</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	@if($experience->contents[0]->item5)
	<div id="item_5" class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-8.jpg')}}" alt="{{$experience->contents[0]->alt8}}">
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos mb50">{!! $experience->contents[0]->item5 !!}</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	@if($experience->contents[0]->item6)
	<div id="item_6" class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos mb50">{!! $experience->contents[0]->item6 !!}</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-9.jpg')}}" alt="{{$experience->contents[0]->alt9}}">
		</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	@if($experience->contents[0]->item7)
	<div id="item_7" class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img class="img-responsive marco" src="{{asset('img/small/'.$experience->identifier.'-10.jpg')}}" alt="{{$experience->contents[0]->alt10}}">
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-justify experiencesTitulos">{!! $experience->contents[0]->item7 !!}</div>
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="marginb50"></div>
	@endif
	<div class="row">
		@if(count($resorts) > 0)
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">{!! $experience->contents[0]->resorts_description !!}</div>
		@foreach($resorts as $key=>$resort)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 resort">
			<a href="{{url(App::getLocale()=='en'?Lang::get('routes.resorts').'/'.$resort->identifier :'/es/'.Lang::get('routes.resorts').'/'.$resort->identifier)}}">
				<img class="img-responsive marco" src="{{asset('img/medium/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}">
			</a>
			<div class="marcoInferior marginb50">
				<span class="tituloHoteles"><a href="{{url(App::getLocale()=='en'?Lang::get('routes.resorts').'/'.$resort->identifier:'/es/'.Lang::get('routes.resorts').'/'.$resort->identifier)}}">{{ $resort->name }}</a></span>
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
			</div>
			@if($resort->contents[0]->short_offer)
			<div class="short_offer"><label>{{ $resort->contents[0]->short_offer }}</label></div>
			@endif
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
		setClassActive("li-experiences");
	});
</script>
@stop

@endif
