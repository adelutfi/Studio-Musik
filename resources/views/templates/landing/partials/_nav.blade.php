    <nav class="navbar navbar-area navbar-expand-lg navbar-light">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="{{url('/')}}">
                    <img src="{{asset('public/studio2.png')}}" alt="logo image">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item @if(Request::is('/')) active @endif">
                        <a class="nav-link" href="{{url('/')}}"><strong>Beranda</strong> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(Request::is('semua-studio') || Request::is('detail/*')) active @endif">
                        <a class="nav-link" href="{{url('semua-studio')}}"> <strong>Studio</strong> </a>
                    </li>
                     <li class="nav-item @if(Request::is('kontak')) active @endif">
                        <a class="nav-link" href="{{route('kontak')}}"><strong>Kontak</strong></a>
                    </li>
                    @auth('penyewa')
                    <li class="nav-item dropdown @if(Request::is('pemesanan') || Request::is('pemesanan/*')) active @endif">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <strong>
                        Status
                      </strong>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{route('pemesanan.tempat')}}"> <i class="fa fa-home"></i> Tempat</a>
                          <a class="dropdown-item" href="{{route('pemesanan.alat')}}"> <i class="fa fa-truck"></i> Alat</a>
                      </div>
                   </li>
                   <!-- <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" onclick="document.querySelector('#notify').innerText = 0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <strong>
                        Notifications
                       </strong>
                       <span class="badge badge-info" id="notify">0</span>
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <div class="card" style="width: 370px">
                            <div id="show-notify" class="">
                              <a href="#">
                               <div class="card-header bg-transparent">
                                 <span class="" style="font-size: 13px">
                                   <p>Belum Ada Notifikasi</p>
                                 </span>
                               </div>
                               </a>
                            </div>
                          </div>
                       </ul>
                   </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong>
                          {{Auth::user()->nama}}
                        </strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profil')}}"> <i class="fa fa-user"></i> Profil</a>
                            <a class="dropdown-item" href="{{route('penyewa.logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-penyewa-form').submit();"> <i class="fa fa-power-off"></i> Keluar</a>
                            <form id="logout-penyewa-form" action="{{ route('penyewa.logout') }}" method="POST" style="display: none;">
                              @csrf
                            </form>
                        </div>
                    </li>
                    @else
                     <li class="nav-item @if(Request::is('login')) active @endif">
                        <a class="nav-link" href="{{route('login')}}"><strong>Login</strong></a>
                    </li>
                    <li class="nav-item @if(Request::is('register')) active @endif">
                        <a class="nav-link" href="{{route('register')}}"><strong>Register</strong></a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
