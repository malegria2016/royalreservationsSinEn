<?php
    require 'library/Db.class.php';
    require 'library/Conf.class.php';

    $bd=Db::getInstance();

    $sql='SELECT name,identifier,ihotelier_id,area,ihotelier_theme,resort_contents.short_description FROM resorts JOIN resort_contents ON resorts.id=resort_contents.resort_id WHERE resort_contents.lang_id=1';
    $resorts=$bd->ejecutar($sql);

    /*while ($resorts_vector=$bd->obtener_fila($resorts,0)){
       echo $resorts_vector['name'].'<br />';
    }*/

    $dateInDefault= date("m/d/Y",strtotime("+25 day")); $dateOutDefault=date("m/d/Y",strtotime("+30 day"));

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#00345E">
        <meta name="ROBOTS" content="INDEX, FOLLOW">
        <title>Resorts in Cancun</title>
        <link rel="shortcut icon" href="https://royalreservations.com/favicon.ico">
        <meta name="description" content="Get this exclusive cancun deal when booking through our site and live a unforgettable Cancun Family Vacations.">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
        window.fbAsyncInit = function() { FB.Canvas.setSize( {height: 2600px} ); }
        function sizeChangeCallback() { FB.Canvas.setSize( {height: 2600px} ); }
        </script>

    </head>

    <body>
        <link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/bootstrap.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/ui.totop.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/datepicker.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/font-awesome.min.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/jquery.floating-social-share.css">
        <link media="all" type="text/css" rel="stylesheet" href="https://royalreservations.com/css/flexslider.css">
        <link media="all" type="text/css" rel="stylesheet" href="css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 navbar-header"><h2>OUR RESORTS</h2></div>
                </div>
            </div>
        </header>
        <section>
            <div>
                <div>
                    <div class="container">
                        <div id="dining" class="row" style="display: block;">
                            <div class="clearfix"></div>
                            <?php while ($resorts_vector=$bd->obtener_fila($resorts,0)){ ?>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <img class="img-responsive marco" src="https://royalreservations.com/img/medium/en-<?php echo $resorts_vector['identifier'] ?>-1.jpg" alt="#">
                                    <div class="marcoInferior marginb50 hotelDiningTitulo">
                                        <strong><?php echo $resorts_vector['name'] ?></strong>
                                        <h4>Located on <?php echo $resorts_vector['area'] ?></h4>
                                        <div class="dining_description">
                                            <p><?php echo $resorts_vector['short_description'] ?> <!--A cozy and nice family hotel preferred by loyal guests for its impeccable services, delicious Italian restaurant, kind staff and kid-friendly amenities and beach.--></p>
                                        </div>
                                        <form action="https://bookings.ihotelier.com/bookings.jsp" method="POST" target="_blank">
                                            <input name="hotelid" type="hidden" value="<?php echo $resorts_vector['ihotelier_id'] ?>">
                                            <input name="themeid" type="hidden" value="<?php echo $resorts_vector['ihotelier_theme'] ?>">
                                            <input name="datein"  type="hidden" value="<?php echo $dateInDefault ?>">
                                            <input name="dateout" type="hidden" value="<?php echo $dateOutDefault ?>">
                                            <input name="adults" type="hidden" value="2">
                                            <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="clearfix"></div>
                            <!--PRIMER RENGLON CON 3 HOTELES-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/small/RS-hacienda-sisal.jpg" alt="#">
                                <div class="marcoInferior marginb50 hotelDiningTitulo">
                                    <strong>The Royal Cancun</strong>
                                    <div class="dining_description">
                                        <p>A cozy and nice family hotel preferred by loyal guests for its impeccable services, delicious Italian restaurant, kind staff and kid-friendly amenities and beach.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/small/RS-la-veranda.jpg" alt="#">
                                <div class="marcoInferior marginb50 hotelDiningTitulo">
                                    <strong>The Royal Sands</strong>
                                    <div class="dining_description">
                                        <p>A fine resort to live a relaxing experience in one of the best beaches. Unwind on the beach or by the pool, work out at the Fitness Center, play tennis or relax at the world class Spa.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/small/RS-char-hut.jpg" alt="#">
                                <div class="marcoInferior marginb50 hotelDiningTitulo">
                                    <strong>The Royal Haciendas</strong>
                                    <div class="dining_description">
                                        <p>Experience the elegance of Old Mexico and enjoy spacious fully equipped villas, in Playa del Carmen paradise offering a sweet relaxing indulgence.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!--SEGUNDO RENGLON PARA 1 HOTEL [GR]-->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 marginb50 margint50">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/big/online-exclusive-cancun-deal-en.jpg" alt="#">
                                <div class="marcoInferior hotelDiningTitulo">
                                    <strong>Grand Residences Riviera Cancun</strong>
                                    <div class="dining_descriptionGR">
                                        <p>The crown of our family was Ranked #1 in Puerto Morelos, Riviera Maya by Tripadvisor, with 103 beautifully appointed Junior Suites and Master Suites offering signature hospitality and services in an exclusive pristine hideaway.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!--TERCE RENGLON PARA 2 HOTELES-->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 room marginb50">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/medium/RS-junior-suite-ov.jpg" alt="junior suite in Cancun Resort">
                                <div class="marcoInferior hotelRooms">
                                    <strong>The Royal Islander</strong>
                                    <div class="accommodation_description">
                                        <p>Family oriented tranquil getaway in paradise offering direct access to its twin resort The Royal Caribbean, offering five-star services and spacious villas for your comfort and peace.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 room marginb50">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/medium/RS-junior-suite-ov.jpg" alt="junior suite in Cancun Resort">
                                <div class="marcoInferior hotelRooms">
                                    <strong>The Royal Caribbean</strong>
                                    <div class="accommodation_description">
                                        <p>Family oriented tranquil getaway in paradise offering direct access to its twin resort The Royal Islander, offering five-star services and spacious villas for your comfort and peace.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!--CUARTO RENGLON CON 3 HOTELES-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/small/RS-sands-express.jpg" alt="express food to go in The Royal Sands">
                                <div class="marcoInferior marginb50 hotelDiningTitulo">
                                    <strong>Simpson Bay Resort & Marina</strong>
                                    <div class="dining_description">
                                        <p>Experience the best of two countries in one: Dutch St. Maarten and French Saint Martin, in a sheltered beach with fine services and amenities.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/small/RS-bartolos-pizza.jpg" alt="Bartolo's pizza in The Royal Sands Resort">
                                <div class="marcoInferior marginb50 hotelDiningTitulo">
                                    <strong>The Villas at Simpson Bay Resort & Marina</strong>
                                    <div class="dining_description">
                                        <p>2014 Winner for the Certificate of Excellence by Tripadvisor honoring its excellence for hospitality. You have five star amenities on the front row for spectacular Caribbean sunsets.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img class="img-responsive marco" src="https://royalreservations.com/img/small/RS-sidelines.jpg" alt="sports bar and karaoke with pool tables in Cancun Resort">
                                <div class="marcoInferior marginb50 hotelDiningTitulo">
                                    <strong>The Royal Sea Aquarium</strong>
                                    <div class="dining_description">
                                        <p>A singular but beautiful hotel in the heart of Curacao over a platform on Caribbean waters, attracts travelers thirsting for peace and nature. Enjoy fine beaches and a rich cultural heritage.</p>
                                    </div>
                                    <form action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="_gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
                                        <input name="hotelid" type="hidden" value="86169">
                                        <input name="themeid" type="hidden" value="10060">
                                        <button type="submit" class="btn btn-danger pull-right">BOOK NOW!</button>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                </section>
        <script src="https://royalreservations.com/js/jquery.js"></script>
        <script src="https://royalreservations.com/js/bootstrap.min.js"></script>
        <script src="https://royalreservations.com/js/jquery.ui.totop.min.js"></script>        

        <div id="fb-root"></div>
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <script type="text/javascript" charset="utf-8">
        window.fbAsyncInit = function() 
        {
            FB.init({ appId: '1395503723810533', 
            status: true, 
            cookie: true,
            xfbml: true,
            oauth: true});

            FB.Canvas.setAutoGrow();
        }
        </script>

    </body>
</html>
