@extends('templates.landing.default')

@section('content')
<section class="concert">
           <div class="overlay"></div>
           <div class="container">
               <div class="row mt-3 mb-2">
                   <div class="col-12">
                       <div class="section-title">
                           <h2 class="title title2">
                              Reminder
                           </h2>

                       </div>
                   </div>
               </div>
               <div class="row">
                 @foreach($pemesanan as $p)
                   <div class="col-lg-4">
                     <div class="card shadow-lg">
                        <div class="card-header bg-info text-white text-center">
                          Tanggal dan Waktu Pengembalian Alat
                        </div>
                        <div class="card-body">
                          <h4 class="text-center">Nama Studio : {{$p->studio->nama}}</h4>
                          <h4 class="text-danger text-center">
                            <i class="fa fa-calendar"></i>
                            {{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}
                          </h4>
                          <h4 class="text-danger text-center">
                            <i class="fa fa-clock"></i>
                            {{\Carbon\Carbon::parse($p->jam_pengembalian)->format('H:i')}}
                          </h4>

                        </div>
                      </div>
                   </div>
                   @endforeach

               </div>
           </div>
       </section>

@endsection
