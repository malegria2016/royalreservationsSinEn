@extends('layouts.default')
@section('title', Lang::get('messages.contact_title'))

@section('metadescription',Lang::get('messages.contact_meta'))
@section('keywords', '')

@section('og_title', '')
@section('og_image', '')
@section('og_description', '')



@section('container')
<div class="container">
    <div class="row">
        <h1>Royal Resorts Webcams</h1>
        <p>Come to paradise and forget all your worries with an All Inclusive Plan in any of our world-class resorts in the Caribbean offering premium services and amenities for all ages. Seize all the perks and indulgences of our Royal Resorts All Inclusive plans that give you access to delicious dining, thrilling activities and the fascinating tropical landscapes of Cancun and Riviera Maya.</p>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @foreach($resorts as $resort)
            {{--*/ $subname='' /*--}}
            @if($resort->id===1) {{--*/ $url='ci' /*--}} @endif
            @if($resort->id===2) {{--*/ $url='rc' /*--}} @endif
            @if($resort->id===3) {{--*/ $url='ri' /*--}} @endif
            @if($resort->id===4) {{--*/ $url='rs' /*--}} @endif
            @if($resort->id===5) {{--*/ $url='hrm1y2' /*--}} {{--*/ $subname='(phases 1 & 2)' /*--}} @endif


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margint50">
                <div>
                     <a href="http://services.royalresorts.com/webcam/Camara{{$url}}.jpg" data-toggle="modal" data-target="#basicModal{{$resort->id}}"><img class="img-responsive marco" src="{{asset('img/medium/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
                </div>
                <div class="espacioFooter">
                    <span class="tituloHoteles"><a href="#" data-toggle="modal" data-target="#basicModal{{$resort->id}}">{{ $resort->name }} {{ $subname }}</a></span> 
                </div>

                <div class="modal fade" id="basicModal{{$resort->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal{{$resort->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <center><h3 class="modal-title" id="myModalLabel">{{ $resort->name}}{{ $subname }}</h3></center>
                            </div>
                            <div class="modal-body">
                                <center><img src="http://services.royalresorts.com/webcam/Camara{{$url}}.jpg" class="img-responsive"></center>
                            </div>
                            <div class="espacioFooter"><center><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center></div>
                        </div>
                    </div>
                </div>
            </div>
            @if($resort->id===5)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margint50">
                    <div>
                         <a href="http://services.royalresorts.com/webcam/Camara{{$url}}.jpg" data-toggle="modal" data-target="#basicModal{{$resort->id + 1}}"><img class="img-responsive marco" src="{{asset('img/medium/'.$resort->identifier.'-1.jpg')}}" alt="{{$resort->contents[0]->alt1}}"></a>
                    </div>
                    <div class="espacioFooter">
                        <span class="tituloHoteles"><a href="#" data-toggle="modal" data-target="#basicModal{{$resort->id +1}}">{{ $resort->name }} (phases 3 & 4)</a></span> 
                    </div>

                    <div class="modal fade" id="basicModal{{$resort->id + 1}}" tabindex="-1" role="dialog" aria-labelledby="basicModal{{$resort->id + 1}}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <center><h3 class="modal-title" id="myModalLabel">{{ $resort->name }} (phases 3 & 4)</h3></center>
                                </div>
                                <div class="modal-body">
                                    <center><img src="http://services.royalresorts.com/webcam/camarahrm3y4.jpg" class="img-responsive"></center>
                                </div>
                                <div class="espacioFooter"><center><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center></div> 
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
            
        </div>
    </div>
</div>

@stop


