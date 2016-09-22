{{--*/
$contenido="";
$title="";
$metadescription="";
/*--}}

@if (App::getLocale() == 'en')
  {{--*/ 
        $title="Booking with us is your best option!";
        $metadescription="Ingles";
        $contenido="
        <h1>Booking with us is your best option!</h1>
        <h2>Royal Reservations official website</h2>
        <p>Direct Booking is always your best option, reserve quickly, easily and securely; get instant confirmation, no intermediaries, direct booking with no surprises.</p>
        <br>
        <h2>Best Deal Guaranteed.</h2>
        <p>Our Best Deal Guaranteed policy ensures that you will always get the lowest price online plus exclusive benefits only available at Royalreservations.com. If you find a lower price anywhere, let us know and get rewards<strong> (*)</strong>!</p>
        <br>
        <h2>Exclusive extra benefits to your reservation.</h2>
        <p>Direct booking offers exclusive benefits such as unique discounts, added values, resort credits, complimentary airport transportation<strong>(**)</strong> seasonal&nbsp; specials and promotions and last minute offers&nbsp; all year long that you won&rsquo;t find anywhere else,&nbsp; guaranteed.</p>
        <br>
        <h2>No hidden fees</h2>
        <p>Direct booking guarantees no hidden fees or online booking fees as you are dealing directly with the hotel, always&nbsp; at the best price</p>
        <br>
        <h2>Instant confirmation</h2>
        <p>Make plans ahead of time with no stress or worries, direct booking guarantees real availability and instant reservation confirmation after booking with all detailed information of your vacation, no surprises!</p>
        <br>
        <h2>Book now, pay later.</h2>
        <p>Flexible payment options, your room is always secured and guaranteed.</p>
        <br>
        <h2>Payment plans</h2>
        <p>Payment flexibility always, just let us know, we have the plan that suits you best.</p>
        <br>
        <h2>Flexible cancellation policies</h2>
        <p>We understand that even the best laid plans can easily change; you can cancel up to one day before arrival with no fees<strong> (***)</strong>.</p>
        <br>
        <h2>Customer Service all year long</h2>
        <p>Need assistance with your reservation? Need to confirm details of your vacation?&nbsp; Contact us via email or by phone, our guests are our priority, we are here for you.</p>
        <br>
        <h2>Secure payment process and information security</h2>
        <p>Your payment is processed securely and privately,&nbsp; we do not share any information with the merchant, see our privacy policy.</p>
        <br>
        <br>
        <br>
        <p><strong>* Subject to terms &amp; conditions</strong></p>
        <p><strong>** Transportation is available only on selected packages.</strong></p>
        <p><strong>*** Subject to availability depending on the season</strong></p>

        ";
  /*--}}
@elseif (App::getLocale() == 'es')
    {{--*/ 
        $title="&iexcl;Reservar con nosotros es su mejor opci&oacute;n!";
        $metadescription="Español";
        $contenido="
        <div>
        <h1>&iexcl;Reservar con nosotros es su mejor opci&oacute;n!</h1>
        </div>
        <h2>Sitio oficial de Royal Reservations</h2>
        <p>Reservar directamente en Royal Reservations ser&aacute; siempre su mejor opci&oacute;n. Contamos con un sistema de reservas que integra rapidez, seguridad y es f&aacute;cil de manejar para nuestros usuarios, lo que nos permite brindarle la mejor atenci&oacute;n envi&aacute;ndole de manera instant&aacute;nea la confirmaci&oacute;n de su reservaci&oacute;n, sin intermediarios y sin sorpresas, pues estar&aacute; tratando directamente con el equipo de reservas de Royal Resorts.</p>
        <h2>Mejor Precio Garantizado</h2>
        <p>Con nuestra pol&iacute;tica de Mejor Precio Garantizado le aseguramos que siempre obtendr&aacute; el precio m&aacute;s bajo y beneficios exclusivos, &uacute;nicamente disponibles en Royalreservations.com. Adem&aacute;s, si encuentra una mejor tarifa en cualquier otro sitio de reservas, s&oacute;lo tiene que informarnos para obtener incre&iacute;bles recompensas (*).</p>
        <h2>Valores agregados exclusivos de su reserva</h2>
        <p>Reservar directamente con Royal Reservations le concede valores agregados y beneficios exclusivos tales como descuentos &uacute;nicos, cr&eacute;ditos, transportaci&oacute;n gratuita (**), promociones especiales durante todo el a&ntilde;o y por temporada, as&iacute; como ofertas de &uacute;ltimo minuto que no encontrar&aacute; en ning&uacute;n otro sitio web o agencia en l&iacute;nea.</p>
        <h2>Sin costos extras ni pagos ocultos</h2>
        <p>Reservar directamente con nosotros le garantiza recibir siempre precios totales, lo que significa que no encontrar&aacute; &nbsp;pagos ocultos ni costos extras despu&eacute;s de realizar su reservaci&oacute;n, ya que en todo momento estar&aacute; tratando directamente con el mejor equipo de reservas de la familia Royal Resorts, por lo que siempre obtendr&aacute; el mejor precio y trato garantizados.</p>
        <h2>Confirmaci&oacute;n instant&aacute;nea.</h2>
        <p>Con Royal Reservations podr&aacute; planear sus vacaciones con tiempo y sin preocupaciones, pues al reservar directamente con nosotros tendr&aacute; la garant&iacute;a de conocer la disponibilidad real del hotel que elija y recibir la confirmaci&oacute;n instant&aacute;nea de su reservaci&oacute;n, con informaci&oacute;n detallada de sus vacaciones.</p>
        <h2>Reserve ahora y pague despu&eacute;s</h2>
        <p>Reservar directamente con Royal Reservations le brinda beneficios incre&iacute;bles tales como opciones de pago flexibles y la seguridad de saber que la reserva de su habitaci&oacute;n est&aacute; garantizada.</p>
        <h2>Planes de pago.</h2>
        <p>En Royal Reservations contamos con planes de pago flexibles que se ajustan a sus necesidades. Realice su reserva y elija el plan que m&aacute;s le convenga.</p>
        <h2>Pol&iacute;ticas de cancelaci&oacute;n flexibles</h2>
        <p>En Royal Reservations sabemos que los planes pueden cambiar repentinamente, por lo que al reservar con nosotros tendr&aacute; la posibilidad de realizar la cancelaci&oacute;n de su reserva hasta con un (1) d&iacute;a de anticipaci&oacute;n a su llegada, sin costos adicionales (***).</p>
        <h2>Servicio al cliente todo el a&ntilde;o</h2>
        <p>&iquest;Necesita asistencia con su reservaci&oacute;n o confirmar detalles de la misma? Cont&aacute;ctenos v&iacute;a correo electr&oacute;nico o por tel&eacute;fono, con gusto lo ayudaremos y le brindaremos la mejor atenci&oacute;n. En Royal Reservations nuestros clientes son lo m&aacute;s importante para nosotros.</p>
        <h2>Seguridad para su informaci&oacute;n y proceso de pago</h2>
        <p>Al realizar su pago, podr&aacute; tener la tranquilidad de que &eacute;ste ser&aacute; procesado de forma segura, adem&aacute;s de que la informaci&oacute;n que nos brinde ser&aacute; totalmente confidencial. Para mayor informaci&oacute;n, consulte nuestra pol&iacute;tica de privacidad.</p>
        <p>&nbsp;</p>
        <p><strong>* Sujeto a t&eacute;rminos y condiciones</strong></p>
        <p><strong>**La transportaci&oacute;n gratuita est&aacute; disponible en paquetes selectos.</strong></p>
        <p><strong>***Sujeto a disponibilidad dependiendo de la temporada.&nbsp;</strong></p>

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