<?php $user = Auth::user(); ?>
<div id="sidebar" class="sidebar responsive sidebar-fixed sidebar-scroll">
	<script type="text/javascript">
		// try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>

	<!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<li class="{{ $page_active == 'dashboard' ? 'active' : '' }}">
			<a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'dashboard' ))}}">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> {{ __('main.dashboard') }} </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li class="{{
					$page_active == 'users' ? 'active' : ''|| 
					$page_active == 'roles' ? 'active' : '' ?  'active' : ''
				}}">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-cogs"></i>
				<span class="menu-text"> {{ __('main.setting') }} </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>

			<ul class="submenu">

				@permission('users-list')
				<li class="hover {{ $page_active == 'users' ? 'active' : '' }}">
					<a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'dashboard/users' ))}}">
						<i class="menu-icon fa fa-caret-right"></i>
						{{ __('main.user_list') }}
					</a>
					<b class="arrow"></b>
				</li>
				@endpermission
				

				@permission('role-list')
				<li class="hover {{ $page_active == 'roles' ? 'active' : '' }}">
					<a href="{{ route('roles.index') }}">
						<i class="menu-icon fa fa-caret-right"></i>
						{{ __('main.user_role') }}
					</a>
					<b class="arrow"></b>
				</li>
				@endpermission

			</ul>
		</li>

		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
               <i class="menu-icon glyphicon glyphicon-off"></i>
				<span class="menu-text"> Logout </span>
             </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
			<b class="arrow"></b>
		</li>

	</ul>
	<!-- /.nav-list -->

	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<!-- /section:basics/sidebar.layout.minimize -->
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
		try{ace.settings.check('sidebar2' , 'collapsed')}catch(e){}
	</script>
</div>
