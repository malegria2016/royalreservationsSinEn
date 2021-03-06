{{--*/ $dateInDefault= date("m/d/Y",strtotime("+25 day")); $dateOutDefault=date("m/d/Y",strtotime("+30 day")); /*--}}
<div id="booking">
<section>
	<form class='booking' action="https://reservations.travelclick.com/bookings.jsp" method="GET" target="_blank" onsubmit="return validateBooking();">
		@if(isset($rate_access_code))
			<input type="hidden" name="identifier" value="{{$rate_access_code}}">
		@endif
		<div class="col-lg-3 col-md-2 col-sm-12 col-xs-12 bookesp">
			<span class="lbForm">@lang('messages.select_resort')</span>
			<select class="form-control" id="hotelid" name="hotelid" onchange="validateBooking();">
				<option value="0" selected="">@lang('messages.select_resort')</option>
				<optgroup label="@lang('messages.all-inclusive')">
				@foreach($resorts_routes_mex as $resort_route)
					@if($resort_route->ihotelier_id != 86175 && $resort_route->ihotelier_id != 86182)
						<option value="{{$resort_route->ihotelier_id}}" data-subtext="{{$resort_route->area}}">{{$resort_route->name}}</option>
					@endif
				@endforeach
				</optgroup>
			</select>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 bookesp">
			<span class="lbForm">@lang('messages.arrival')</span>
			<div class="input-group espCalendario">
				<input type="text" class="form-control calendario" id="datein" name="datein" placeholder="@lang('messages.arrival')"  readonly>
			</div>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 bookesp">
			<span class="lbForm">@lang('messages.departure')</span>
			<div class="input-group espCalendario">
				<input type="text" class="form-control calendario" id="dateout" name="dateout" placeholder="@lang('messages.departure')"  readonly>
			</div>
		</div>
		<div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp2">
			<span id="spAdult" class="lbForm">@lang('messages.adults')</span>
			<select name="adults" class="form-control" id="select-adults">
				<option value="1">1</option>
				<option value="2" selected>2</option>
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
		<div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp2a">
			<span id="spTeen" class="lbForm">@lang('messages.teen')</span>
			<select name="children" class="form-control" id="select-teens">
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-lg-1 col-md-2 col-sm-4 col-xs-4 bookesp3" >
			<span id="spChildren" class="lbForm">@lang('messages.children')</span>
			<select name="children2" class="form-control" id="select-childrens">
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>
		<div class="col-lg-2 col-md-1 col-sm-12 col-xs-12 bookesp">
			<span class="lbFormHide">.</span>
			<button type="submit" class="btn btn-success form-control col-lg-1 btnTemporal" id="btn-booking">@lang('messages.book')</button>
		</div>
		<div class="clear"></div>
	</form>
	<div class="alert alert-danger msgError" role="alert" id="error-booking">@lang('messages.please_select')</div>
	<input type="hidden" name="tag_adult" id="tag_adult" value="@lang('messages.adults')">
	<input type="hidden" name="tag_adult2" id="tag_adult2" value="@lang('messages.adults2')">
	<input type="hidden" name="tag_teen" id="tag_teen" value="@lang('messages.teen')">
	<input type="hidden" name="tag_children" id="tag_children" value="@lang('messages.children')">
	<input type="hidden" name="tag_children2" id="tag_children2" value="@lang('messages.children2')">
</section>
</div>
<div id="mantenimiento" class="modal fade" role="dialog"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div> <div class="modal-body" style="padding: 8%;"> 
				<center>
				  <img src=" https://royalreservations.com/img/general/logo-royal-404.png " alt="Royal Reservations">
				</center> 
				<p style="text-align: justify; padding-top:10px;">@lang('messages.maintenance')</p> 
			</div> 
			<div class="modal-footer"> </div> 
		</div> 
	</div> 
</div>