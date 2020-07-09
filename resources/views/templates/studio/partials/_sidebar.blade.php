<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto"><a class="navbar-brand" href="">
          <div class="brand-logo">
            <img src="{{asset('public/assets/image10.png')}}" alt="">
          </div>
          <h2 class="brand-text mb-0">Studio</h2></a></li>
      <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon">
        </i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header"><span>Menu</span></li>
      <li class="@if(Request::is('pemilik/beranda')) active @endif nav-item">
        <a href="{{route('pemilik.beranda')}}">
          <i class="feather icon-airplay"></i>
          <span class="menu-title" data-i18n="Beranda">Beranda</span>
        </a>
      </li>
      <li class="@if(Request::is('pemilik/studio') || Request::is('pemilik/studio/*') ) active @endif nav-item">
        <a href="{{route('pemilik.studio')}}">
          <i class="feather icon-home"></i>
          <span class="menu-title">Studio</span>
        </a>
      </li>
      <li class=" nav-item"><a href="#"><i class="feather icon-file-text"></i><span class="menu-title" data-i18n="Icons">Penyewaan</span></a>
          <ul class="menu-content">
            <li class="@if(Request::is('pemilik/penyewaan/sewa-tempat') || Request::is('pemilik/penyewaan/sewa-tempat/*') ) active @endif">
              <a href="{{route('pemilik.sewa-tempat')}}">
              <i class="feather icon-music"></i>
              <span class="menu-item" data-i18n="Feather">Sewa Tempat</span>
              </a>
            </li>
            <li class="@if(Request::is('pemilik/penyewaan/sewa-alat') || Request::is('pemilik/penyewaan/sewa-alat/*') ) active @endif">
              <a href="{{route('pemilik.sewa-alat')}}">
                <i class="feather icon-truck"></i>
                <span class="menu-item" data-i18n="Font Awesome">Sewa Alat</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#">
            <i class="feather icon-book"></i>
            <span class="menu-title">Pemesanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#">
            <i class="feather icon-clock"></i>
            <span class="menu-title">Riwayat</span>
          </a>
        </li>
    </ul>
  </div>
</div>
