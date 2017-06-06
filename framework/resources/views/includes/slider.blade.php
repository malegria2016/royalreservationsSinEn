<section>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner txtBanner" role="listbox">
			<div class="item active">
				<img src="{{ asset($img1) }}" alt="{{ $alt1 }}">
				<div class="carousel-caption"><p class="linksSlider">{!! $caption1  !!}</p></div>
			</div>
			<div class="item ">
				<img src="{{ asset($img2) }}" alt="{{ $alt2 }}">
				<div class="carousel-caption"><p class="linksSlider">{!! $caption2 !!}</p></div>
			</div>
			<div class="item">
				<img src="{{ asset($img3) }}" alt="{{ $alt3 }}">
				<div class="carousel-caption"><p class="linksSlider">{!! $caption3 !!}</p></div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>