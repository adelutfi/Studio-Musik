    <!-- jquery -->
    <script src="{{asset('public/assets/landing/js/jquery.js')}}"></script>
    <!-- popper -->
    <script src="{{asset('public/assets/landing/js/popper.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('public/assets/landing/js/bootstrap.min.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('public/assets/landing/js/owl.carousel.min.js')}}"></script>
    <!-- owl thumb -->
    <script src="{{asset('public/assets/landing/js/owl.carousel2.thumbs.js')}}"></script>
    <!-- wow js-->
    <script src="{{asset('public/assets/landing/js/wow.min.js')}}"></script>
    <!-- jquery image loded js-->
    <script src="{{asset('public/assets/landing/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- jquery isotope js-->
    <script src="{{asset('public/assets/landing/js/isotope.pkgd.min.js')}}"></script>
    <!-- way point -->
    <script src="{{asset('public/assets/landing/js/waypoints.min.js')}}"></script>
    <!-- Veno Box -->
    <script src="{{asset('public/assets/landing/js/venobox.min.js')}}"></script>
    <!-- Time Counter -->
    <script src="{{asset('public/assets/landing/js/timer.js')}}"></script>
    <!-- main -->
    <script src="{{asset('public/assets/landing/js/main.js')}}"></script>

    @auth('penyewa')
    <script>
      const notify = document.querySelector('#notify');
      console.log(notify);
    </script>
    @endauth

    @yield('script')
