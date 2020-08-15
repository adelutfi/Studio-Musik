<script src="{{ asset('public/assets/studio/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->

<script src="{{ asset('public/assets/studio/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/vendors/js/forms/select/select2.full.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('public/assets/studio/js/core/app-menu.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/js/core/app.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/js/scripts/components.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/js/scripts/customizer.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/js/scripts/footer.min.js')}}"></script>
<!-- END: Theme JS-->
<script src="{{ asset('public/assets/studio/js/scripts/navs/navs.min.js')}}"></script>
<!-- BEGIN: Page JS-->
@yield('script')
<script src="{{ asset('public/assets/studio/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/js/scripts/datatables/datatable.min.js')}}"></script>
<script src="{{ asset('public/assets/studio/js/toast-validasi.js')}}"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script>
const user = '{{Auth::user()->id}}'
if (!window.Notification) {
  console.log('Browser does not support notifications.');
} else {
    // check if permission is already granted
    if (Notification.permission === 'granted') {

    } else {
        // request permission from user
        Notification.requestPermission().then(function(p) {
           if(p === 'granted') {
               // show notification here
           } else {
               console.log('User blocked notifications.');
           }
        }).catch(function(err) {
            console.error(err);
        });
    }
}
</script>
<!-- END: Page JS-->
