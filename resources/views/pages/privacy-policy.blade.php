@extends('layouts.default')
@section('title', $policies[0]['title'])

@section('metadescription',$policies[0]['metadescription'])
@section('keywords', '')

@section('og_title', '')
@section('og_image', '')
@section('og_description', '')




@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
      {!! $policies[0]['overview'];!!}
		</div>
	</div>
</div>
@stop
