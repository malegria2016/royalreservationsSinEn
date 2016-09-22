		<footer>
			{{--*/  $prefix='' /*--}}
			@if (App::getLocale() == 'en')
				{{--*/ $prefix=''/*--}}
			@elseif (App::getLocale() == 'es')
				{{--*/ $prefix='es/'/*--}}
			@endif
			<!--Area de Política de uso de Cookies-->
			<div id="cookie-law-info-bar" class="cookies-policy"><span>@lang('messages.cookie_tx')<button id="cerrar" class="margin15">@lang('messages.cookie_btn')</button><a href="{{url($prefix.Lang::get('routes.cookies-policy'))}}" target="_new">@lang('messages.cookie_link')</a>.</span>
			</div>



			<div class="footerNewsletter">
				<div class="container">
					<div class="col-md-10 espacioFooter">
						<p>&nbsp;</p>
						<!-- TEMPORALMENTE DE BAJA HASTA COMPLETAR LA PROGRAMACION DE ESTE ESPACIO
						<form>
							<label>Sign up receive updates</label>
							<input type="text" />
							<input type="submit" value="SIGN UP" />
						</form>
						-->
					</div>
					<!-- se suprime los botones de redes sociales en este espacio
					<div class="col-md-2 espacioFooter">
						<a href="https://www.facebook.com/RoyalReservations" target="_blank"><img src=" {{ asset('img/logo/facebook.jpg') }} " alt="Facebook"></a>
						<a href="http://www.twitter.com/royalresorts" target="_blank"><img src=" {{ asset('img/logo/twitter.jpg') }} " alt="Twitter"></a>
						<a href="http://www.youtube.com/RoyalChannelCancun" target="_blank"><img src=" {{ asset('img/logo/youtube.jpg') }} " alt="Youtube"></a>
					</div>-->
				</div>
			</div>
			<div class="container footerMenu">
				<div class="row">
					<div class="col-md-2 footerMensaje">
						<img src=" {{ asset('img/general/logo-royal.png') }} " alt="Royal Reservations" class="img-responsive">
					</div>
					<div class="col-md-4 listados">
						<ul>
							<li class="encabezadoFooter">@lang('messages.resorts')</li>
							<li class="subTitulo">@lang('messages.mexico')</li>
							@foreach($resorts_routes_mex as $resort_route)
									<li>
									<a href="{{ url($prefix.Lang::get('routes.resorts').'/'.$resort_route->identifier)}}">{{$resort_route->name}}</a>
									</li>
								@endforeach
							<br>
							<li class="subTitulo">@lang('messages.caribbean')</li>
							@foreach($resorts_routes_car as $resort_route)
									<li>
									<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort_route->identifier)}}">{{ $resort_route->name}}</a>
									</li>
							@endforeach
						</ul>
					</div>
					<div class="col-md-2 listados">
						<ul>
							<li class="encabezadoFooter">@lang('messages.destinations')</li>
							<li class="subTitulo">@lang('messages.mexico')</li>
							@foreach($destinations_routes_mex as $destination_route)
									<li>
										<a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination_route->identifier)}}">{{$destination_route->name}}</a>
									</li>
								@endforeach
								<br>
							<li class="subTitulo">@lang('messages.caribbean')</li>
							@foreach($destinations_routes_car as $destination_route)
									<li>
									<a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination_route->identifier)}}">{{$destination_route->name}}</a>
									</li>
								@endforeach
						</ul>
					</div>
					<div class="col-md-2 listados">
						<ul>
							<li class="encabezadoFooter">@lang('messages.experiencies')</li>
							@if(App::getLocale()=='en') {{--*/ $experiences=$experiences_routes_en /*--}} @endif
							@if(App::getLocale()=='es') {{--*/ $experiences=$experiences_routes_es /*--}} @endif

							@foreach($experiences as $experience_route)
								@if(count($experience_route->contents) > 0)
								<li>
									<a href="{{url($prefix.Lang::get('routes.experiences').'/'.$experience_route->identifier)}}">{{ $experience_route->contents[0]->name}}</a>
								</li>
								@endif
							@endforeach
						</ul>
					</div>
					<div class="col-md-2 listados">
						<ul>
							<li class="encabezadoFooter">@lang('messages.contact')</li>
							<li><a href="{{url($prefix.Lang::get('routes.contact'))}}">@lang('messages.about_us')</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.contact'))}}">@lang('messages.legal_notice')</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.bestDeal'))}}">@lang('messages.best_deal')</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.whyBook'))}}">@lang('messages.why_book_with_us')</a></li>
							<li><a href="{{url($prefix.Lang::get('routes.hotelPolicies'))}}">@lang('messages.hotel_policies')</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
