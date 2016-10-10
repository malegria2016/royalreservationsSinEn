<?php
	require 'library/Db.class.php';
    require 'library/Conf.class.php';

    $bd=Db::getInstance();

    $sql='SELECT name,identifier,ihotelier_id,area,ihotelier_theme, location FROM resorts';
    $resorts=$bd->ejecutar($sql);
    $resorts2=$bd->ejecutar($sql);

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#00345E">
		<meta name="ROBOTS" content="INDEX, FOLLOW">
		<title>Book Now</title>


		<link rel="stylesheet" type="text/css" href="css/all.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<div class="panel panel-default margin40">
  			<div class="panel-body">

				<h1 class="h1fb">Book Now</h1>
				<p class="txfb">From exclusive and luxury resorts to family friendly hotels, Royal Reservations offers the experience by the Caribbean Sea you are dreaming of at the best price with special rates, promotions and packages.</p>


				<form class="booking" action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="return validateBooking();">  
				  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 bookesp"> 
					<select class="form-control" id="hotelid" name="hotelid" onchange="validateBooking();"> 
						<option selected="" readonly="" value="0">Select Resort</option> 
						<optgroup label="Mexican Caribbean">  
							<?php while ($resorts_vector=$bd->obtener_fila($resorts,0)){ ?>
							  	<?php if($resorts_vector['location']=='Mexican Caribbean'){ ?>
							  	<option value="<?php echo $resorts_vector['ihotelier_id'] ?>" data-subtext="<?php echo $resorts_vector['area'] ?>"><?php echo $resorts_vector['name'] ?></option>
							  	<?php } ?>
							  
							<?php } ?>
						</optgroup> 
						<optgroup label="Caribbean Islands">  
							<?php while ($resorts_vector2=$bd->obtener_fila($resorts2,0)){ ?>
								<?php if($resorts_vector2['location']=='Caribbean Islands'){ ?>
							  		<option value="<?php echo $resorts_vector2['ihotelier_id'] ?>" data-subtext="<?php echo $resorts_vector2['area'] ?>"><?php echo $resorts_vector2['name'] ?></option>
							  	<?php } ?>	
							<?php } ?>
						</optgroup> 
					</select>
				  </div> 
				  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bookesp"> 
				  	<div class="input-group espCalendario"> 
				  		<input type="text" class="form-control calendario" id="datein" name="datein" placeholder="Arrival Date" readonly=""> 
				  	</div> 
				  </div> 
				  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bookesp"> 
				  	<div class="input-group espCalendario"> 
				  		<input type="text" class="form-control calendario" id="dateout" name="dateout" placeholder="Departure Date" readonly=""> 
				  	</div> 
				  </div> 
				  <div class="clearfix"></div>
				  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 bookesp"> 
				  	<select name="adults" class="form-control" id="select-adults"> 
				  		<option selected="" readonly="" value="0">Adults (+18)</option> 
				  		<option value="1">1</option> 
				  		<option value="2">2</option> 
				  		<option value="3">3</option> 
				  		<option value="4">4</option> 
				  		<option value="5">5</option> 
				  	</select> 
				   </div> 
				   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 bookesp"> 
				   	<select name="children" class="form-control" id="select-teens"> 
				   		<option selected="" readonly="" value="0">Teen (13-17)</option> 
				   		<option value="1">1</option> 
				   		<option value="2">2</option> 
				   		<option value="3">3</option> 
				   		<option value="4">4</option> 
				   		<option value="5">5</option> 
				   	</select> 
				   	</div> 
				   	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 bookesp"> 
				   		<select name="children2" class="form-control" id="select-childrens"> 
				   			<option selected="" readonly="" value="0">Children (0-12)</option> 
				   			<option value="1">1</option> 
				   			<option value="2">2</option> 
				   			<option value="3">3</option> 
				   			<option value="4">4</option> 
				   			<option value="5">5</option> 
				   		</select> 
				   	</div> 
				   	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bookesp"> 
				   		<button type="submit" class="btn btn-success form-control col-lg-1 btnTemporal" id="btn-booking">Book</button> 
				   	</div> 
				   	<div class="clear"></div> 
				   	</form> 
				   	<div class="alert alert-danger" role="alert" id="error-booking" style="display:none;text-align:center;margin-bottom:0px;">Please select a Resort!!</div> 
				   	<input type="hidden" name="tag_adult" id="tag_adult" value="Adults (+18)"> 
				   	<input type="hidden" name="tag_adult2" id="tag_adult2" value="Adults (+13)"> 
				   	<input type="hidden" name="tag_teen" id="tag_teen" value="Teen (13-17)"> 
				   	<input type="hidden" name="tag_children" id="tag_children" value="Children (0-12)"> 
				   	<input type="hidden" name="tag_children2" id="tag_children2" value="Children (0-17)">

				   	<img src="https://royalreservations.com/img/big/romance-6.jpg" width="100%"> 


  			
  			</div>
		</div>





		


		<script type="text/javascript" src="js/all.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>

