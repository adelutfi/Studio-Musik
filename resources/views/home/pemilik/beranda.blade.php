@extends('templates.studio.default')

@section('navbar')
    @include('templates.studio.partials._navbar')
@endsection

@section('sidebar')
    @include('templates.studio.partials._sidebar')
@endsection

@section('content')
<div class="content-header row"></div>
<div class="content-body"><!-- Dashboard Ecommerce Starts -->
<section id="statistics-card">
  <div class="row">
    <div class="col-xl-3 col-md-3 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-home text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">{{count(Auth::user()->studio)}}</h2>
             <p class="mb-0 text-dark">Studio</p>
           </div>
         </div>
       </div>
     </div>
     <div class="col-xl-3 col-md-3 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-book-open text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">0</h2>
             <p class="mb-0 text-dark">Pemesanan</p>
           </div>
         </div>
       </div>
     </div>
      <div class="col-xl-3 col-md-3 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-log-in text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">{{count($sewaTempat)}}</h2>
             <p class="mb-0 text-dark">Sewa Tempat</p>
           </div>
         </div>
       </div>
     </div>
      <div class="col-xl-3 col-md-3 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-truck text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">{{count($sewaAlat)}}</h2>
             <p class="mb-0 text-dark">Sewa Alat</p>
           </div>
         </div>
       </div>
     </div>
  </div>
  </div>
</section>
</div>
@endsection
