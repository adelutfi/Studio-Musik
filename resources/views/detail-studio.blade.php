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
          @if(Session::has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal</strong> {{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <div class="blog-details-content"><!-- blog details content  -->
                <div class="thumb">
                  <img src="{{asset('public/'.$studio->gambar)}}" class="img-fluid" height="400px" width="800px" alt="blog detials image">
                </div>
                <div class="row">
                  <div class="col-md-9 col-6">
                  <h4 class="title">{{$studio->nama}}</h4>
                </div>
                 @php($total = $studio->ratings->nilai/$studio->ratings->jumlah )
                <div class="col-md-3 col-6">
                    @for($i = 0; $i < 5; $i++)
                      @if($total <= $i)
                      <span class="fa fa-star fa-lg"></span>
                      @else
                     <span class="fa fa-star fa-lg checked"></span>
                     @endif
                  @endfor
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
            <span class="author-name"><i class="fas fa-music mr-3"></i><strong> {{$studio->sewaTempat ? 'Sewa Tempat Rp. '.number_format($studio->sewaTempat->harga,0,',','.') : ''}} </strong></span>
            <span class="author-name"><i class="fa fa-truck mr-3" aria-hidden="true"></i><strong>{{$studio->sewaAlat ? 'Sewa Alat Rp. '.number_format($studio->sewaAlat->harga,0,',','.') : ''}} </strong></span>
        </blockquote>
    </div>
    @if(!$studio->sewaTempat && !$studio->sewaAlat )
      <div class="alert alert-dark" role="alert">
        <strong>Maaf</strong> Penyewaan belum tersedia
      </div>
    @endif

      <div id="accordion">
          <div id="headingOne">
            <h5 class="mb-0">
              @if($studio->sewaTempat)
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#sewa-tempat" aria-expanded="true" aria-controls="collapseOne" data-parent="#accordion">
                  Ket. Sewa Tempat
                </button>
              @endif
              @if($studio->sewaAlat)
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#sewa-alat" aria-expanded="true" aria-controls="collapseOne" data-parent="#accordion">
                  Ket. Sewa Alat
                </button>
              @endif
            </h5>
          </div>

            @if($studio->sewaTempat)
                <div class="collapse" aria-labelledby="headingOne" data-parent="#accordion" id="sewa-tempat">
                  <div class="card card-body">
                    <div class="text-right mb-2">
                       <h4><strong>Rp. {{number_format($studio->sewaTempat->harga, 0, ',','.')}}</strong> </h4>
                    </div>
                    @php($jadwal = explode(',',$studio->sewaTempat->jadwal))
                    @php($buka = explode(',',$studio->sewaTempat->jam_buka))
                    @php($tutup = explode(',',$studio->sewaTempat->jam_tutup))
                    <h4>Jadwal :</h4>
                    <div class="row">
                    @for($i = 0; $i < count($jadwal); $i++)
                    <div class="col-6">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{$jadwal[$i]}} </li>
                        <li class="breadcrumb-item">{{$buka[$i]}} - {{$tutup[$i]}}</li>
                      </ol>
                      </div>
                      @endfor
                      </div>
                      <button class="btn btn-dark">
                        Jumlah Ruangan <span class="badge badge-light"> <strong class="h5"> {{$studio->sewaTempat->jumlah_ruangan}}</strong></button>
                    </button>
                    <div class="text-right">
                    <button class="btn btn-secondary" onclick="window.location='{{route("pemesanan", [$studio,'sewa-tempat'])}}'">Sewa</button>
                    </div>
                  </div>
                </div>
                @endif

        @if($studio->sewaAlat)
          <div class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" id="sewa-alat">
            <div class="card card-body">
               <div class="text-right mb-2">
                 <h4><strong>Rp. {{number_format($studio->sewaAlat->harga, 0, ',','.')}}</strong> </h4>
              </div>
                @php($jadwal = explode(',',$studio->sewaAlat->jadwal))
              <h4>Jadwal :</h4>
              <div class="row">
              @for($i = 0; $i < count($jadwal); $i++)
              <div class="col-2">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">{{$jadwal[$i]}} </li>
                </ol>
                </div>
                @endfor
                </div>

              <div class="text-right">
               <button class="btn btn-secondary" onclick="window.location='{{route("pemesanan", [$studio,'sewa-alat'])}}'">Sewa</button>
              </div>
            </div>
           </div>
          @endif
        </div>

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
@endsection
