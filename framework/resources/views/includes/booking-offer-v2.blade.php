<h1>Book with us</h1>
<section>
	<form class='booking' action="https://reservations.travelclick.com/bookings.jsp" method="GET" target="_blank" onsubmit="">
		@if(isset($rate_access_code))
			<input type="hidden" name="identifier" value="{{$rate_access_code}}">
		@endif
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 bookesp marginb15">
			<select class="form-control" id="hotelid" name="hotelid">
				<option selected readonly value="0">@lang('messages.select_resort')</option>
				@foreach($offers_resorts as $resort_route)
					<option value="{{$resort_route->ihotelier_id}}">{{$resort_route->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bookesp marginb15b">
			<div class="input-group espCalendario">
				<input type="text" class="form-control calendario" id="datein" name="datein" placeholder="@lang('messages.arrival')"  readonly>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bookesp marginb15b">
			<div class="input-group espCalendario">
				<input type="text" class="form-control calendario" id="dateout" name="dateout" placeholder="@lang('messages.departure')"  readonly>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bookesp2 marginb15b">
			<select name="adults" class="form-control" id="select-adults">
				<option selected readonly value="0">@lang('messages.adults')</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bookesp2a marginb15b">
			<select name="children" class="form-control" id="select-teens">
				<option selected readonly value="0">@lang('messages.teen')</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bookesp3 marginb15b" >
			<select name="children2" class="form-control" id="select-childrens">
				<option selected readonly value="0">@lang('messages.children')</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-12 col-xs-12 bookesp">
			<!-- MODIFICADO HASTA TENER COMPLETO EL PROCESO CON EL BOOKING PRINCIPAL DEL MENU
			<button type="submit" class="btn btn-success form-control col-lg-1">Book</button>menuBook
			-->
			<button type="submit" class="btn btn-success form-control col-lg-1 btnTemporal btn-oferta" id="btn-booking">@lang('messages.get_offer')</button>
		</div>
		<div class="clear"></div>
	</form>
	<input type="hidden" name="tag_adult" id="tag_adult" value="@lang('messages.adults')">
	<input type="hidden" name="tag_adult2" id="tag_adult2" value="@lang('messages.adults2')">
	<input type="hidden" name="tag_teen" id="tag_teen" value="@lang('messages.teen')">
	<input type="hidden" name="tag_children" id="tag_children" value="@lang('messages.children')">
	<input type="hidden" name="tag_children2" id="tag_children2" value="@lang('messages.children2')">
</section>
