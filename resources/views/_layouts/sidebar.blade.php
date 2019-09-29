<div class="static-sidebar-wrapper sidebar-inverse">
    <div class="static-sidebar">
        <div class="sidebar">

		    <div class="widget stay-on-collapse" id="widget-welcomebox">
		        <div class="widget-body welcome-box tabular">
		            <div class="tabular-row">
		                <div class="tabular-cell welcome-avatar">
		                    <a href="#"><img src="{{ url('avenger/assets/demo/avatar/administrator.png') }}" class="avatar"></a>
		                </div>
		                <div class="tabular-cell welcome-options">
		                    <span class="welcome-text">Welcome,</span>
		                    {{-- <a href="#" class="name">{{ Auth::user()->name }}</a> --}}
		                </div>
		            </div>
		        </div>
		    </div>
			<div class="widget stay-on-collapse" id="widget-sidebar">
		        <nav role="navigation" class="widget-body">
						<ul class="acc-menu">
								<li class="nav-separator">Explore</li>
								<li class="active">
									<a href="#">
										<i class="fa fa-home" style=""></i>
										<span>Dashboard</span>
									</a>
								</li>
							</ul>
					{{-- <ul class="acc-menu">
						<li class="nav-separator">Explore</li>
						<li class="{{ active_menu('sitemanager') }}">
							<a href="{{ url('sitemanager') }}">@fa('home')<span>Dashboard</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/inbox*') }}">
							<a href="{{ url('sitemanager', ['inbox']) }}">@fa('inbox')<span>Inbox</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/testimonial*') }}">
							<a href="{{ url('sitemanager', ['testimonial']) }}">@fa('comment')<span>Testimonial</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/menu*') }}">
							<a href="{{ url('sitemanager', ['menu']) }}">@fa('tasks')<span>Menu</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/gallery*') }}">
							<a href="{{ url('sitemanager', ['gallery']) }}">@fa('file-picture-o')<span>Gallery</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/post*') }}">
							<a href="{{ url('sitemanager', ['post']) }}">@fa('file-text')<span>Posts</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/page*') }}">
							<a href="{{ url('sitemanager', ['page']) }}">@fa('file-text-o')<span>Pages</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/slider*') }}">
							<a href="{{ url('sitemanager', ['slider']) }}">@fa('sliders')<span>Slider</span></a>
						</li>
						<li class="{{ active_menu('sitemanager/media*') }}">
							<a href="{{ url('sitemanager', ['media']) }}">@fa('comments-o')<span>Social Media</span></a>
						</li>
						<li class="nav-separator"></li>
						<li><a href="{{ url('/') }}" target="_blank">@fa('globe')<span>View Website</span></a></li>
						<li class="nav-separator">&nbsp;</li>
					</ul> --}}
				</nav>
		    </div>
		</div>
	</div>
</div>