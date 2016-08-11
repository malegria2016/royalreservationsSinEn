<section>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner txtBanner" role="listbox">
			<div class="item active">
				<a href="{{url(App::getLocale().'/'.Lang::get('routes.offers').'/'.$offers[0]->identifier)}}">
					<img src=" {{ asset($img1) }} " alt="{{ $alt1 }}">
				</a>
			</div>
		</div>
	</div>
</section>

