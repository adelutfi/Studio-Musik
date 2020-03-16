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
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                        <div class="img">
                                            <img class="img-fluid" src="{{asset('public/images/studio/studio-1.jpeg')}}" alt="">
                                            <!-- <a class="venobox" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=R-1wBk3H2LI">
                                                <i class="fas fa-play"></i>
                                            </a> -->
                                        </div>
                                        <div class="text">
                                            <h4 class="secondaryTitle">
                                                ACORD MUSIC STUDIO TEGAL
                                            </h4>
                                            <p>
                                                Jalan Sumbodro Gg. Asri lll, Slerok, Tegal Timur, Slerok, Tegal, Kota Tegal, Jawa Tengah 52124
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                        <div class="img">
                                            <img class="img-fluid" src="{{asset('public/images/studio/studio-2.jpeg')}}" alt="">
                                            <!-- <a class="venobox" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=R-1wBk3H2LI">
                                                <i class="fas fa-play"></i>
                                            </a> -->
                                        </div>
                                        <div class="text">
                                            <h4 class="secondaryTitle">
                                                4GIVENSTUDIO MUSIC TEGAL
                                            </h4>
                                            <p>
                                                Jalan Werkudoro No.140 RT/RW 004/006, Slerok, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52125
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                        <div class="img">
                                            <img class="img-fluid" src="{{asset('public/images/studio/studio-3.jpeg')}}" alt="">
                                            <!-- <a class="venobox" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=R-1wBk3H2LI">
                                                <i class="fas fa-play"></i>
                                            </a> -->
                                        </div>
                                        <div class="text">
                                            <h4 class="secondaryTitle">
                                                PURWA CARAKA MUSIC STUDIO
                                            </h4>
                                            <p>
                                                Jalan Jalak Barat No.69, Pekauman, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52125
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Brand Member Section Start -->
      <section class="member">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">
                            STUDIO MUSIK
                        </h2>
                        <p class="subtitle">
                            pilih studio musik yang anda inginkan
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="memberBox">
                        <div class="img">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-4.jpeg')}}" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                MIGHT STUDIO
                            </h3>
                            <p>
                                Jalan Professor Muhammad Yamin, Kudaile, Kec. Slawi, Tegal, Jawa Tengah 52413.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="memberBox">
                        <div class="img">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-5.jpeg')}}" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                STUDIO 10 (JI-SONG)
                            </h3>
                            <p>
                                Jalan Werkudoro No.118, Pengabean, Slerok, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52192
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="memberBox">
                        <div class="img">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-6.jpeg')}}" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                KAMARUNGSEB STUDIO
                            </h3>
                            <p>
                                Jalan Kaloran No.9, Mangkukusuman, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52131
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="memberBox">
                        <div class="img">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                VILLA MUSIK STUDIO
                            </h3>
                            <p>
                                Jalan Pala Raya, Griya Mejasem Baru, Mejasem Bar., Kec. Kramat, Tegal, Jawa Tengah 52181
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
          <button class="submit" onclick="window.location='{{url('semua-studio')}}'" type="submit">Lihat Selengkapnya</button>
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
                 <p align="center">Temukan studio yang anda butuhkan, dari beberapa pilihan yang tersedia di website studio.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center">
                 <img class="img-icon" src="{{asset('public/assets/landing/img/contract.png')}}" alt="">
                 <h5>Pesan Tempat & Sewa Alat</h5>
                 <p align="center" class="text-content-justify">Pesan tempat sesuai tanggal dan waktu, tambhakn fasilitas untuk mendukung kegiatan anda.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center">
                  <img class="img-icon" src="{{asset('public/assets/landing/img/money.png')}}" alt="">
                  <h5>Pembayaran Via Transfer</h5>
                  <p align="center">Lakukan Pembayaran untuk mengkonfirmasi pemesanan anda, kemudian anda dapat langsung menggunakan tempat.</p>
               </div>
               <div class="col-md-6 col-lg-3 text-center">
                  <img class="img-icon" src="{{asset('public/assets/landing/img/delivery-truck.png')}}" alt="">
                  <h5>Angkut Alat Sewa</h5>
                  <p align="center">Penyewaan barang cepat & mudah dengan jasa angkut barang.</p>
               </div>
           </div>
       </div>
   </section>
@endsection
