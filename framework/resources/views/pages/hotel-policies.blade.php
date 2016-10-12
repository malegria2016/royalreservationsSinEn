@extends('layouts.default')
@if(count($policies)>0)
    @section('title', $policies[0]['title'])

    @section('metadescription',$policies[0]['metadescription'])

    @section('og_title', $policies[0]['title'])
    @section('og_image', 'https://royalreservations.com/img/big/404.jpg')
    @section('og_description', $policies[0]['metadescription'])

    @section('container')
    <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
            {!! $policies[0]['overview'];!!}
          </div>
        </div>
    </div>
    @stop
@endif
