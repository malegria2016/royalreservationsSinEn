<?php
    require 'library/Db.class.php';
    require 'library/Conf.class.php';

    $bd=Db::getInstance();

    $i=0;
    $c=1;
    $offers_ids[0]=0;
    $offers_ids[1]=0;
    $offers_ids[2]=0;
    $today=date("Y-m-d");
    $dateInDefault= date("m/d/Y",strtotime("+25 day")); $dateOutDefault=date("m/d/Y",strtotime("+30 day"));

    $sql1="SELECT offers.id as id_offer,offers.name,offers.identifier,offers.ihotelier_type, offers.rate_access_code,offer_contents.alt,offer_contents.facebook_description,offer_contents.headline FROM offers JOIN offer_contents ON offers.id=offer_contents.offer_id WHERE offer_contents.lang_id=1 AND offers.status=1 AND main=1 AND offers.end_date>'".$today."' AND offers.start_date<='".$today."' ORDER BY offers.priority DESC LIMIT 3";

    //echo $sql1;
    $offers=$bd->ejecutar($sql1);

    
    while ($offers_vector=$bd->obtener_fila($offers,0)){
       $offers_ids[$i]=$offers_vector['id_offer'];
       $offers_store[$i]['id_offer']=$offers_vector['id_offer'];
       $offers_store[$i]['name']=$offers_vector['name'];
       $offers_store[$i]['identifier']=$offers_vector['identifier'];
       $offers_store[$i]['ihotelier_type']=$offers_vector['ihotelier_type'];
       $offers_store[$i]['headline']=$offers_vector['headline'];
       $offers_store[$i]['alt']=$offers_vector['alt'];
       $offers_store[$i]['facebook_description']=$offers_vector['facebook_description'];

       //echo $offers_ids[$i]."-";
       $i++;
    }

    $sql2="SELECT * FROM offer_resort JOIN resorts ON offer_resort.resort_id=resorts.id WHERE offer_id IN(".$offers_ids[0].")";
    $sql3="SELECT * FROM offer_resort JOIN resorts ON offer_resort.resort_id=resorts.id WHERE offer_id IN(".$offers_ids[1].")";
    $sql4="SELECT * FROM offer_resort JOIN resorts ON offer_resort.resort_id=resorts.id WHERE offer_id IN(".$offers_ids[2].")";

    $offers=$bd->ejecutar($sql1);

    $resort3=$bd->ejecutar($sql2);
    $i=0;
    while ($resorts_vector=$bd->obtener_fila($resort3,0)){
      if($resorts_vector['location']=='Mexican Caribbean') {
        $vector1_mx[$i]['id']=$resorts_vector['id'];
        $vector1_mx[$i]['name']=$resorts_vector['name'];
        $vector1_mx[$i]['location']=$resorts_vector['location'];
        $vector1_mx[$i]['ihotelier_id']=$resorts_vector['ihotelier_id'];
        $vector1_mx[$i]['ihotelier_rate_id']=$resorts_vector['ihotelier_rate_id'];
        $vector1_mx[$i]['area']=$resorts_vector['area'];
      }
      else{
        $vector1_ca[$i]['id']=$resorts_vector['id'];
        $vector1_ca[$i]['name']=$resorts_vector['name'];
        $vector1_ca[$i]['location']=$resorts_vector['location'];
        $vector1_ca[$i]['ihotelier_id']=$resorts_vector['ihotelier_id'];
        $vector1_ca[$i]['ihotelier_rate_id']=$resorts_vector['ihotelier_rate_id'];
        $vector1_ca[$i]['area']=$resorts_vector['area'];
      }
        
        $i++;
    }


    $resort2=$bd->ejecutar($sql3);
    $i=0;
    while ($resorts_vector=$bd->obtener_fila($resort2,0)){
      if($resorts_vector['location']=='Mexican Caribbean') {
        $vector2_mx[$i]['id']=$resorts_vector['id'];
        $vector2_mx[$i]['name']=$resorts_vector['name'];
        $vector2_mx[$i]['location']=$resorts_vector['location'];
        $vector2_mx[$i]['ihotelier_id']=$resorts_vector['ihotelier_id'];
        $vector2_mx[$i]['ihotelier_rate_id']=$resorts_vector['ihotelier_rate_id'];
        $vector2_mx[$i]['area']=$resorts_vector['area'];
      }
      else{
        $vector2_ca[$i]['id']=$resorts_vector['id'];
        $vector2_ca[$i]['name']=$resorts_vector['name'];
        $vector2_ca[$i]['location']=$resorts_vector['location'];
        $vector2_ca[$i]['ihotelier_id']=$resorts_vector['ihotelier_id'];
        $vector2_ca[$i]['ihotelier_rate_id']=$resorts_vector['ihotelier_rate_id'];
        $vector2_ca[$i]['area']=$resorts_vector['area'];
      }
        
        $i++;
    }

    $resort1=$bd->ejecutar($sql4);
    $i=0;
    while ($resorts_vector=$bd->obtener_fila($resort1,0)){
      if($resorts_vector['location']=='Mexican Caribbean') {
        $vector3_mx[$i]['id']=$resorts_vector['id'];
        $vector3_mx[$i]['name']=$resorts_vector['name'];
        $vector3_mx[$i]['location']=$resorts_vector['location'];
        $vector3_mx[$i]['ihotelier_id']=$resorts_vector['ihotelier_id'];
        $vector3_mx[$i]['ihotelier_rate_id']=$resorts_vector['ihotelier_rate_id'];
        $vector3_mx[$i]['area']=$resorts_vector['area'];
      }
      else{
        $vector3_ca[$i]['id']=$resorts_vector['id'];
        $vector3_ca[$i]['name']=$resorts_vector['name'];
        $vector3_ca[$i]['location']=$resorts_vector['location'];
        $vector3_ca[$i]['ihotelier_id']=$resorts_vector['ihotelier_id'];
        $vector3_ca[$i]['ihotelier_rate_id']=$resorts_vector['ihotelier_rate_id'];
        $vector3_ca[$i]['area']=$resorts_vector['area'];
      }
        
        $i++;
    }

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#00345E">
        <meta name="ROBOTS" content="INDEX, FOLLOW">
        <title>Cancun Offers</title>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-area marginb15b"><h3 class="center tx-white">ROYAL RESORTS BEST PROMOTIONS AND SPECIAL OFFERS IN THE CARIBBEAN</h3></div>
                </div>
            </div>
        </header>
        <section>
            <div>
                <div>
                    <div class="container">
                        <div class="row" style="display: block;">
                                <!--Oferta 1-->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img class="img-responsive marco-c" src="https://royalreservations.com/img/medium/<?php echo $offers_store[0]['identifier'] ?>-en.jpg" alt="#">
                                    <form onsubmit="searchIhotelierRatePlan1()" id="uno" class="booking-offers" action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control" id="hotelid" name="hotelid" onchange="searchIhotelierRatePlan1()">
                                          <?php if(isset($vector1_mx)){ ?>
                                                <optgroup label="Mexican Caribbean">
                                                   <?php for($j=0;$j<count($vector1_mx);$j++){?>
                                                            <option id="<?php echo $vector1_mx[$j]['ihotelier_rate_id'] ?>" value="<?php echo $vector1_mx[$j]['ihotelier_id'] ?>" data-subtext="<?php echo $vector1_mx[$j]['area'] ?>"><?php echo $vector1_mx[$j]['name'] ?></option>
                                                   <?php } ?>
                                                </optgroup>
                                          <?php }?>
                                          <?php if(isset($vector1_ca)){ ?>
                                                <optgroup label="Caribbean Islands">
                                                    <?php for($j=0;$j<count($vector1_ca);$j++){?>
                                                            <option id="<?php echo $vector1_ca[$j]['ihotelier_rate_id'] ?>" value="<?php echo $vector1_ca[$j]['ihotelier_id'] ?>" data-subtext="<?php echo $vector1_ca[$j]['area'] ?>"><?php echo $vector1_ca[$j]['name'] ?></option>
                                                   <?php } ?>
                                                </optgroup>
                                          <?php }?>
                                        </select>
                                        </div>
                                        <?php if($offers_store[0]['ihotelier_type']==1){ ?>
                                            <input type="hidden" name="RatePlanID" id="RatePlanID1" value="">
                                        <?php } else{?>
                                            <input type="hidden" name="packageId" id="packageId1" value="">
                                        <?php } ?>
                                        
                                        <input type="hidden" name="adults" id="adults" value="2">
                                        <input type="hidden" name="children" id="children" value="0">
                                        <input type="hidden" name="children2" id="children2" value="0">
                                        <input type="hidden" id="datein" name="datein" value="<?php echo $dateInDefault; ?>">
                                        <input type="hidden" id="dateout" name="dateout" value="<?php echo $dateOutDefault; ?>">

                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <button type="submit" class="btn book pull-right">BOOK NOW !</button>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                    <div class="marcoInferior-c marginb50 hotelDiningTitulo">
                                        <strong><?php echo $offers_store[0]['headline'] ?></strong>
                                        <div class="dining_description">
                                            <p><?php echo $offers_store[0]['facebook_description'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!--Oferta 2-->
                                <div id="dos" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img class="img-responsive marco-c" src="https://royalreservations.com/img/medium/<?php echo $offers_store[1]['identifier'] ?>-en.jpg" alt="#">
                                    <form onsubmit="searchIhotelierRatePlan2()" class="booking-offers" action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control" id="hotelid" name="hotelid" onchange="searchIhotelierRatePlan2()">
                                          <?php if(isset($vector2_mx)){ ?>
                                                <optgroup label="Mexican Caribbean">
                                                   <?php for($j=0;$j<count($vector2_mx);$j++){?>
                                                           <option id="<?php echo $vector2_mx[$j]['ihotelier_rate_id'] ?>" value="<?php echo $vector2_mx[$j]['ihotelier_id'] ?>" data-subtext="<?php echo $vector2_mx[$j]['area'] ?>"><?php echo $vector2_mx[$j]['name'] ?></option>
                                                   <?php } ?>
                                                </optgroup>
                                          <?php }?>
                                          <?php if(isset($vector2_ca)){ ?>
                                                <optgroup label="Caribbean Islands">
                                                    <?php for($j=0;$j<count($vector2_ca);$j++){?>
                                                            <option id="<?php echo $vector2_ca[$j]['ihotelier_rate_id'] ?>" value="<?php echo $vector2_ca[$j]['ihotelier_id'] ?>" data-subtext="<?php echo $vector2_ca[$j]['area'] ?>"><?php echo $vector2_ca[$j]['name'] ?></option>
                                                   <?php } ?>
                                                </optgroup>
                                          <?php }?>
                                        </select>
                                        </div>
                                        
                                        <?php if($offers_store[1]['ihotelier_type']==1){ ?>
                                            <input type="hidden" name="RatePlanID" id="RatePlanID2" value="">
                                        <?php } else{?>
                                            <input type="hidden" name="packageId" id="packageId2" value="">
                                        <?php } ?>

                                        <input type="hidden" name="adults" id="adults" value="2">
                                        <input type="hidden" name="children" id="children" value="0">
                                        <input type="hidden" name="children2" id="children2" value="0">
                                        <input type="hidden" id="datein" name="datein" value="<?php echo $dateInDefault; ?>">
                                        <input type="hidden" id="dateout" name="dateout" value="<?php echo $dateOutDefault; ?>">
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <button type="submit" class="btn book pull-right">BOOK NOW !</button>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                    <div class="marcoInferior-c marginb50 hotelDiningTitulo">
                                        <strong><?php echo $offers_store[1]['headline'] ?></strong>
                                        <div class="dining_description">
                                            <p><?php echo $offers_store[1]['facebook_description'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!--Oferta 3-->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <img class="img-responsive marco-c" src="https://royalreservations.com/img/medium/<?php echo $offers_store[2]['identifier'] ?>-en.jpg" alt="#">
                                    <form onsubmit="searchIhotelierRatePlan3()" id="tres" class="booking-offers" action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control" id="hotelid" name="hotelid" onchange="searchIhotelierRatePlan3()">
                                          <?php if(isset($vector3_mx)){ ?>
                                                <optgroup label="Mexican Caribbean">
                                                   <?php for($j=0;$j<count($vector3_mx);$j++){?>
                                                            <option id="<?php echo $vector3_mx[$j]['ihotelier_rate_id'] ?>" value="<?php echo $vector3_mx[$j]['ihotelier_id'] ?>" data-subtext="<?php echo $vector3_mx[$j]['area'] ?>"><?php echo $vector3_mx[$j]['name'] ?></option>
                                                   <?php } ?>
                                                </optgroup>
                                          <?php }?>
                                          <?php if(isset($vector3_ca)){ ?>
                                                <optgroup label="Caribbean Islands">
                                                    <?php for($j=0;$j<count($vector3_ca);$j++){?>
                                                            <option id="<?php echo $vector3_ca[$j]['ihotelier_rate_id'] ?>" value="<?php echo $vector3_ca[$j]['ihotelier_id'] ?>" data-subtext="<?php echo $vector3_ca[$j]['area'] ?>"><?php echo $vector3_ca[$j]['name'] ?></option>
                                                   <?php } ?>
                                                </optgroup>
                                          <?php }?>
                                        </select>
                                        </div>

                                        <?php if($offers_store[2]['ihotelier_type']==1){ ?>
                                            <input type="hidden" name="RatePlanID" id="RatePlanID3" value="">
                                        <?php } else{?>
                                            <input type="hidden" name="packageId" id="packageId3" value="">
                                        <?php } ?>

                                        <input type="hidden" name="adults" id="adults" value="2">
                                        <input type="hidden" name="children" id="children" value="0">
                                        <input type="hidden" name="children2" id="children2" value="0">
                                        <input type="hidden" id="datein" name="datein" value="<?php echo $dateInDefault; ?>">
                                        <input type="hidden" id="dateout" name="dateout" value="<?php echo $dateOutDefault; ?>">

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <button type="submit" class="btn book pull-right">BOOK NOW !</button>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                    <div class="marcoInferior-c marginb50 hotelDiningTitulo">
                                        <strong><?php echo $offers_store[2]['headline'] ?></strong>
                                        <div class="dining_description">
                                            <p><?php echo $offers_store[2]['facebook_description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                          
                            <div class="clearfix"></div>
                            
                        </div>
                </section>
        <script src="https://royalreservations.com/js/jquery.js"></script>
        <script src="https://royalreservations.com/js/bootstrap.min.js"></script>
        <script src="https://royalreservations.com/js/jquery.ui.totop.min.js"></script>        
        <script src="https://royalreservations.com/js/bootstrap-select.js"></script>

        <div id="fb-root"></div>
        <script src="//connect.facebook.net/en_US/all.js"></script>
        <script type="text/javascript" charset="utf-8">

        $(document).ready(function () {
            $('#uno #hotelid').selectpicker();
            $('#dos #hotelid').selectpicker();
            $('#tres #hotelid').selectpicker();
        });


        function searchIhotelierRatePlan1(T){ var rate = $("#uno option:selected").attr('id');  $("#RatePlanID1").val(rate); $("#packageId1").val(rate);}
        function searchIhotelierRatePlan2(T){ var rate = $("#dos option:selected").attr('id');  $("#RatePlanID2").val(rate); $("#packageId2").val(rate);}
        function searchIhotelierRatePlan3(T){ var rate = $("#tres option:selected").attr('id'); $("#RatePlanID3").val(rate); $("#packageId3").val(rate);}

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
