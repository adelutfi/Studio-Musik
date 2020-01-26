
<!DOCTYPE html>
<html lang="en">

@include('templates.landing.partials._head')

<body>
    @include('templates.landing.partials._nav')

 
@yield('content')


    <!-- footer area start -->
@include('templates.landing.partials._footer')
       
    <!-- footer area end -->

    <!-- back to top start -->
    <div class="back-to-top">
        <!-- back to top start -->
        <i class="fas fa-rocket"></i>
    </div>
    <!-- back to top end -->

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- preloader area end -->

@include('templates.landing.partials._scripts')


</body>

</html>
