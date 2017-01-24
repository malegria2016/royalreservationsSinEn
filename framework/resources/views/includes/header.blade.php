<header>
	{{--*/  $prefix='' /*--}}
	@if (App::getLocale() == 'en')
		{{--*/ $prefix=''/*--}}
	@elseif (App::getLocale() == 'es')
		{{--*/ $prefix='es/'/*--}}
	@endif


	<div class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 hidden-xs"></div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="header-right">
						<ul class="list-unstyled list-inline navInfo">
							<li><a href="{{url(App::getLocale()=='en'?'webcams':'es/webcams')}}"><i class="fa fa-video-camera" aria-hidden="true"></i> Webcams</a></li>
							
							<li><a href="#" onclick="window.open('https://webchat.visitroyalresorts.com','','width=450,height=680');return false;" ><i class="fa fa-weixin"></i> Chat</a></li>
							
							<!-- CODIGO SKYPE
							<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script> -->
							<li><a href="{{$phone_skype}}"><i class="fa fa-skype"></i> Skype</a></li>
							<li class="dropdown dropdown-small ">
								<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
									<span class="key"><i class="fa fa-phone"></i></span>
									<span class="value">@lang('messages.call_us')</span><b class="caret"></b>
								</a>
									<ul class="dropdown-menu txtright navInfoSubmenu">
										@if(isset($phones_mex))
										<li class="dropdown-header">@lang('messages.for_mexico')</li>
										@foreach($phones_mex as $key => $value)
											<li><a href="tel:{{$value}}">{{$key}} {{$value}}</a></li>
										@endforeach
										@endif
										@if(isset($phones_car))
										<li class="dropdown-header">@lang('messages.for_caribbean')</li>
										@foreach($phones_car as $key => $value)
											<li><a href="tel:{{$value}}">{{$key}} {{$value}}</a></li>
										@endforeach
										@endif
										@if(isset($phones_customer))
											<li class="dropdown-header">@lang('messages.customer_service')</li>
											@foreach($phones_customer as $key => $value)
												<li><a href="tel:{{$value}}">{{$key}} {{$value}}</a></li>
												@endforeach
										@endif
								</ul>
							</li>
							<li class="dropdown dropdown-small">
								<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="">
									<span class="key"></span>
									@if (App::getLocale() == 'es')
										<span class="value">ESPAÑOL</span>
									@elseif (App::getLocale() == 'en')
										<span class="value">ENGLISH</span>
									@endif
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu navInfoSubmenu">
									@foreach (Config::get('app.locales') as $locale => $language)
										@if ($locale != App::getLocale())
											<li><a href="{{ $locale=='en'? url('/'): url('/es') }}">{{$language}}</a></li>
										@endif
									@endforeach
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Navigation -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{url($prefix)}}"><img src="{{asset('img/logo/royal-reservations-logo.png')}}" alt="Royal Reservations Online"/></a>
				</div>
				<div class="collapse navbar-collapse navGeneralSubmenu" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li id="li-home"><a href="{{url(App::getLocale()=='en'?'/':'es')}}"><span class="glyphicon glyphicon-home"></span></a></li>
						<li id="li-resorts" class="dropdown"><a href="#" class="dropdown-toggle mayusculas" data-toggle="dropdown">Resorts <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
								 <a href="{{url($prefix.Lang::get('routes.resorts'))}}">@lang('messages.all')</a>
								</li>
								<li class="dropdown-header">@lang('messages.mexico')</li>
								@foreach($resorts_routes_mex as $resort_route)
								  <li>
								    <a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort_route->identifier)}}">{{$resort_route->name}}</a>

								  </li>
								@endforeach
								<li class="dropdown-header">@lang('messages.caribbean')</li>
								@foreach($resorts_routes_car as $resort_route)
									<li>
									<a href="{{url($prefix.Lang::get('routes.resorts').'/'.$resort_route->identifier)}}">{{$resort_route->name}}</a>
									</li>
								@endforeach
							</ul>
						</li>
						<li id="li-destinations" class="dropdown">
							<a href="#" class="dropdown-toggle mayusculas" data-toggle="dropdown">@lang('messages.destinations') <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
								  <a href="{{url($prefix.Lang::get('routes.destinations'))}}">@lang('messages.all')</a>
								</li>
								<li class="dropdown-header">@lang('messages.mexico')</li>
								@foreach($destinations_routes_mex as $destination_route)
								  <li>
									<a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination_route->identifier)}}">{{$destination_route->name}}</a>
								  </li>
								@endforeach
								<li class="dropdown-header">@lang('messages.caribbean')</li>
								@foreach($destinations_routes_car as $destination_route)
									<li>
									<a href="{{url($prefix.Lang::get('routes.destinations').'/'.$destination_route->identifier)}}">{{$destination_route->name}}</a>
									</li>
								@endforeach
							</ul>
						</li>
						<li id="li-experiences" class="dropdown">
							<a href="#" class="dropdown-toggle mayusculas" data-toggle="dropdown">@lang('messages.experiencies') <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
								<a href="{{url($prefix.Lang::get('routes.experiences'))}}">@lang('messages.all')</a>
								</li>
								@if(App::getLocale()=='en') {{--*/ $experiences=$experiences_routes_en /*--}} @endif
								@if(App::getLocale()=='es') {{--*/ $experiences=$experiences_routes_es /*--}} @endif
								
								@foreach($experiences as $experience_route)
									@if(count($experience_route->contents) > 0)
									<li>
									<a href="{{url($prefix.Lang::get('routes.experiences').'/'.$experience_route->identifier)}}">{{$experience_route->contents[0]->name}}</a>
									</li>
									@endif
								@endforeach
								
							</ul>
						</li>
						<li id="li-all-inc" class="mayusculas">
						<a href="{{url($prefix.Lang::get('routes.all-inclusive'))}}">@lang('messages.all-inclusive')</a>
						</li>
						<li id="li-offers" class="mayusculas">
						<a href="{{url($prefix.Lang::get('routes.offers'))}}">@lang('messages.offers')</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>