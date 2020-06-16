@extends('templates.landing.default')

@section('content')
<section class="breadcumb-area breadcrumb-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-inner">
                        <h2 class="title">Studio</h2>
                        <div class="row">
                          <div class="col-12 col-md-6 mb-5">
                            <ul class="page-lists">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li><a class="active" href="">Studio</a></li>
                            </ul>
                          </div>
                          <div class="col-12 col-md-6">
                            <div class="page-lists">
                              <div class="widget-area search"><!-- widget area -->
                                  <div class="widget-body">
                                      <form action="" method="GET" class="serach-widget-form">
                                          <div class="form-group">
                                              <input type="text" class="form-control">
                                          </div>
                                          <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
                                      </form>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area blog-bg blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($studio as $s)
                         @php($totalRating = $s->ratings->nilai/$s->ratings->jumlah )
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img src="{{asset('public/'.$s->gambar)}}" width="350" height="250" alt="">
                                </div>
                                <div class="content">
                                   {{--  <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span> --}}
                                    <a href="{{route('detail.studio', $s)}}">
                                        <h3 class="title">{{$s->nama}}</h3>
                                    </a>
                                    <p class="mb-2">{{$s->alamat}}</p>
                                    <div>
                                       @for($i = 0; $i < 5; $i++)
                                         @if($totalRating <= $i)
                                          <span class="fa fa-star fa-xs"></span>
                                         @else
                                            <span class="fa fa-star checked fa-xs"></span>
                                          @endif
                                           @endfor
                                            @if($s->sewaAlat)
                                           <span class="badge badge-success float-right ml-2">Sewa Alat</span>
                                           @endif
                                           @if($s->sewaTempat)
                                           <span class="badge badge-primary float-right">Sewa Tempat</span>
                                           @endif

                                             @if(!$s->sewaAlat && !$s->sewaTempat)
                                           <span class="badge badge-danger float-right">Belum Tersedia</span>
                                           @endif
                                  </div>
                                    <a href="{{route('detail.studio', $s)}}" class="readmore">Selengkapnya</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12">
                        <div class="blog-pagination">
                            {{$studio->links()}}
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="widget-area tag"><!-- widget area -->
                            <div class="widget-title">
                                <h4 class="title">Filter</h4>
                            </div>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#">Semua</a></li>
                                    <li><a href="#">Tersedia</a></li>
                                    <li><a href="#">Sewa Tempat</a></li>
                                    <li><a href="#">Sewa Alat</a></li>
                                </ul>
                            </div>
                        </div><!-- //.widget area -->
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
