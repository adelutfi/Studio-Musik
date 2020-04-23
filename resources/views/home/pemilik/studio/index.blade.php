@extends('templates.studio.default')

@section('navbar')
    @include('templates.studio.partials._navbar')
@endsection

@section('sidebar')
    @include('templates.studio.partials._sidebar')
@endsection

@section('content')
<div class="content-header row">
  <div class="content-header-left col-md-12 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-6">
        <h2 class="content-header-title float-left mb-0">Data Studio</h2>
      </div>
      <div class="col-6">
        <button type="button" onclick="check({{Auth::user()->verifikasi_email != null ? "true" : "false" }} , {{ Auth::user()->no_rek != null ? "true" : "false" }})" name="button" class="float-right btn btn-info"><i class="feather icon-plus"></i> Tambah</button>
      </div>
    </div>
  </div>
</div>
<section id="basic-examples">
  <div class="row match-height">
    <div class="col-xl-4 col-md-6 col-sm-6">
     <div class="card">
       <div class="card-content">
         <div class="card-body">
           <img class="card-img img-fluid mb-1" src="{{asset('public/images/studio/studio-7.jpeg')}}"
             alt="Card image cap">
           <h5 class="mt-1">Vuexy Admin</h5>
           <p class="card-text">By Pixinvent Creative Studio</p>
           <hr class="my-1">
           <div class="d-flex justify-content-between mt-2">
             <div class="float-left">
               <p class="font-medium-2 mb-0">$ 4785.78</p>
               <p class="">Income</p>
             </div>
             <div class="float-right">
               <p class="font-medium-2 mb-0">12 June 2019</p>
               <p class="">Delivery Date</p>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
  </div>
</section>

<script>

  function check(email,profil){
    console.log(email,profil);
    if(!profil){
      Swal.fire({
           title: "Gagal!",
           text: "Silahkan Lengkapi Profil Anda!",
           type: "error",
           confirmButtonClass: "btn btn-primary",
           buttonsStyling: !1
       })
    }

    if(!email){
      Swal.fire({
        title: "Gagal!",
        text: "Silahkan Verifikasi Email Anda!",
        type: "error",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: !1
      })
    }

    else {
      window.location = 'studio/tambah-studio'
    }


  }
</script>

@endsection
