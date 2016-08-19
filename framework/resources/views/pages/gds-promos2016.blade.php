@extends('layouts.default')
@section('title', Lang::get('messages.contact_title'))

@section('metadescription',Lang::get('messages.contact_meta'))
@section('keywords', '')

@section('og_title', '')
@section('og_image', '')
@section('og_description', '')

@section('style')
<style type="text/css">
    h2 {}
    h5 {font-size: 36px !important;}
    td, th {padding: 12px !important;}
    hr {margin-top: 50px !important;margin-bottom: 50px !important;border: 0 !important;border-top: 3px solid #999 !important;box-shadow: 0px 3px 8px 0px #999 !important;}
    h2 span{color:#8c8c8c;font-size: 16px;text-decoration: none !important;}
    .tituloHotel {margin-bottom: 0;}
    .carousel-control {padding-top:8%;width:5% !important;background: rgba(0,0,0,0.7);}
    .bm01{background: #00345E; color: #fff;text-align: center;font-size: 14px;}
    .bm02{background: #0c589b; color: #fff;text-align: center;font-size: 14px;}
    .bm03{background: #FF6600; color: #fff;}
    .bc01{font-weight: bold;text-align: center;}
    .centrado{width: auto;margin: 0 auto;}
    .txtcenter{text-align: center;}

    .contacto { 
        position:fixed; top:75%; right:0%;background-color: #FF6600; width: 120px; border: 1px solid #aaa; padding: 13px; height: 70px;
        transition: height 0.5s;
        -webkit-transition: height 0.5s;
        transition: width 0.5s;
        -webkit-transition: width 0.5s;
        text-align: center;
        overflow: hidden;
        color: #fff;
        -webkit-border-top-left-radius: 10px;
        -webkit-border-bottom-left-radius: 10px;
        -moz-border-radius-topleft: 10px;
        -moz-border-radius-bottomleft: 10px;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        z-index: 1000 !important;
    }
    .contacto:hover{height: auto;width: 380px;z-index: 1000 !important;}
    .contactomail {color: #fff !important;}

</style>

@section('container')
<div class="container-fluid">
    <div class="row">
        <img class="img-responsive" src="https://royalreservations.com/img/gds/principal-7.jpg" alt="----">
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
            <div class="contacto">
                <b>Contact info</b><br><br>
                <u>Get in touch with one of our travel counselors:</u><br>
                Toll Free US/Canada 1 888-387-4756<br>
                International (+52) 998-848-8226<br>
                E-mail: <a href="mailto:agentquestions@royalresorts.com" class="contactomail">agentquestions@royalresorts.com</a><br><br>
            </div>
    		@lang('messages.tx_gds')

            <table border="1" class="centrado marginb50 margint50">
                <tr>
                    <th colspan="2" class="bm01">GDS Exclusive Deal</th>
                </tr>
                <tr>
                    <td class="bm01">Agent Deal:</td>
                    <td class="bm03">15% rate discount, Plus 15% GDS Commission</td>
                </tr>
                <tr>
                    <td class="bm01">Booking Window:</td>
                    <td>May 10, 2016 to June 30, 2016</td>
                </tr>
                <tr>
                    <td class="bm01">Travel Window:</td>
                    <td>May 10, 2016 to December 20, 2017</td>
                </tr>                
            </table>
            <br>

            <button type="button" id="btn-all" class="btn btn-primary hidden-xs">All<br>Mexico & Caribbean</button>
            <button type="button" id="btn-mex" class="btn btn-primary hidden-xs">Mexico<br>Cancun & Playa del Carmen</button>
            <button type="button" id="btn-car" class="btn btn-primary hidden-xs">Caribbean<br>Sint Maarten & Curaçao</button>
            <select id="select-hotels" class="form-control visible-xs xs-selector">
                <option value="btn-all">@lang('messages.all')</option>
                <option value="btn-mex" >@lang('messages.mexico')</option>
                <option value="btn-car">@lang('messages.caribbean')</option>
            </select>
            <br><br>
            

    	</div>

    	
        <div class="row" id="mex">

        <h5 class="text-center">Mexico</h5>
            
            {{--*/ $ban=1 /*--}}

    		@foreach($resortGds as $key=>$resort)

                @if($resort->ubicacion==='MEXICAN CARIBBEAN')

                    <h2 class="tituloHotel">{!! $resort->nombre !!}</h2>

                    <div class="resort_stars marginb30">
                        {{--*/ $stars = round( $resort->estrellas * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
                        @while($i <= $stars - 1)
                            <i class="fa fa-star"></i>
                            {{--*/ $i += 2; /*--}}
                        @endwhile
                        @if($stars & 1)
                            <i class="fa fa-star-half-o"></i>
                        @endif
                    </div>

                    <p>{{ $resort->texto1 }}</p>

                    <table border="1" style="width:100%">
                        <tr>
                            <td rowspan="2" class="bm01">@lang('messages.label_gds_title')</td>
                            <td class="bm01">Pegasus</td>
                            <td class="bm01">Amadeus</td>
                            <td class="bm01">Galileo</td>
                            <td class="bm01">Sabre</td>
                            <td class="bm01">WorldSpan</td>
                            <td class="bm01">Pegasus ODD</td>
                            <td class="bm01">TravelWeb Net</td>
                        </tr>
                        <tr>
                            <td class="bc01">{{ $resort->pegasus }}</td>
                            <td class="bc01">{{ $resort->amadeus }}</td>
                            <td class="bc01">{{ $resort->galileo }}</td>
                            <td class="bc01">{{ $resort->sabre }}</td>
                            <td class="bc01">{{ $resort->world_span }}</td>
                            <td class="bc01">{{ $resort->pegasus_odd }}</td>
                            <td class="bc01">{{ $resort->travel_web_net }}</td>
                        </tr>
                    </table>
                    <br>

                    <p>Then, take advantage of these special discounted rates using the following rate plans:</p>

                    <table border="1" style="width:100%">
                        <tr>
                            <td class="bm02">Code</td>
                            <td class="bm02">Rate Plan</td>
                            <td class="bm02">Short Description</td>
                            <td class="bm02">% Comission</td>
                            <td class="bm02">Extra discount applied</td>
                        </tr>

                        @foreach($rateplan as $key=>$rate)
                            @if($resort->id_resort == $rate->id_hotel)
                        <tr>
                            <td>{{ $rate->codigo }}</td>
                            <td>{{ $rate->rateplan }}</td>
                            <td>{{ $rate->descripcion }}</td>
                            <td class="txtcenter">{{ $rate->comision }}</td>
                            <td class="txtcenter">{{ $rate->extra_descuento }}</td>
                        </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>


                    <div class="well">
                        <div id="myCarousel{{ $ban }}" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-1.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-2.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-3.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-4.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-5.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-6.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-7.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-8.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-9.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-10.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-11.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-12.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                            </div>
                            <!--/carousel-inner-->
                            <a class="left carousel-control" href="#myCarousel{{ $ban }}" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel{{ $ban }}" data-slide="next">›</a>
                        </div>
                        <!--/myCarousel-->
                    </div>
                    <div class="txtcenter">
                        <a href="{{ $resort->website }}" class="btn btn-warning btn-lg">@lang('messages.link_gds')</a>
                    </div>

                    <hr>
                @endif
    			
                 {{--*/ $ban++ /*--}}
    		@endforeach
        </div>

    <div class="row" id="car">
            <h5 class="text-center">@lang('messages.caribbean')</h5>
            {{--*/ $banCar=1 /*--}}
            @foreach($resortGds as $key=>$resort)
                @if($resort->ubicacion==='CARIBBEAN ISLANDS')
                    <h2 class="tituloHotel">{!! $resort->nombre !!}</h2>
                    <div class="resort_stars marginb30">
                        {{--*/ $stars = round( $resort->estrellas * 2, 0, PHP_ROUND_HALF_UP); $i=1 /*--}}
                        @while($i <= $stars - 1)
                            <i class="fa fa-star"></i>
                            {{--*/ $i += 2; /*--}}
                        @endwhile
                        @if($stars & 1)
                            <i class="fa fa-star-half-o"></i>
                        @endif
                    </div>

                    <p>{{ $resort->texto1 }}</p>

                    <table border="1" style="width:100%">
                        <tr>
                            <td rowspan="2" class="bm01">@lang('messages.label_gds_title')</td>
                            <td class="bm01">Pegasus</td>
                            <td class="bm01">Amadeus</td>
                            <td class="bm01">Galileo</td>
                            <td class="bm01">Sabre</td>
                            <td class="bm01">WorldSpan</td>
                            <td class="bm01">Pegasus ODD</td>
                            <td class="bm01">TravelWeb Net</td>
                        </tr>
                        <tr>
                            <td class="bc01">{{ $resort->pegasus }}</td>
                            <td class="bc01">{{ $resort->amadeus }}</td>
                            <td class="bc01">{{ $resort->galileo }}</td>
                            <td class="bc01">{{ $resort->sabre }}</td>
                            <td class="bc01">{{ $resort->world_span }}</td>
                            <td class="bc01">{{ $resort->pegasus_odd }}</td>
                            <td class="bc01">{{ $resort->travel_web_net }}</td>
                        </tr>
                    </table>
                    <br>

                    <p>Then, take advantage of these special discounted rates using the following rate plans:</p>

                    <table border="1" style="width:100%">
                        <tr>
                            <td class="bm02">Code</td>
                            <td class="bm02">Rate Plan</td>
                            <td class="bm02">Short Description</td>
                            <td class="bm02">% Comission</td>
                            <td class="bm02">Extra discount applied</td>
                        </tr>

                        @foreach($rateplan as $key=>$rate)
                            @if($resort->id_resort == $rate->id_hotel)
                        <tr>
                            <td>{{ $rate->codigo }}</td>
                            <td>{{ $rate->rateplan }}</td>
                            <td>{{ $rate->descripcion }}</td>
                            <td class="txtcenter">{{ $rate->comision }}</td>
                            <td class="txtcenter">{{ $rate->extra_descuento }}</td>
                        </tr>
                            @endif
                        @endforeach
                    </table>
                    <br>
                    <div class="well">
                        <div id="myCarousel{{ $banCar}}" class="carousel slide">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row">
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-1.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-2.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-3.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-4.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-5.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-6.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-7.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-8.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                                <div class="item">
                                    <div class="row">
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-9.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-10.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-11.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                        <div class="col-sm-3"><img src="{{asset('img/gds/'.$resort->identificador.'-12.jpg')}}" alt="{{ $resort->alt1 }}" class="img-responsive"></div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->
                            </div>
                            <!--/carousel-inner-->
                            <a class="left carousel-control" href="#myCarousel{{ $banCar}}" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel{{ $banCar}}" data-slide="next">›</a>
                        </div>
                        <!--/myCarousel-->
                    </div>
                    <div class="txtcenter">
                        <a href="{{ $resort->website }}" class="btn btn-warning btn-lg">@lang('messages.link_gds')</a>
                    </div>

                    <hr>
                @endif
                
                
                {{--*/ $banCar ++ /*--}}

            @endforeach
        </div>

    	

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