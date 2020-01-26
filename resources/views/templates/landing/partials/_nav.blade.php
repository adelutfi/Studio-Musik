    <nav class="navbar navbar-area navbar-expand-lg navbar-light">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="index.html">
                    <img src="assets/img/logo.png" alt="logo image">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Studio</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="contact.html">Kontak</a>
                    </li>
                   
                    @auth('web')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{Auth::guard('web')->user()->nama}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="blog.html">Profil</a>
                            <a class="dropdown-item" href="blog-details.html">Keluar</a>
                        </div>
                    </li>
                    @else
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
