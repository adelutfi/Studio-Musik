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
            <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i>
            <span class="badge badge-pill badge-primary badge-up">0</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header m-0 p-2">
                  <span class="notification-title">Notifikasi</span>
                </div>
              </li>
              <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                <div class="media d-flex align-items-start">
                  <div class="media-body">
                    <p>Belum ada notifikasi</p>
                </div>
              </div> -->
                <!-- <a href="#">
                  <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                    <div class="media-body">
                      <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                    </div><small>
                      <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                  </div>
                </a> -->
                <!-- </li> -->
              <!-- <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Lihat Semua Notifikasi</a></li> -->
            <!-- </ul> -->
          <!-- </li> -->
          <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name text-bold-600">{{Auth::user()->nama}}</span>
                  <span class="user-status">Admin</span>
                </div><span>
                  <img class="round" src="{{ asset('public/gambar/foto.png')}}" alt="avatar" height="40" width="40">
                </span></a>
                <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{route('admin.logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-admin-form').submit();">
                <i class="feather icon-power"></i>
                 Logout
               </a>
                  <form id="logout-admin-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<script type="text/javascript">

</script>
