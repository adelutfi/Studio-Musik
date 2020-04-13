
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  @include('templates.studio.partials._head')
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
   @yield('navbar')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @yield('sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
          <div class="content-wrapper">
        @yield('content')
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->

    <!-- End: Customizer-->

    <!-- Buynow Button-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('templates.studio.partials._footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
  @include('templates.studio.partials._script')

  </body>
  <!-- END: Body-->
</html>
