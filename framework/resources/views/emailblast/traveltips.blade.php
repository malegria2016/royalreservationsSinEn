@extends('layouts.default')

@section('title', 'Royal Reservations')

@section('metadescription','')

@section('style')
	<style type="text/css">
		h1 {text-transform: none !important;}
		h1 span:first-child{font-size: 1em}
		h1 span:last-child{font-size: 1em;color: #666 !important;}
		.corte{clear: both;}
		.recuadro{
				background: #f8fcfc;
				border: 3px dotted #77d2f4;
				height: 250px;
				margin: 20px 0;
		}
		h2 {color: #0074d8 !important;margin-top: 20px !important;}
		h2 span:first-child {font-size: .7em;}
		h2 span:last-child {font-size: 1.4em; font-weight: bold;}
		.antesdefooter {background: #f9f9f9;border-top: 1px solid #e1e1e1;}
		footer {margin-top: 0 !important;}
		.headerfooter{margin-top: 50px !important;font-size: 2.25em;font-weight: bold;}
		.textfooter{font-size: 1.3em; font-weight: bold;margin-bottom: 50px;background: #fd8200;color: #fff;padding: 15px;}
		.textfooter a {color: #fff;font-weight: bold;text-decoration:underline;}
		@media only screen and (max-width: 959px) {
			img {padding-bottom: 30px;}
			.recuadro{height: auto;}
			h1 {margin-top: 5px !important;line-height: .5em !important;}
			h1 span:first-child{font-size: .7em}
			h1 span:last-child{font-size: .7em;color: #666 !important;}
		}
		@media only screen and (max-width: 961px) and (min-device-width: 0px) {
			#floatingSocialShare {
			    margin-top: 0px !important;
			}
		}
	</style>
@endsection

@section('container')
<div class="row">
	<img src="{{ asset('img/emailblast/banner.jpg') }}" alt="..." class="img-responsive">
</div>

<div class="container">
	<div class="col-md-12">
		<h1><span>Follow these tips</span> <span>and make the most of your vacations</span></h1>
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('img/emailblast/tmb-1.gif') }}" alt="Tip#1-Get-The-best-deal-on-your-hotel">
		</div>
		<div class="col-md-8 recuadro">
			<h2 class="text-center"><span>Tip #</span> <span>1</span> Get the lowest price with exclusive benefits</h2>
			<ul>
				<li><strong>Get in touch with the hotel directly.</strong> Take advantage of the best deal guarantee policy, resorts credits and discover all the special packages only available through the hotel´s web site or reservation center.</li>
				<li><strong>Have a worry free vacation.</strong> No intermediaries means no awful surprises.</li>
				<li><strong>Book the best room.</strong> Rest assure you will always get the most exclusive suites and stunning views available.</li>
			</ul>
		</div>
	</div>
	<div class="corte"></div><br>
	<div class="col-md-12">
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('img/emailblast/tmb-2.gif') }}" alt="Tip#2-Consider-all-your-transportation-needs">
		</div>
		<div class="col-md-8">
			<h2 class="text-center"><span>Tip #</span> <span>2</span> Make arrangements in advance and relax</h2>
			<ul>
				<li>Look for airport transportation deals.</li>
				<li>Rent a vehicle if you will need to get around a lot once you have reached your destination.</li>
				<li>If you are staying at an <strong>All Inclusive</strong> you may not leave your hotel so you may not need a rental car.</li>
			</ul>
		</div>
	</div>
	<div class="corte"></div><br>
	<div class="col-md-12">
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('img/emailblast/tmb-3.gif') }}" alt="Tip#3-Planning-your-activities">
		</div>
		<div class="col-md-8 recuadro">
			<h2 class="text-center"><span>Tip #</span> <span>3</span> Plan your activities and get the most of your vacations</h2>
			<ul>
				<li><strong>Book adventure specials</strong> ahead of time and <strong>save up to 20%.</strong></li>
				<li>Check out for any <strong>bundle deal of hotel + activities</strong> and save.</li>
				<li>Review your daily schedule and don´t miss the fun.</li>
			</ul>
		</div>
	</div>	
	<div class="corte"></div><br>
</div>
<div class="antesdefooter">
	<div class="container text-center">
		<h2 class="headerfooter">Ready to travel smarter?</h2>
		<p class="textfooter">Travel smart and save with <a href="https://royalreservations.com">Royalreservations.com</a> Royal Resorts's official reservations website.</p>
	</div>
</div>
	


@stop