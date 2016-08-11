@extends('layouts.default')
@if($page)
@section('title', $page->title)

@section('metadescription',$page->metadescription)
@section('keywords', $page->keywords)

@section('og_title', $page->title)
@section('og_image', $page->og_image)
@section('og_description', $page->metadescription)

@section('booking')
@include('includes.booking')
@stop

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1>{{ $page->h1 }}</h1>
			<div id="h1_content">{!! $page->h1_content!!}</div>
			<button type="button" id="btn-all" class="btn btn-primary hidden-xs">@lang('messages.all')</button>
			<button type="button" id="btn-mex" class="btn btn-primary hidden-xs">@lang('messages.mexico')</button>
			<button type="button" id="btn-car" class="btn btn-primary hidden-xs">@lang('messages.caribbean')</button>
			<select id="select-hotels" class="form-control visible-xs xs-selector">
				<option value="btn-all">@lang('messages.all')</option>
				<option value="btn-mex" >@lang('messages.mexico')</option>
				<option value="btn-car">@lang('messages.caribbean')</option>
			</select>
		</div>
	</div>
	<div class="marginb50"></div>
	<div class="row" id="mex">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 class="text-center">{{ $page->h2 }}</h2>
			<div id="h2_content">{!! $page->h2_content!!}</div>
			<div class="marginb50"></div>
		</div>
		@foreach($resorts_mex as $key=>$resort)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 resort">
			<a href="{{url(App::getLocale().'/'.Lang::get('routes.resorts').'/'.$resort->identifier)}}">
				<img class="img-responsive marco" src="{{asset('img/medium/'.App::getLocale().'-'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}">
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
				<div class="short_description">{!! $resort->contents[0]->short_description !!}</div>
				@if($resort->contents[0]->short_offer)
				<div class="short_offer"><label class="xs-oferta">{{ $resort->contents[0]->short_offer }}</label></div>
				@endif
			</div>
		</div>
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endforeach
	</div>
	<div class="row" id="car">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-center">{{ $page->h3 }}</h3>
			<div id="h3_content">{!! $page->h3_content !!}</div>
			<div class="marginb50"></div>
		</div>
		@foreach($resorts_car as $key=>$resort)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 resort">
			<a href="{{url(App::getLocale().'/'.Lang::get('routes.resorts').'/'.$resort->identifier)}}">
				<img class="img-responsive marco" src="{{asset('img/medium/'.App::getLocale().'-'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}">
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
				<div class="short_description">{!! $resort->contents[0]->short_description !!}</div>
				@if($resort->contents[0]->short_offer)
				<div class="short_offer"><label class="xs-oferta">{{ $resort->contents[0]->short_offer }}</label></div>
				@endif
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
			setClassActive("li-resorts");
			$("#btn-all").click(function () {
					$("#mex").show("slow");
					$("#car").show("slow");
				});
			$("#btn-mex").click(function () {
					$("#mex").show("slow");
					$("#car").hide("fast");
				});
			$("#btn-car").click(function () {
					$("#mex").hide("fast");
					$("#car").show("slow");
				});
			$('#select-hotels').on('change', function() {
					if(this.value === 'btn-all'){
						$("#mex").show("slow");
						$("#car").show("slow");
					}else if(this.value === "btn-mex"){
						$("#mex").show("slow");
						$("#car").hide("fast");
					}else{
						$("#mex").hide("fast");
						$("#car").show("slow");
					}
				});
		});
</script>
@stop

@endif

@stop
