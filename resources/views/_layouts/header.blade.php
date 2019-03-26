<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <br><br>
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu active pcoded-trigger">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Cabang</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="{{route('cabang.create')}}">
                            <span class="pcoded-mtext">Tambah Cabang</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="dashboard-crm.html">
                            <span class="pcoded-mtext">Edit Info Cabang</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('cabang.index')}}">
                            <span class="pcoded-mtext">Data Cabang</span>
                            {{-- <span class="pcoded-badge label label-info ">NEW</span> --}}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        {{-- <div class="pcoded-navigatio-lavel"></div> --}}
        <ul class="pcoded-item pcoded-left-item">
            <li class="active pcoded-trigger">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                    <span class="pcoded-mtext">Laporan</span>
                    
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                {{-- <i class="feather icon-menu"></i> --}}
            </a>
            <a href="index.html">
                {{-- <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo" /> --}}
            </a>
            <a class="mobile-options">
                {{-- <i class="feather icon-more-horizontal"></i> --}}
            </a>
        </div>

        <div class="navbar-container container-fluid">
            {{-- <ul class="nav-left">
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul> --}}
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-bell"></i>
                            <span class="badge bg-c-pink">5</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <li>
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="https://vignette.wikia.nocookie.net/naruto/images/7/7b/Kurama2.png/revision/latest?cb=20140818171718" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">John Doe</h5>
                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> --}}
                            <span>Username</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{route('cabang.setting.index')}}">
                                    <i class="feather icon-settings"></i> Pilih Cabang
                                </a>
                            </li>
                            <li>
                                <a href="user-profile.html">
                                    <i class="feather icon-user"></i> Profile
                                </a>
                            </li>
                            {{-- <li>
                                <a href="auth-normal-sign-in.html">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="feather icon-log-out"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>