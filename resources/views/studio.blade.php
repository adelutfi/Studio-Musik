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
                           @if($s->sewaAlat || $s->sewaTempat)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                                   <a href="{{route('detail.studio', $s)}}">
                                  <img src="{{asset('public/'.$s->gambar)}}" width="350" height="250" alt="">
                                  </a>
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
                                      <div class="row mt-2">
                                        <div class="col-6">
                                         <p><strong>{!!$s->sewaAlat ? 'Sewa Tempat <br> Rp. '.number_format($s->sewaTempat->harga,0,',','.') : ''!!} </strong></p>
                                        </div>
                                        <div class="col-6">
                                          <p><strong>{!!$s->sewaAlat ? 'Sewa Alat <br> Rp. '.number_format($s->sewaAlat->harga,0,',','.') : ''!!} </strong></p>
                                        </div>
                                      </div>
                                  </div>
                                    <a href="{{route('detail.studio', $s)}}" class="readmore">Selengkapnya</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        @endif
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
                                    <li><a class="@if(Request::is('semua-studio')) active @endif" href="#">Semua</a></li>
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
