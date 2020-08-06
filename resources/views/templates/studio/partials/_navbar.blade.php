<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
          </ul>
        </div>
        <ul class="nav navbar-nav float-right">
          <li>
            @if(!Auth::user()->verifikasi_email)
            <div id="error-email"></div>
            @endif
            @if(!Auth::user()->no_rek)
            <div id="error-profile"></div>
            @endif
          </li>

          <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name text-bold-600">{{Auth::user()->nama}}</span>
                  <span class="user-status">{{Auth::user()->email}}</span>
                </div>
                <span>
                  @if(Auth::user()->foto)
                  <img class="round" src="{{asset('public/'.Auth::user()->foto)}}" alt="avatar" height="40" width="40">
                  @else
                  <img class="round" src="{{ asset('public/gambar/foto.png')}}" alt="avatar" height="40" width="40">
                  @endif
                </span>
              </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{route('pemilik.profil')}}"><i class="feather icon-user"></i>Profil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('pemilik.logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-admin-form').submit();">
                <i class="feather icon-power"></i>
                 Logout
               </a>
                  <form id="logout-admin-form" action="{{ route('pemilik.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
