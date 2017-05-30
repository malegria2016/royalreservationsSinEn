<form action="https://reservations.travelclick.com/bookings.jsp" method="GET" accept-charset="UTF-8" target="_blank" onsubmit="return validateBookingSingle();">

	<div class="col-md-12 b004">
		<label>@lang('messages.select_resort')</label>
		<select class="form-control" id="hotelid" name="hotelid">
			@foreach($offers_resorts as $resort_route)
				<option value="{{$resort_route['ihotelier_id']}}" id="{{$resort_route['ihotelier_rate_id']}}" data-subtext="{{$resort_route['area']}}" name="{{$resort_route['minimum']}}">{{$resort_route['name']}}</option>
			@endforeach
		</select>
	</div>

	@if($ihotelier_type==1)<input type="hidden" name="RatePlanID" id="RatePlanID" value="">@endif

	@if($ihotelier_type==2)<input type="hidden" name="packageId" id="packageId" value="">@endif

	@if(isset($rate_access_code))<input type="hidden" name="identifier" value="{{$rate_access_code}}">@endif


	<div class="col-md-6 b004">
		<label>@lang('messages.arrival')</label>
		<div class="input-group espCalendario">
			<input type="text" class="form-control calendario" id="datein" name="datein" readonly="" value="{{ $dateInDefault }}">
		</div>
	</div>
	<div class="col-md-6 b004">
		<label>@lang('messages.departure')</label>
		<div class="input-group espCalendario">
			<input type="text" class="form-control calendario" id="dateout" name="dateout" readonly="" value="{{ $dateOutDefault }}">
		</div>
	</div>

	<div class="col-md-4 b004">
		<label id="spAdult">@lang('messages.adults')</label>
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
	<div class="col-md-4 b004">
		<label id="spTeen">@lang('messages.teen')</label>
		<select name="children" class="form-control" id="select-teens">
			<option value="0" selected>0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</div>
	<div class="col-md-4 b004">
		<label id="spChildren">@lang('messages.children')</label>
		<select name="children2" class="form-control" id="select-childrens">
			<option value="0" selected>0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</div>
	
	<div class="col-md-12 b004">
		<button type="submit" class="btn form-control b001" id="btn-booking">@lang('messages.book_now')</button>
	</div>
	<div class="clearfix"></div>
	<a href="#" class="b003" role="button" data-toggle="modal" data-target="#modifyForm">@lang('messages.modify') <span>/ @lang('messages.cancel')<span></a>
	<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
    <img src="{{asset('img/general/payments.png')}}" class="b005">
</form>

<div class="alert alert-danger msgError" role="alert" id="error-minimum">@lang('messages.error_minimum')</div>
<input type="hidden" name="tag_adult" id="tag_adult" value="@lang('messages.adults')">
<input type="hidden" name="tag_adult2" id="tag_adult2" value="@lang('messages.adults2')">
<input type="hidden" name="tag_teen" id="tag_teen" value="@lang('messages.teen')">
<input type="hidden" name="tag_children" id="tag_children" value="@lang('messages.children')">
<input type="hidden" name="tag_children2" id="tag_children2" value="@lang('messages.children2')">
<input type="hidden" name="minimum" id="minimum" value="0">

<div id="mantenimiento" class="modal fade" role="dialog"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button></div> <div class="modal-body" style="padding: 8%;"> 
				<center>
				  <img src=" https://royalreservations.com/img/general/logo-royal-404.png " alt="Royal Reservations">
				</center> 
				<p class="b006">@lang('messages.maintenance')</p> 
			</div> 
			<div class="modal-footer"> </div> 
		</div> 
	</div> 
</div>

<div class="clear"></div>