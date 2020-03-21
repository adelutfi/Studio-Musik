
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  @include('templates.studio.partials._head')
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('templates.studio.partials._navbar')
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    @yield('sidebar')
      <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
          @yield('content')
      </div>
    </div>
    <!-- END: Content-->
    <!-- BEGIN: Footer-->
    @include('templates.studio.partials._footer')
    <!-- END: Footer-->
    @include('templates.studio.partials._script')
  </body>
  <!-- END: Body-->
</html>
