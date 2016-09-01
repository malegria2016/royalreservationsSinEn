@if (App::getLocale() == 'en')
  {{--*/ 
        $title="Ingles";
        $metadescription="Ingles";
        $contenido="
        <h1>Best Deal Ingles</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Nunc odio sem, lobortis id molestie non, faucibus quis nibh.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc odio sem, lobortis id molestie non, faucibus quis nibh.</p>

        ";
  /*--}}
@elseif (App::getLocale() == 'es')
    {{--*/ 
        $title="Español";
        $metadescription="Español";
        $contenido="
        <h1>Best Deal Español</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Nunc odio sem, lobortis id molestie non, faucibus quis nibh.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nunc odio sem, lobortis id molestie non, faucibus quis nibh.</p>

        ";
  /*--}}
@endif


@extends('layouts.default')
@section('title', $title)

@section('metadescription', $metadescription)
@section('keywords', '')

@section('og_title', '')
@section('og_image', '')
@section('og_description', '')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
     {!! $contenido !!}
    </div>
  </div>
</div>
@stop