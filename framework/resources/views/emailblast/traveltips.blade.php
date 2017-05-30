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
		h3 {text-align: center;text-transform: none !important;}
		h3 span {color: #0074d8}
		.antesdefooter {background: #f9f9f9;border-top: 1px solid #e1e1e1;}
		li {font-size: .95em;}
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
		<h1><span>Great vacations</span> <span>depend on careful preparation</span></h1>
		<h3>Follow our <span>three top tips</span> to make the most of your Caribbean vacation this year!</h3>
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('img/emailblast/tmb-1.gif') }}" alt="Tip#1-Get-The-best-deal-on-your-hotel">
		</div>
		<div class="col-md-8 recuadro">
			<h2 class="text-center"><span>Tip #</span> <span>1</span> Grab the best offers with exclusive benefits</h2>
			<ul>
				<li><strong>Go right to the source</strong>. Contact the hotel directly and you&rsquo;ll get <strong>exclusive access</strong> to deal guarantees, resort credits, and special packages that are <em>only</em> available through their website or reservation center.</li>
				<li><strong>Cut out the middleman, cut out the worry</strong>. No intermediaries means <strong>no nasty surprises</strong> when you arrive.</li>
				<li><strong>Always the best rooms</strong>. Forget cramped rooms that look out onto a wall. We make sure you always get the most <strong>exclusive suites</strong> available, with the most <strong>stunning views</strong>.</li>
			</ul>
		</div>
	</div>
	<div class="corte"></div><br>
	<div class="col-md-12">
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('img/emailblast/tmb-2.gif') }}" alt="Tip#2-Consider-all-your-transportation-needs">
		</div>
		<div class="col-md-8">
			<h2 class="text-center"><span>Tip #</span> <span>2</span> Pre-book transport to save time and money</h2>
			<ul>
				<li><strong>Choose airport transfers carefully</strong>. You may have more options than you think so check with hotel for the <strong>best deals with transportation.</strong></li>
				<li><strong>Pre-book vehicle rental</strong>. If you know you&rsquo;ll need to drive to different attractions once you reach your destination, <strong>book in advance</strong> so you can pick up your rental at the airport and hit the road right away.</li>
				<li><strong>Check your hotel deal</strong>. If you&rsquo;re staying <strong>all-inclusive</strong>, you may not leave your hotel at all during your stay. So you probably won&rsquo;t need a rental car, just airport transfers.</li>
			</ul>
		</div>
	</div>
	<div class="corte"></div><br>
	<div class="col-md-12">
		<div class="col-md-4">
			<img class="img-responsive" src="{{ asset('img/emailblast/tmb-3.gif') }}" alt="Tip#3-Planning-your-activities">
		</div>
		<div class="col-md-8 recuadro">
			<h2 class="text-center"><span>Tip #</span> <span>3</span> Pre-book adventure specials for a fun-filled vacation</h2>
			<ul>
				<li>Book exciting <strong>adventure specials</strong> ahead of time and you can <strong>save up to 20%.</strong></li>
				<li>Check out our fantastic <strong>hotel + activity bundles</strong> to pack your vacation with action and save even more.</li>
				<li><strong>Note down your day-by-day schedule</strong> on your phone, tablet or paper diary to make sure you don&rsquo;t miss the fun.</li>
			</ul>
		</div>
	</div>	
	<div class="corte"></div><br>
</div>
<div class="antesdefooter">
	<div class="container text-center">
		<h2 class="headerfooter">Ready to travel smarter?</h2>
		<p class="textfooter">To start using these tips and save on your Caribbean vacation, <br>head over to the official <a href="https://royalreservations.com">RoyalReservations.com</a> website right now.</p>
	</div>
</div>
	


@stop