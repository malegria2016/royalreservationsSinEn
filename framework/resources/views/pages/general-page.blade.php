@extends('layouts.default')
@if($page)
@section('title', $page->title)

@section('metadescription',$page->metadescription)
@section('keywords', $page->keywords)

@section('og_title', $page->title)
@section('og_image', $page->og_image)
@section('og_description', $page->metadescription)



@section('booking')
@include('includes.booking-all-inclusive')
@stop

@section('container')

<div class="carousel-inner txtBanner" role="listbox">
	<div class="item active">
		<img class="img-responsive" src="{{ asset('img/big/'.$page->identifier.'.jpg') }}">
		<div class="carousel-caption"><p class="linksSlider">{!! $page->caption1 !!}</p></div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h1>{{ $page->name }}</h1>
			@if($page->subtitle!='')<div id="h1_content" class="price">{!! $page->subtitle!!}</div>@endif
			<div id="h1_content">{!! $page->description!!}</div>
		</div>
		<div class="clearfix"></div>
		@if($page->subtitle!='' || $page->description!='' )<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>@endif

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img src="{{asset('img/medium/'.$page->identifier.'-1.jpg')}}" alt="{{$page->alt1}}" class="img-responsive marco" />
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><div id="h2_content">{!! $page->div1!!}</div></div>
		<div class="clearfix"></div><div class="marginb50"></div>

		@if($page->div2 !='')
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 mb50">
			@if($page->item2 !='')<div id="h1_content">{!! $page->item2 !!}</div>@endif
			<div id="h3_content">{!! $page->div2!!}</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<img src="{{asset('img/medium/'.$page->identifier.'-2.jpg')}}" alt="{{$page->alt2}}" class="img-responsive marco" />
		</div>
		<div class="clearfix"></div>
		@endif

		@if($page->div3 !='')
		<div class="marginb50"></div>
		<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>
		<div class="clearfix"></div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img src="{{asset('img/medium/'.$page->identifier.'-3.jpg')}}" alt="{{$page->alt3}}" class="img-responsive marco" />
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@if($page->item3 !='')<div id="h1_content">{!! $page->item3 !!}</div>@endif
			<div id="h4_content">{!! $page->div3 !!}</div>
		</div>
		@endif

		@if($page->div4 !='')
		<div class="clearfix"></div>
		<div class="marginb50"></div>
		<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>
		<div class="clearfix"></div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@if($page->item4 !='')<div id="h1_content">{!! $page->item4 !!}</div>@endif
			<div id="h4_content">{!! $page->div4 !!}</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img src="{{asset('img/medium/'.$page->identifier.'-4.jpg')}}" alt="{{$page->alt4}}" class="img-responsive marco" />
		</div>
		@endif

		@if($page->div5 !='')
		<div class="clearfix"></div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb50">
			<img src="{{asset('img/medium/'.$page->identifier.'-5.jpg')}}" alt="{{$page->alt5}}" class="img-responsive marco" />
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@if($page->item5 !='')<div id="h1_content">{!! $page->item5 !!}</div>@endif
			<div id="h4_content">{!! $page->div5 !!}</div>
		</div>
		@endif

		@if($page->div6 !='')
		<div class="clearfix"></div>
		<div class="marginb50"></div>
		<div class="img-responsive division-01"><img class="img-responsive" src="{{ asset('img/general/division-02.png') }}" alt="separator"></div>
		<div class="marginb50"></div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			@if($page->item6 !='')<div id="h1_content">{!! $page->item6 !!}</div>@endif
			<div id="h4_content">{!! $page->div6 !!}</div>
		</div>
		@endif

		@if($page->div7 !='')
		<div class="clearfix"></div>
		<div class="marginb50"></div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			@if($page->item7 !='')<div id="h1_content">{!! $page->item7 !!}</div>@endif
			<div id="h4_content">{!! $page->div7 !!}</div>
		</div>
		@endif

	</div>


</div>
@stop


@endif
