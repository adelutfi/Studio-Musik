@extends('templates.studio.default')

@section('navbar')
    @include('templates.studio.partials._admin-navbar')
@endsection

@section('sidebar')
    @include('templates.studio.partials._admin-sidebar')
@endsection

@section('content')
<div class="content-header row"></div>
<div class="content-body"><!-- Dashboard Ecommerce Starts -->
<section id="statistics-card">
  <div class="row">

    <div class="col-xl-4 col-md-4 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-user text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">{{$pemilik}}</h2>
             <p class="mb-0 text-dark">Pemilik</p>
           </div>
         </div>
       </div>
     </div>

       <div class="col-xl-4 col-md-4 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-users text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">{{$penyewa}}</h2>
             <p class="mb-0 text-dark">Penyewa</p>
           </div>
         </div>
       </div>
     </div>

       <div class="col-xl-4 col-md-4 col-sm-6">
       <div class="card text-center">
         <div class="card-content">
           <div class="card-body">
             <div class="avatar bg-rgba-info p-50 m-0 mb-1">
               <div class="avatar-content">
                 <i class="feather icon-home text-info font-medium-5"></i>
               </div>
             </div>
             <h2 class="text-bold-700">{{$studio}}</h2>
             <p class="mb-0 text-dark">Studio</p>
           </div>
         </div>
       </div>
     </div>

  	</div>
  </div>
</section>
</div>
@endsection
