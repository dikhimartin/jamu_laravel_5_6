<div id="navbar" class="navbar navbar-default navbar-collapse navbar-fixed-top">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<!--<i class="fa fa-leaf"></i>-->

							<img src="{{ asset('assets/img/admin/logo.png') }}" style="height: 30px;">
							{{ config('app.name', 'Laravel') }}
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->
					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
						<span class="sr-only">Toggle user menu</span>

						<img class="nav-user-photo" src="{{URL::asset('images/profile')}}/{{Auth::user()->image}}" />
					</button>

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">

						<li class="dropdown dropdown-language">
	                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
	                            <img alt="" src="/images/flags_large/{{LaravelLocalization::getCurrentLocale()}}.png" width="22">
	                            <span class="langname"> {{ LaravelLocalization::getCurrentLocaleName() }} </span>
	                            <i class="fa fa-angle-down"></i>
	                        </a>
	                        <ul class="dropdown-menu">
	                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
	                                @if ($localeCode != LaravelLocalization::getCurrentLocale())
	                                @if ($localeCode != 'zh')
	                                <li>
	                                    <a href="/{{ $localeCode }}/dashboard/{{$controller}}">
	                                        <img alt="" src="/images/flags_large/{{$localeCode}}.png?123" width="22"> {{ $properties['name'] }} </a>
	                                </li>
	                                @endif
	                                @endif
	                            @endforeach
	                        </ul>
	                    </li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{URL::asset('images/profile')}}/{{Auth::user()->image}}" />
								<span class="user-info">
									<small>{{ __('main.welcome') }},</small>
									{{ Auth::user()->name }}
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>


							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li class="{{ $page_active == 'profile' ? 'active' : '' }}">
									<a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'dashboard/my_profile' ))}}">
										<i class="ace-icon fa fa-user"></i>
										{{ __('main.profile') }}
									</a>
								</li>

								<!-- <li class="divider"></li> -->

								<!-- <li>
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('main.logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
								</li> -->
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>