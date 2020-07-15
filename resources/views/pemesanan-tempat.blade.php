@extends('templates.landing.default')

@section('content')
<section class="concert">
           <div class="overlay"></div>
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2 class="title title2">
                              Pemesanan Tempat
                           </h2>
                           <p class="subtitle subtitle2">
                              Data Pemesanan Tempat
                           </p>
                       </div>
                   </div>
               </div>
               <div class="row justify-content-center">
                   <div class="col-lg-12">
                       <div class="tabilContainer table-responsive">
                           <table class="table">
                             <th>
                               <tr>
                                 <th class="text-white">NO</th>
                                 <th class="text-white">Studio</th>
                                 <th class="text-white">Tanggal / Waktu</th>
                                 <th class="text-white">Duraisi</th>
                                 <th class="text-white">Harga</th>
                                 <th class="text-white">Total Harga</th>
                                 <th class="text-white">Status Pembayaran</th>
                                 <th class="text-white"></th>
                               </tr>
                             </th>
                               <tbody>
                                 @foreach($pemesanan as $p)
                                   <tr>
                                       <td align="center">{{$loop->iteration}}</td>
                                       <td align="center">{{$p->studio->nama}}</td>
                                       <td align="center">{{date("d-m-Y", strtotime($p->tanggal)) }} / {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->format('h:i')}}</td>
                                       <td align="center">{{$p->durasi}} Jam</td>
                                       <td align="center">Rp. {{number_format($p->harga,0,',','.')}}</td>
                                       <td align="center">Rp. {{number_format($p->harga * $p->durasi,0,',','.')}}</td>
                                       <td align="center">
                                         @if($p->status == null)
                                         Menunggu
                                        @elseif($p->status == 0)
                                          Gagal
                                        @elseif($p->status == 1)
                                          Selesai
                                        @endif
                                       </td>
                                       <td align="center"><a href="#">Detail</a></td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="col-lg-12">
                    <div class="blog-pagination">
                        <nav aria-label="Page navigation">
                          {{$pemesanan->links()}}
                        </nav>
                    </div>
                </div>
               </div>
           </div>
       </section>

@endsection
