@extends('templates.landing.default')

@section('content')
<section class="breadcumb-area breadcrumb-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-inner">
                        <h2 class="title">Detail Studio</h2>
                        <ul class="page-lists">
                            <li><a href="{{url('/')}}">Beranda</a></li>
                            <li><a class="active" href=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-details-page-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content"><!-- blog details content  -->
                    <div class="thumb">
                        <img src="{{asset('public/'.$studio->gambar)}}" class="img-fluid" height="400px" width="800px" alt="blog detials image">
                    </div>
                    <div class="row">
                      <div class="col-md-9 col-6">
                        <h4 class="title">{{$studio->nama}}</h4>
                      </div>
                      <div class="col-md-3 col-6">
                        <span class="fa fa-star fa-lg checked"></span>
                        <span class="fa fa-star fa-lg checked"></span>
                        <span class="fa fa-star fa-lg checked"></span>
                        <span class="fa fa-star fa-lg"></span>
                        <span class="fa fa-star fa-lg"></span>
                      </div>
                    </div>


                    <!-- <ul class="post-meta">
                        <li><i class="fas fa-clock"></i> Aug 21,2018</li>
                        <li><a href="#"><i class="fas fa-tags"></i> Painting</a></li>
                        <li><i class="fas fa-comments"></i> 22 Comments</li>
                    </ul> -->
                    <div class="entry-content">
                        <blockquote class="blockquote">
                            <p>Keterangan : <p>
                              <p>{{$studio->deskripsi}}</p>
                            <span class="author-name"><i class="fas fa-map-marker-alt mr-3"></i>{{$studio->alamat}}</span>
                            <span class="author-name"><i class="fas fa-phone mr-3"></i>{{$studio->pemilik->no_telp}}</span>
                        </blockquote>
                        <div>

                        </div>
                        <!-- <p>Sing long her way size. Waited end mutual missed myself the little sister one. So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect. Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an. If their woman could do wound on. You folly taste hoped their above are and but. </p> -->
                        </div>
                    <div>
                         @if(count($studio->sewaTempat) < 1 && count($studio->sewaAlat) < 1)
                          <div class="alert alert-dark" role="alert">
                           <strong>Maaf</strong> Penyewaan belum tersedia
                        </div>    
                        @endif
                <p>
                   @if(count($studio->sewaTempat) > 0)                         
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#sewa-tempat" aria-expanded="false" aria-controls="collapseExample">
                    Sewa Tempat
                  </button>
                  @endif
                   @if(count($studio->sewaAlat) > 0)
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#sewa-alat" aria-expanded="false" aria-controls="collapseExample">
                    Sewa Alat
                  </button>
                  @endif
                </p>

                @if(count($studio->sewaTempat) > 0)
                <div class="collapse" id="sewa-tempat">
                  <div class="card card-body">
                    @foreach($studio->sewaTempat as $tempat)
                        {{$tempat->jadwal}}
                        {{$tempat->harga}}
                        {{$tempat->ruangan}}
                    @endforeach
                    <div class="text-right">
                    <button class="btn btn-secondary">Sewa</button>
                    </div>
                  </div>
                </div>
                @endif
                 @if(count($studio->sewaAlat) > 0)
                <div class="collapse" id="sewa-alat">
                  <div class="card card-body">
                     @foreach($studio->sewaAlat as $alat)
                        {{$alat->jadwal}}
                        {{$alat->harga}}
                    @endforeach
                    <div class="text-right">
                    <button class="btn btn-secondary">Sewa</button>
                    </div>
                  </div>
                 </div>
                </div>
                @endif
                    <div class="entry-comment">
                        <h3 class="title">(0) Komentar</h3>
                        <ul class="comment-list">
                            <!-- <li>
                                <div class="single-comment-item"><!-- single comment item
                                    <div class="thumb">
                                        <img src="assets/img/comments/01.jpg" alt="comments image">
                                    </div>
                                    <div class="content">
                                        <span class="reply"><a href="#">Reply</a></span>
                                        <h4 class="name">Alice Elliston</h4>
                                        <span class="time"><i class="far fa-clock"></i> 17 Aug 2018</span>
                                        <p>nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                    <div class="comment-form-area">
                        <h3 class="title">Masukan Komentar</h3>
                        <form action="blog-details.html" class="comments-entry-form">
                            <div class="form-group textarea">
                                <textarea class="form-control" placeholder="Masukan pesan kamu" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" class="submit-btn">Simpan</button>
                        </form>
                    </div>
                </div><!-- //. blog details content -->
            </div>
            <!-- <div class="col-lg-4">
                    <div class="sidebar">
                            <div class="widget-area category">
                                <div class="widget-title">
                                    <h4 class="title">Stduio Lainnya</h4>
                                </div>
                                <div class="widget-body">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Technology And IT</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Corporate And Business</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Innovation Invention</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Marketing</a></li>
                                        <li><a href="#"><i class="fas fa-angle-right"></i> Advertisement</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
            </div> -->
        </div>
    </div>
</section>
<script>
  const sewa = document.querySelector('#sewa');
  const alat = document.querySelector('#alat');
  const tempat = document.querySelector('#tempat');

  alat.addEventListener('change', function(){
    sewa.style.display = ''
    sewa.href = 'pemesanan/sewa-alat';
  });

  tempat.addEventListener('change', function(){
    sewa.style.display = ''
    sewa.href = 'pemesanan/sewa-tempat';
  });

</script>

@endsection
