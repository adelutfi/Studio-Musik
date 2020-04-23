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
    </ul>
  </div>
</div>
