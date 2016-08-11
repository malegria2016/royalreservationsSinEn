<section>
	<form class='booking' action="https://bookings.ihotelier.com/bookings.jsp" method="GET" target="_blank" onsubmit="return validateBooking(); _gaq.push(['_link', 'https://bookings.ihotelier.com/bookings.jsp']);">
		@if(isset($rate_access_code))
			<input type="hidden" name="identifier" value="{{$rate_access_code}}">
		@endif
		<div class="col-lg-3 col-md-2 col-sm-12 col-xs-12 bookesp">
			<select class="form-control" id="hotelid" name="hotelid">
				<option selected readonly value="0">@lang('messages.select_resort')</option>
				<optgroup label="@lang('messages.mexico')">
					@foreach($resorts_routes_mex as $resort_route)
						<option value="{{$resort_route->ihotelier_id}}">{{$resort_route->name}}</option>
					@endforeach
				</optgroup>
				<optgroup label="@lang('messages.caribbean')">
					@foreach($resorts_routes_car as $resort_route)
						<option value="{{$resort_route->ihotelier_id}}">{{$resort_route->name}}</option>
					@endforeach
				</optgroup>
			</select>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 bookesp">
			<div class="input-group espCalendario">
				<input type="text" class="form-control calendario" id="datein" name="datein" placeholder="@lang('messages.arrival')"  readonly>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 bookesp">
			<div class="input-group espCalendario">
				<input type="text" class="form-control calendario" id="dateout" name="dateout" placeholder="@lang('messages.departure')"  readonly>
			</div>
		</div>
		<!-- TEMPORALMENTE SUSPENDIDO HASTA TENER LA PROGRAMACION DE LOS ROOMS COMPLETADA
		<div class="col-lg-1 col-md-2 col-sm-6 col-xs-12">
			<select class="form-control">
				<option selected disabled>Rooms</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>+10</option>
			</select>
		</div>
		-->
		<div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp2">
			<select name="adults" class="form-control" id="select-adults">
				<option selected readonly value="0">@lang('messages.adults')</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp2a">
			<select name="children" class="form-control" id="select-teens">
				<option selected readonly value="0">@lang('messages.teen')</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp3" >
			<select name="children2" class="form-control" id="select-childrens">
				<option selected readonly value="0">@lang('messages.children')</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-lg-2 col-md-1 col-sm-12 col-xs-12 bookesp">
			<!-- MODIFICADO HASTA TENER COMPLETO EL PROCESO CON EL BOOKING PRINCIPAL DEL MENU
			<button type="submit" class="btn btn-success form-control col-lg-1">Book</button>menuBook
			-->
			<button type="submit" class="btn btn-success form-control col-lg-1 btnTemporal" id="btn-booking">@lang('messages.book')</button>
		</div>
		<div class="clear"></div>
	</form>
	<div class="alert alert-danger" role="alert" id="error-booking" style="display:none;text-align:center;margin-bottom:0px;">@lang('messages.please_select')</div>
	<input type="hidden" name="tag_adult" id="tag_adult" value="@lang('messages.adults')">
	<input type="hidden" name="tag_adult2" id="tag_adult2" value="@lang('messages.adults2')">
	<input type="hidden" name="tag_teen" id="tag_teen" value="@lang('messages.teen')">
	<input type="hidden" name="tag_children" id="tag_children" value="@lang('messages.children')">
	<input type="hidden" name="tag_children2" id="tag_children2" value="@lang('messages.children2')">
</section>
