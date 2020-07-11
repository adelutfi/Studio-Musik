
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Pemilik Register | Studio Musik</title>
    <link rel="shortcut icon" href="{{asset('public/assets/landing/favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/themes/semi-dark-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/studio/css/style.css')}}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <section class="row flexbox-container">
            @if($errors->all())
            <div class="col-xl-7 col-7 justify-content-center">
              <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" style="margin-bottom: -100px">
               <p class="mb-0">
                 <strong>Gagal!</strong> Registrasi tidak berhasil
               </p>
             </div>
              </div>
               @endif
            <div class="col-xl-8 col-10 d-flex justify-content-center">
              <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                  <img src="{{ asset('public/assets/studio/images/register.jpg')}}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 p-2">
                        <div class="card-header pt-50 pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Register Pemilik</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <form action="{{route('pemilik.register')}}" method="post">
                                  @csrf
                                    <div class="form-label-group from-group">
                                        <input type="text" id="inputName" name="nama" class="form-control form-control-lg{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="Nama" value="{{old('nama')}}" required>
                                        <label for="inputName">Nama</label>
                                        @if ($errors->has('nama'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{old('email')}}" required>
                                        <label for="inputEmail">Email</label>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" name="password" id="inputPassword" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-label-group">
                                        <input id="inputConfPassword" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Konfirmasi Password anda" required>
                                        <label for="inputConfPassword">Konfirmasi Password</label>
                                    </div>

                                    <a href="{{route('pemilik.show.login')}}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>
    </div>

    <script src="{{ asset('public/assets/studio/vendors/js/vendors.min.js')}}"></script>

    <script src="{{ asset('public/assets/studio/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('public/assets/studio/js/core/app.min.js')}}"></script>
    <script src="{{ asset('public/assets/studio/js/scripts/components.min.js')}}"></script>

  </body>
  <!-- END: Body-->
</html>
