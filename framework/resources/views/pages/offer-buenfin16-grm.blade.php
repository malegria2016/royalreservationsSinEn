@extends('layouts.default')

@section('title', 'Buen Fin - Hoteles de Lujo Riviera Maya')

@section('metadescription','Uno de los mejores hoteles en la Riviera Maya tiene descuentos del Buen Fin para que reserves tus vacaciones AHORA. ')
@section('og_title', 'Buen Fin - Hoteles de Lujo Riviera Maya')
@section('og_image', asset('img/small/buen-fin-hoteles-de-lujo-2016-es.jpg')) 

@section('container')

{{--*/ 
    $hoy = date("Y-m-d H:i:s"); 
    $ban = 9;

    $end_day='2016-11-25 23:50:00'; 
    $dateInDefault= date("m/d/Y",strtotime("+25 day")); $dateOutDefault=date("m/d/Y",strtotime("+30 day"));
  /*--}}

  @if($end_day < $hoy)

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margint50">
        <h2>@lang('messages.offers_old_1')</h2>
      </div>
      @if(count($all_offers) > 0) 
        @foreach($all_offers as $key=>$offers)
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 offer marginb50">
          <a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/'.$offers->identifier:'/es/'.Lang::get('routes.offers').'/'.$offers->identifier)}}">
          <img class="img-responsive marco" src="{{ asset('img/medium/'.$offers->identifier.'-'.App::getLocale().'.jpg') }}" alt="{{$offers->contents[0]->alt}}">
          </a>
          <a href="{{url(App::getLocale()=='en'?Lang::get('routes.offers').'/'.$offers->identifier:'/es/'.Lang::get('routes.offers').'/'.$offers->identifier)}}">
            <label>{{$offers->contents[0]->headline}}</label>
          </a>
        </div>
      @endforeach
      @endif
    </div>
    <div class="img-responsive"><img class="img-responsive" src="https://royalreservations.com/img/general/division-01.png" alt="separator"></div>
  @endif

    <section>
       
<div>
  
        <div>

        @if($end_day >= $hoy)
        <section> <form class='booking' action="https://bookings.ihotelier.com/bookings.jsp" method="GET" accept-charset="UTF-8" target="_blank" onsubmit="return validateBookingSingle();"> 

        <div class="col-lg-3 col-md-2 col-sm-12 col-xs-12 bookesp"> 
          <span class="lbForm">Select Resort</span> 
          <select class="form-control" id="hotelid" name="hotelid" onchange="validateBooking();"> 
            <option value="95939" id="2186990" data-subtext="Riviera Maya" name="1">Grand Residences Riviera Cancun Resort</option> 
          </select> 
        </div>  
        <input type="hidden" name="identifier" id="identifier" value="BFIN16">
        <input type="hidden" name="RatePlanID" id="RatePlanID" value="1">  
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 bookesp"> 
          <span class="lbForm">Arrival Date</span> 
          <div class="input-group espCalendario"> 
            <input type="text" class="form-control calendario" id="datein" name="datein" readonly="" value="{{$dateInDefault}}">
          </div> 
        </div> 
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 bookesp"> 
          <span class="lbForm">Departure Date</span> 
          <div class="input-group espCalendario"> 
            <input type="text" class="form-control calendario" id="dateout" name="dateout" readonly="" value="{{$dateOutDefault}}">
          </div> 
        </div> 
        <div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp2"> 
          <span id="spAdult" class="lbForm">Adults (+18)</span> 
          <select name="adults" class="form-control" id="select-adults"> 
          <option value="1">1</option> <option value="2" selected>2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="9">9</option> <option value="10">10</option> </select> 
        </div> 
        <div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp2a"> <span id="spTeen" class="lbForm">Teen (13-17)</span> <select name="children" class="form-control" id="select-teens"> <option value="0" selected>0</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> </select> </div> 

        <div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp3" > <span id="spChildren" class="lbForm">Children (0-12)</span> <select name="children2" class="form-control" id="select-childrens"> <option value="0" selected>0</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option> </select> </div> 

        <div class="col-lg-2 col-md-1 col-sm-12 col-xs-12 bookesp"> <span class="lbFormHide">.</span> <button type="submit" class="btn btn-success form-control col-lg-1 btnTemporal" id="btn-booking">Get This Offer</button> </div> <div class="clear"></div> </form> 

        <div class="alert alert-danger msgError" role="alert" id="error-minimum">The minimum number of nights selected does not apply to this promotion</div> <input type="hidden" name="tag_adult" id="tag_adult" value="Adults (+18)"> <input type="hidden" name="tag_adult2" id="tag_adult2" value="Adults (+13)"> <input type="hidden" name="tag_teen" id="tag_teen" value="Teen (13-17)"> <input type="hidden" name="tag_children" id="tag_children" value="Children (0-12)"> <input type="hidden" name="tag_children2" id="tag_children2" value="Children (0-17)"> <input type="hidden" name="minimum" id="minimum" value="0"> 

        </section>      
        @endif

        </div>
  </div>

<div class="container">

  
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <img class="img-responsive margint50 marco" src="{{ asset('img/big/buen-fin-hoteles-de-lujo-2016-es.jpg')}}" alt="Buen Fin - Hoteles de Lujo Riviera Maya">
    </div>
  </div>

    <script>  var travel_window = [{"offer_id":15,"start_date":"2016-11-14 00:00:00","end_date":"2016-12-23 00:00:00"},
                                   {"offer_id":15,"start_date":"2016-12-31 00:00:00","end_date":"2017-02-17 00:00:00"},
                                   {"offer_id":15,"start_date":"2017-02-25 00:00:00","end_date":"2017-12-22 00:00:00"}
                                   ];</script>

  <div class="row marginb50">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h1>Buen Fin - Hoteles en la Riviera Maya</h1>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

<p>Este Buen Fin 2016, podrás comprar la pantalla plana que tanto has querido o la sala de tus sueños. ¿Por qué no incluir tus próximas vacaciones al Caribe en tu lista de Buen Fin 2016 también?  Disfruta inigualables amenidades y servicios de nuestro resort de lujo en Puerto Morelos Riviera Maya, uno de los más bellos destinos del Caribe Mexicano, con ahorros importantes de hasta 50% de descuento.</p>
<br/>
<p style="padding:8px;border:solid 1px #ccc;">Para redimir esta oferta, ingresa el siguiente código: <b>BFIN16</b> en la casilla <b>"Add code - Promo/Corporate"</b></p>
<p><strong>Esta oferta incluye:</strong></p>
<ul>
  <li>Descuento Adicional en Plan Todo Incluido</li>
    <ul>
      <li>Servicio ilimitado a la habitación de 24 horas</li>
      <li>Bebidas de la Casa Premium</li>
      <li>Comidas y Snacks Gourmet</li>
      <li>Acceso libre al Centro de Acondicionamiento Físico</li>
      <li>Servicio de Tour desk para deportes acuáticos y excursiones</li>
      <li>Acceso a Mini Market, entrega a domicilio de pizzas y otros platillos</li>
    </ul>
  <li>Transportación Premium para viaje redondo desde y hacia el aeropuerto</li>
  <li>Los niños se hospedan y comen gratis</li>
  <li>Acceso a Internet de alta velocidad</li>
</ul>
<br/>
<p><strong>Esta oferta incluye:</strong></p>

<ul>
  <li>All-In Grand Experience (Plan Todo Incluido)</li>
</ul>

</div>


    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div id="terms">
      <p><strong>Reserva de y hasta:</strong></p>
      <p>De Noviembre 14 2016 a&nbsp;Noviembre&nbsp;25&nbsp;2016</p>
      <p><strong>Viaja de y hasta:</strong></p>

<table align="left" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>
      <p>De Noviembre 14&nbsp;a&nbsp;Diciembre 23&nbsp;2016</p>

      <p>De Diciembre 31&nbsp;2016&nbsp;a&nbsp;Febrero 16&nbsp;2017</p>

      <p>De Febrero 25&nbsp;a&nbsp;Diciembre&nbsp;22&nbsp;2017</p>
      </td>
    </tr>
  </tbody>
</table>



<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p><strong>Términos y Condiciones:</strong></p>

<ul>
  <li>Sin requisito de mínimo&nbsp;de noches</li>
</ul>
</div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
  
     
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 resort-small">
      <a href="https://royalreservations.com/resorts/grand-residences"><img class="img-responsive marco" src="https://royalreservations.com/img/small/grand-residences-1.jpg" alt="Resort to enjoy Riviera Maya all inclusive vacations with all family"></a>
            <div class="resort-all-room"></div>
            <div class="marcoInferior marginb100">
        <a href="https://royalreservations.com/resorts/grand-residences" class="offersHotels"><span>Grand Residences Riviera Cancun Resort</span></a>
        <div class="resort_stars">
                                <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                        </div>
        <label class="offersPorcentage">Up to 35% OFF</label>
        <div class="ofertaBook">
          <!--<form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
            <input name="hotelid" type="hidden" value="95939">
            <input name="themeid" type="hidden" value="11419">
            <button type="submit" class="btn btn-danger pull-right">Book</button>
          </form>-->
        </div>
      </div>
    </div>
    
  
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50 text-center">
      <a href="https://royalreservations.com/offers" class="btn btn-danger btn-lg">Back to All Offers</a>
    </div>
  </div>

</div>


</section>      

@stop