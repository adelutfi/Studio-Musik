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
                          @php($totalRating = ceil($r->ratings->sum('nilai')/count($r->ratings)) )
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                        <div class="img">
                                            <img class="img-fluid" src="{{asset('public/'.$r->gambar)}}" alt="">
                                        </div>
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
                                            <p>
                                                {{$r->alamat}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
           @php($total = ceil($s->ratings->sum('nilai')/count($s->ratings)) )
             <div class="col-lg-4 col-md-6 col-12 mt-4">
                 <div class="single-blog-item">
                     <!-- single blog item -->
                     <div class="thumb">
                         <img src="{{asset('public/'.$s->gambar)}}" width="350" height="300" alt="blog single image">
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
                         <a href="{{route('detail.studio', $s)}}" class="readmore">
                           <div class="float-right">
                            <i class="fas fa-arrow-right fa-lg text-info"></i> </a>
                            </div>
                     </div>
                 </div>
             </div>
             @endforeach
             <div class="col-12 text-center mt-4">
                 <button type="button" onclick="window.location='{{route("semua.studio")}}'" class="btn btn-info">Lihat Selengkapnya</button>
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
               <div class="col-md-6 col-lg-3 text-center">
                 <img class="img-icon" src="{{asset('public/assets/landing/img/shop.png')}}" alt="">
                 <h5>Temukan Studio Musik Sesuai Kebutuhan</h5>
                 <p align="justify">Temukan studio yang anda butuhkan, dari beberapa pilihan yang tersedia di website studio.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center">
                 <img class="img-icon" src="{{asset('public/assets/landing/img/contract.png')}}" alt="">
                 <h5>Pesan Tempat & Sewa Alat</h5>
                 <p align="justify" class="text-content-justify">Pesan tempat sesuai tanggal dan waktu, tambhakn fasilitas untuk mendukung kegiatan anda.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center">
                  <img class="img-icon" src="{{asset('public/assets/landing/img/money.png')}}" alt="">
                  <h5>Pembayaran Via Transfer</h5>
                  <p align="justify">Lakukan Pembayaran untuk mengkonfirmasi pemesanan anda, kemudian anda dapat langsung menggunakan tempat.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center">
                  <img class="img-icon" src="{{asset('public/assets/landing/img/delivery-truck.png')}}" alt="">
                  <h5>Angkut Alat Sewa</h5>
                  <p align="justify">Penyewaan barang cepat & mudah dengan jasa angkut barang.</p>
               </div>
           </div>
       </div>
   </section>
@endsection
