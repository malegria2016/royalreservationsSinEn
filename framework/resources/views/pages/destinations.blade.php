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
		@foreach($destinations_mex as $key=>$destination)
		@if(count($destination->contents) > 0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 destination">
			<a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination->identifier)}}"> 
				<img class="img-responsive marco" src="{{asset('img/medium/'.App::getLocale().'-'.$destination->identifier.'-1.jpg')}}" alt="{{$destination->contents[0]->alt1}}">
			</a>
			<div class="marcoInferior marginb50">
				<span class="tituloHoteles"><a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination->identifier)}}">{{ $destination->name }}</a></span>
				<div class="short_description">{!! $destination->contents[0]->short_description !!}</div>
				<!--<div class="short_offer"><label class="xs-oferta labelSmall">{{ $destination->contents[0]->short_offer }}</label></div>-->
			</div>
		</div>
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endif
		@endforeach
	</div>
	<div class="row" id="car">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-center">{{ $page->h3 }}</h3>
			<div id="h3_content">{!! $page->h3_content !!}</div>
			<div class="marginb50"></div>
		</div>
		@foreach($destinations_car as $key=>$destination)
		@if(count($destination->contents) > 0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 destination">
			<a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination->identifier)}}"> 
				<img class="img-responsive marco" src="{{asset('img/medium/'.App::getLocale().'-'.$destination->identifier.'-1.jpg')}}" alt="{{$destination->contents[0]->alt1}}">
			</a>
			<div class="marcoInferior marginb50">
				<span class="tituloHoteles"><a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination->identifier)}}">{{ $destination->name }}</a></span>
				<div class="short_description">{!! $destination->contents[0]->short_description !!}</div>
				@if($destination->contents[0]->short_offer)
				<!--<div class="short_offer"><label class="xs-oferta labelSmall">{{ $destination->contents[0]->short_offer }}</label></div>-->
				@endif
			</div>
		</div>
		@if(($key + 1) % 2 == 0)
		<div class="clearfix"></div>
		@endif
		@endif
		@endforeach
	</div>
</div>
@stop

@section('javascript')
<script>
	$j(document).ready(function () {
			/*setClassActive("li-destinations");*/
			$j("#btn-all").click(function () {
					$j("#mex").show("slow");
					$j("#car").show("slow");
				});
			$j("#btn-mex").click(function () {
					$j("#mex").show("slow");
					$j("#car").hide("fast");
				});
			$j("#btn-car").click(function () {
					$j("#mex").hide("fast");
					$j("#car").show("slow");
				});
			$j('#select-hotels').on('change', function() {
					if(this.value === 'btn-all'){
						$j("#mex").show("slow");
						$j("#car").show("slow");
					}else if(this.value === "btn-mex"){
						$j("#mex").show("slow");
						$j("#car").hide("fast");
					}else{
						$j("#mex").hide("fast");
						$j("#car").show("slow");
					}
				});
		});
</script>
@stop

@endif
