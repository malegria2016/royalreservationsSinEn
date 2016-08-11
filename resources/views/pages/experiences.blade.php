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
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50">
			<h1>{{ $page->h1 }}</h1>
			<div id="h1_content">{!! $page->h1_content!!}</div>
		</div>
		@foreach($experiences as $key=>$experience)
		@if(count($experience->contents) > 0)
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 experience">
			<a href="{{url(App::getLocale().'/'.Lang::get('routes.experiences').'/'.$experience->identifier)}}"> 
				<img class="img-responsive marco" src="{{asset('img/medium/'.App::getLocale().'-'.$experience->identifier.'-1.jpg')}}" alt="{{$experience->contents[0]->alt1}}">
			</a>
			<div class="marcoInferior marginb50">
				<span class="tituloHoteles"><a href="{{url(App::getLocale().'/'.Lang::get('routes.experiences').'/'.$experience->identifier)}}">{{ $experience->contents[0]->name }}</a></span>
				<div class="short_description">{!! $experience->contents[0]->short_description !!}</div>
				@if($experience->contents[0]->short_offer)
				<!--<div class="short_offer"><label class="xs-oferta labelSmall">{{ $experience->contents[0]->short_offer }}</label></div>-->
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
	$(document).ready(function () {
		setClassActive("li-experiences");
	});
</script>
@stop

@endif

@stop