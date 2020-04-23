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
          <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header m-0 p-2">
                  <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                </div>
              </li>
              <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                    <div class="media-body">
                      <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                    </div><small>
                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                  </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                    <div class="media-body">
                      <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                    </div><small>
                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                  </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                    <div class="media-body">
                      <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                    </div><small>
                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                  </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                    <div class="media-body">
                      <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                    </div><small>
                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                  </div></a><a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                    <div class="media-body">
                      <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                    </div><small>
                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                  </div></a></li>
              <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name text-bold-600">{{Auth::user()->nama}}</span>
                  <span class="user-status">{{Auth::user()->email}}</span>
                </div><span><img class="round" src="{{ asset('public/assets/studio/images/boy.png')}}" alt="avatar" height="40" width="40"></span></a>
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
