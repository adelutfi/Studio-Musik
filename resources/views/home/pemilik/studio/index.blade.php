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

    @foreach($studio as $s)
    <div class="col-xl-4 col-md-6 col-sm-6">
     <div class="card shadow-lg">
       <div class="card-content">
         <div class="card-body">
           <img class="card-img img-fluid mb-1" src="{{asset('public/'.$s->gambar)}}"
             alt="Card image cap">
           <h5 class="mt-1">{{$s->nama}}</h5>
           <div class="row">
             <div class="col-md-6">
               <h6>{{$s->alamat}}</h6>
             </div>
             @php($total = ceil($s->ratings->sum('nilai')/count($s->ratings)) )
             <div class="col-md-6 text-warning">
               @for($i = 0; $i < 5; $i++)
                @if($total <= $i)
                <i class="fa fa-star-o fa-lg"></i>
                @else
                <i class="fa fa-star fa-lg"></i>
                @endif
               @endfor
             </div>
           </div>
           <hr class="my-1">
           <div class="d-flex justify-content-between">
             <div class="float-left">
               @if($s->status)
               <div class="badge badge-success badge-lg mr-1 mb-1">Diterima</div>
               @elseif($s->status == 0 && $s->status != null)
               <div class="badge badge-danger badge-lg mr-1 mb-1">Ditolak</div>
               @else
               <div class="badge badge-info badge-lg mr-1 mb-1">Menunggu</div>
               @endif
             </div>
             <div class="float-right mt-2">
               <button type="button" class="btn btn-icon btn-icon rounded-circle btn-warning waves-effect waves-light"><i class="feather icon-edit"></i></button>
               <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-light"><i class="feather icon-trash"></i></button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
    @endforeach

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
