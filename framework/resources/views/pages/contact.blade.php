@extends('layouts.default')
@section('title', Lang::get('messages.contact_title'))

@section('metadescription',Lang::get('messages.contact_meta'))
@section('keywords', '')

@section('og_title', '')
@section('og_image', '')
@section('og_description', '')

@section('booking')
@include('includes.booking')
@stop

@section('container')
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
			{!! Lang::get('messages.contact_content') !!}
		</div>
	</div>
</div>
@stop
