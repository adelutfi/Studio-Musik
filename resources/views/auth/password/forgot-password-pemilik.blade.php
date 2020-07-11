<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Pemilik Lupa Password | Studio Musik</title>
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
        <div class="content-body"><section class="row flexbox-container">
    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                  <img src="{{ asset('public/assets/studio/images/forgot-password.png')}}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2 py-1">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0 text-center mb-2">Lupa Password</h4>
                                <p class="text-dark">Silahkan Masukan Email anda</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="index.html">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email">
                                        <label for="inputEmail" class="text-dark">Email</label>
                                    </div>
                                </form>
                                <div class="float-md-left d-block mb-1">
                                   <a href="{{route('pemilik.show.login')}}" class="btn btn-outline-primary btn-block px-75">Kembali</a>
                               </div>
                                <div class="float-md-right d-block mb-1">
                                    <button type="submit" class="btn btn-primary float-right btn-inline">Kirim</button>
                                </div>
                                </div>
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
    <!-- END: Content-->
    <script src="{{ asset('public/assets/studio/vendors/js/vendors.min.js')}}"></script>

    <script src="{{ asset('public/assets/studio/js/core/app-menu.min.js')}}"></script>
    <script src="{{ asset('public/assets/studio/js/core/app.min.js')}}"></script>
    <script src="{{ asset('public/assets/studio/js/scripts/components.min.js')}}"></script>
  </body>
  <!-- END: Body-->
</html>
