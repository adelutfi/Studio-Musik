
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Admin Login | Studio Musik</title>
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
              @if(Session::has('success'))
              <div class="col-xl-7 col-7 justify-content-center">
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                 <p class="mb-0">
                   <strong>Sukses!</strong> Registrasi berhasil
                   <p>Silahkan cek email anda</p>
                 </p>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
                </div>
              @endif

              @if(Session::has('failed'))
              <div class="col-xl-7 col-7 justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                 <p class="mb-0">
                   <strong>Login Gagal!</strong> Silahkan cek email & password anda
                 </p>
                  </div>
                </div>
              @endif

            <div class="col-xl-8 col-11 d-flex justify-content-center">
              <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                  <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                  <img src="{{ asset('public/assets/studio/images/register.jpg')}}" alt="branding logo">

                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Pemilik Login</h4>
                            </div>
                        </div>
                        <div class="card-content mb-3">
                            <div class="card-body pt-1">
                                <form action="#" method="post">
                                  @csrf
                                    <fieldset class="form-label-group form-group">
                                        <input type="email" class="form-control form-control-lg" name="email" id="email" value="{{old('email')}}" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </fieldset>

                                    <fieldset class="form-label-group form-group">
                                        <input type="password" class="form-control form-control-lg" name="password" id="user-password" placeholder="Password" required>

                                        <label for="user-password">Password</label>
                                    </fieldset>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <div class="text-right">
                                          <a href="{{route('pemilik.lupa-password')}}" class="card-link">Lupa Password?</a></div>
                                    </div>
                                    <a href="{{route('pemilik.show.register')}}" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">

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
