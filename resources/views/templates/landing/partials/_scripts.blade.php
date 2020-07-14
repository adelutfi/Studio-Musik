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
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>
    const user = '{{Auth::user()->id}}'
    const userChannel = 'penyewa-notification-'+user;
    const pusher = new Pusher('2c0ef60ac56e76072eee', {
      cluster: 'ap1',
      encrypted: true
    });

    const channel = pusher.subscribe(userChannel);
    const icon = '{{asset('public/assets/landing/favicon.ico')}}';
    const notifyText = document.querySelector('#notify');
    const showNotify = document.querySelector('#show-notify');
    const notifyData = [];

    if (!window.Notification) {
       // alert('Maaf anda tidak akan menerima notifikasi');
    } else {
        // check if permission is already granted
        if (Notification.permission === 'granted') {
          getNotification()
        }
        else {
            Notification.requestPermission().then(function(p) {
               if(p === 'granted') {
                 getNotification()
               } else {
                   // alert('Maaf anda tidak akan menerima notifikasi');
               }
            }).catch(function(err) {
                console.error(err);
            });
        }
    }

    function getNotification(){
      channel.bind('App\\Events\\PenyewaNotification', function(data) {
        let show = ``;
        notifyText.innerText = +notifyText.innerText+1;
        notifyData.push(data.message);
        notifyData.map(m => show += showDataNotification(m));
        show += `<div class="card-footer">
        <h6 class="text-center">Lihat Semua</h6>
        </div>`
        showNotify.innerHTML = show;
        const notify = new Notification('Notifikasi Baru', {
          body: data.message,
          icon: icon,
        });
      });
    }

    function showDataNotification(m){
      return `  <!-- <a href="#"> -->
        <div class="card-header bg-transparent">
          <i class="fa fa-circle" style="color: blue"></i>
          <span class="" style="font-size: 13px">
            ${m}
          </span>
        </div>
        <!-- </a> -->`
    }


    </script>
    @endauth

    @yield('script')
