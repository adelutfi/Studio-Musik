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
                        <a class="nav-link" href="{{url('/')}}">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(Request::is('semua-studio')) active @endif">
                        <a class="nav-link" href="{{url('semua-studio')}}">Studio</a>
                    </li>
                     <li class="nav-item @if(Request::is('kontak')) active @endif">
                        <a class="nav-link" href="contact.html">Kontak</a>
                    </li>

                    <li class="nav-item @if(Request::is('penyewaan')) active @endif">
                       <a class="nav-link" href="{{url('/penyewaan')}}">Penyewaan</a>
                   </li>

                    
                    @auth('penyewa')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{Auth::user()->nama}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('profil')}}">Profil</a>
                            <a class="dropdown-item" href="{{route('penyewa.logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-penyewa-form').submit();">Keluar</a>
                            <form id="logout-penyewa-form" action="{{ route('penyewa.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                        </div>
                    </li>
                    @else
                     <li class="nav-item @if(Request::is('login')) active @endif">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item @if(Request::is('register')) active @endif">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
