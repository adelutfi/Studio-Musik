@extends('templates.landing.default')

@section('content')

    <!-- Hero Area Start -->
    <div class="heroArea">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="maintitle">
                        <h1>Penyewaan studio Musik Ning Tegal</h1>
                        <p>Aja Klalen Sewa</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="musicSlider text-left">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="misicSliderClass owl-carousel">
                          @foreach($rating as $r)
                          @php($totalRating = $r->ratings->nilai/$r->ratings->jumlah)
                            @if($r->sewaAlat || $r->sewaTempat)
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                      <a href="{{route('detail.studio', $r)}}">
                                        <div class="img">
                                            <img src="{{asset('public/'.$r->gambar)}}" alt="">
                                        </div>
                                      </a>
                                        <div class="text">
                                            <a href="{{route('detail.studio', $r)}}">
                                            <h4 class="secondaryTitle">
                                                {{$r->nama}}
                                            </h4>
                                            @for($i = 0; $i < 5; $i++)
                                             @if($totalRating <= $i)
                                              <span class="fa fa-star fa-xs"></span>
                                             @else
                                            <span class="fa fa-star checked fa-xs"></span>
                                           @endif
                                           @endfor
                                            </a>
                                            <p>{{$r->alamat}}</p>
                                           <p><strong> {{$r->sewaTempat ? 'Sewa Tempat Rp. '.number_format($r->sewaTempat->harga,0,',','.') : ''}} </strong></p>
                                            <p><strong>{{$r->sewaAlat ? 'Sewa Alat Rp. '.number_format($r->sewaAlat->harga,0,',','.') : ''}} </strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Brand Member Section Start -->
    <section class="blog-area blog-bg" id="blog">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="section-title">
                     <h2 class="title">
                         Studio Terbaru
                     </h2>
                 </div>
             </div>
         </div>
         <div class="row">
           @foreach($studio as $s)
           @php($total = $s->ratings->nilai/$s->ratings->jumlah )
            @if($s->sewaAlat || $s->sewaTempat)
             <div class="col-lg-4 col-md-6 col-12 mt-4">
                 <div class="single-blog-item">
                     <!-- single blog item -->
                     <div class="thumb">
                       <a href="{{route('detail.studio', $s)}}">
                         <img src="{{asset('public/'.$s->gambar)}}" width="350" height="300" alt="blog single image">
                         </a>
                     </div>
                     <div class="content">
                         <span class="date">
                           @for($i = 0; $i < 5; $i++)
                            @if($total <= $i)
                             <span class="fa fa-star fa-xs"></span>
                            @else
                           <span class="fa fa-star checked fa-xs"></span>
                          @endif
                          @endfor
                         </span>
                         <a href="{{route('detail.studio', $s)}}">
                             <h5 class="title">{{$s->nama}}</h5>
                         </a>
                         <p>{{str_limit($s->alamat,20,'....')}}</p>
                         <div class="row">
                           @if($s->sewaTempat)
                           <div class="col-6">
                            <p><strong>Sewa Tempat <br> Rp. {{number_format($s->sewaTempat->harga,0,',','.') }} </strong></p>
                           </div>
                           @endif
                           @if($s->sewaAlat)
                           <div class="col-6">
                            <p><strong>Sewa Alat <br> Rp. {{number_format($s->sewaAlat->harga,0,',','.') }} </strong></p>
                           </div>
                           @endif

                         </div>
                         <a href="{{route('detail.studio', $s)}}" class="readmore">
                           <div class="float-right">
                            <i class="fas fa-arrow-right fa-lg text-info"></i> </a>
                            </div>
                     </div>
                 </div>
             </div>
             @endif
             @endforeach
             <div class="col-12 text-center mt-4">
                 <button type="button" onclick="window.location='{{route("semua.studio")}}'" class="submit">
                   Lihat Selengkapnya
                 </button>

                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                   Launch demo modal
                 </button> -->

<!-- Modal -->

             </div>
         </div>
     </div>
 </section>
    <!-- Brand Member Section End -->
     <!-- Album Area Start -->
     <section class="member">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="section-title">
                       <h2 class="title">
                           Cara Pemesanan
                       </h2>
                       <p class="subtitle">
                           Mudah & Cepat Degan 4 Langkah
                       </p>
                   </div>
               </div>
           </div>
           <div class="row">
             <div class="col-12 mb-4">
                 <div class="section-title">
                    <h4 class="text-info">Pemasanan Tempat Studio</h4>
                 </div>
             </div>
               <div class="col-md-6 col-lg-3 text-center mb-3">
                 <img class="img-icon" src="{{asset('public/assets/landing/img/shop.png')}}" alt="">
                 <h5>Pilih Studio</h5>
                 <p align="justify">Temukan studio yang anda butuhkan, dan pilih studio sesuai kebutuhan anda di website.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center mb-3">
                 <img class="img-icon" src="{{asset('public/assets/landing/img/contract.png')}}" alt="">
                 <h5>Pesan Studio</h5>
                 <p align="justify" class="text-content-justify">Masukan data dan cek transaksi anda.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center mb-3">
                  <img class="img-icon" src="{{asset('public/assets/landing/img/money.png')}}" alt="">
                  <h5>Pembayaran & Konfirmasi</h5>
                  <p align="justify">Lakukan pembayaran seusai order dan konfirmasi pembayaran via transfer.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center mb-3">
                  <img class="img-icon" src="{{asset('public/assets/landing/img/studio-band.png')}}" alt="">
                  <h5>Langsung Ke Studio</h5>
                  <p align="justify">Studio bisa langsung digunakan setelah proses dilakukan.</p>
               </div>
               <div class="col-12 mb-4 mt-5">
                   <div class="section-title">
                      <h4 class="text-info">Pemasanan Sewa Alat</h4>
                   </div>
               </div>
                 <div class="col-md-6 col-lg-3 text-center mb-3">
                   <img class="img-icon" src="{{asset('public/assets/landing/img/shop.png')}}" alt="">
                   <h5>Temukan Studio Musik Sesuai Kebutuhan</h5>
                   <p align="justify">Temukan studio yang anda butuhkan, dari beberapa pilihan yang tersedia di website studio.</p>
                 </div>
                 <div class="col-md-6 col-lg-3 text-center mb-3">
                   <img class="img-icon" src="{{asset('public/assets/landing/img/contract.png')}}" alt="">
                   <h5>Pesan Tempat & Sewa Alat</h5>
                   <p align="justify" class="text-content-justify">Pesan tempat sesuai tanggal dan waktu, tambhakn fasilitas untuk mendukung kegiatan anda.</p>
                 </div>
                 <div class="col-md-6 col-lg-3 text-center mb-3">
                    <img class="img-icon" src="{{asset('public/assets/landing/img/money.png')}}" alt="">
                    <h5>Pembayaran Via Transfer</h5>
                    <p align="justify">Lakukan Pembayaran untuk mengkonfirmasi pemesanan anda, kemudian anda dapat langsung menggunakan tempat.</p>
                 </div>
                 <div class="col-md-6 col-lg-3 text-center mb-3">
                    <img class="img-icon" src="{{asset('public/assets/landing/img/delivery-truck.png')}}" alt="">
                    <h5>Angkut Alat Sewa</h5>
                    <p align="justify">Penyewaan barang cepat & mudah dengan jasa angkut barang.</p>
                 </div>
           </div>
       </div>
   </section>

   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header bg-info">
           <h5 class="modal-title text-white" id="exampleModalLabel">Email Konfirmasi</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body text-center">
           @if(Session::has('emailSuccess'))
           <i class="fa fa-check-square mb-2 text-success" aria-hidden="true" style="font-size: 60px"></i>
           <h3 class="text-success mt-2">Email anda berhasil di konfirmasi </h3>
           <button type="button" class="btn btn-primary mt-5" data-dismiss="modal">OK</button>
           @endif
           @if(Session::has('emailFailed'))
           <i class="fa fa-window-close text-danger" aria-hidden="true" style="font-size: 60px"></i>
           <h3 class="text-danger mt-2">Email anda sudah di konfirmasi </h3>
           <button type="button" class="btn btn-primary mt-5" data-dismiss="modal">OK</button>
           @endif

         </div>
       </div>
     </div>
   </div>
@endsection
@section('script')
<script type="text/javascript">

@if(Session::has('emailSuccess') || Session::has('emailFailed'))
  console.log("hahahaha");
  $('#exampleModal').modal('show');
@endif


$(".owl-carousel").owlCarousel({
    autoPlay: 3000,
    items : 1, // THIS IS IMPORTANT
    responsive : {
          440 : { items : 1  }, // from zero to 480 screen width 4 items
          768 : { items : 2  }, // from 480 screen widthto 768 6 items
          1024 : { items : 2 }
      },
});
</script>
@endsection
