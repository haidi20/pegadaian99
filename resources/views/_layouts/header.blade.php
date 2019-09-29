<header id="topnav" class="navbar navbar-inverse navbar-fixed-top clearfix" role="banner">

	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
			<span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span>
		</a>
	</span>

	<a class="navbar-brand" href="#">kreasibeton</a>

	<span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="left" title="Toggle Infobar"></a>
	</span>

	<ul class="nav navbar-nav toolbar pull-right" data-auto-collapse="false">

		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-user"></i></span></a>
			<ul class="dropdown-menu userinfo arrow" data-auto-collapse="false">
				{{-- <li class="{{ active_menu('sitemanager/user*') }}">
					<a href="{{ url('sitemanager/user') }}">
						<span class="pull-left">User Account</span> <i class="pull-right fa fa-user"></i>
					</a>
				</li>
				<li class="{{ active_menu('sitemanager/change-password') }}">
					<a href="{{ url('sitemanager/change-password') }}">
						<span class="pull-left">Change Password</span> <i class="pull-right fa fa-lock"></i>
					</a>
				</li>
				<li class="{{ active_menu('sitemanager/setting/contact') }}">
					<a href="{{ url('sitemanager/setting/contact') }}">
						<span class="pull-left">Setting</span> <i class="pull-right fa fa-cog"></i>
					</a>
				</li> --}}
				<!-- <li><a href="#"><span class="pull-left">Settings</span> <i class="pull-right fa fa-cog"></i></a></li> -->
				<li class="divider"></li>
				{{-- <li><a href="{{ url('sitemanager/logout') }}"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li> --}}
				<li><a href="#"><span class="pull-left">Sign Out</span> <i class="pull-right fa fa-sign-out"></i></a></li>
			</ul>
		</li>

	</ul>

</header>