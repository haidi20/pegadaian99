<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <br><br><br>
        {{-- <div class="pcoded-navigatio-lavel">Navigation</div> --}}
        <ul class="pcoded-item pcoded-left-item">
            @foreach($menuHeader as $index => $item)
                <li class="{{$item['class']}} {{active_header($item['title'], $menu)}}">
                    <a href="{{$item['route'] ? route($item['route']) : 'javascript:void(0)'}}">
                        <span class="pcoded-micon"><i class="{{$item['icon']}}"></i></span>
                        <span class="pcoded-mtext">{{$item['name']}}</span>
                    </a>
                    @if($item['child'])
                       @foreach($item['child'] as $index => $child)
                            <ul class="pcoded-submenu">
                                <li class="{{active_header($child['url'])}}">
                                    <a href="{{$child['route'] ? route($child['route']) : 'javascript:void(0)'}}">
                                        <span class="pcoded-mtext">{{$child['name']}}</span>
                                    </a>
                                </li>
                            </ul>
                       @endforeach
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="index.html">
                {{-- <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo" /> --}}
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                {{-- <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li> --}}
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        {{-- <h6>Cabang {{$infoCabang->nomorCabang}} | Kas Saldo : Rp. <b>{{$infoCabang->total_kas}}</b> | Admin : Rp. 0</h6> --}}
                    </div>
                </li>
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-bell"></i>
                            <span class="badge bg-c-pink">0</span>
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <h6>Notifikasi</h6>
                                {{-- <label class="label label-danger">New</label> --}}
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-body">
                                        <p>Belum Ada</p>
                                    </div>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="https://vignette.wikia.nocookie.net/naruto/images/7/7b/Kurama2.png/revision/latest?cb=20140818171718" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">John Doe</h5>
                                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            {{-- <img src="../files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image"> --}}
                            <span>{{auth::user()->username}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{route('setting.pilih-cabang')}}">
                                    <i class="zmdi zmdi-label-alt-outline"></i> Pilih Cabang
                                </a>
                            </li>
                            <li>
                                <a href="{{route('setting.index')}}">
                                    <i class="feather icon-settings"></i> Pengaturan
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.index')}}">
                                    <i class="feather icon-user"></i> Pengguna
                                </a>
                            </li>
                            <li>
                                <a href="{{route('setting.login')}}">
                                    <i class="icofont icofont-warning"></i> Data Login
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