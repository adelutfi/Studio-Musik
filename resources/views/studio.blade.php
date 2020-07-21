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
                                      <form action="{{route('cari.studio')}}" method="GET" class="serach-widget-form">
                                          <div class="form-group">
                                              <input type="text" name="nama" value="{{request()->nama}}" class="form-control">
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
                      @php($hari = \Carbon\Carbon::now()->isoFormat('dddd'))
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
                                        @if($s->sewaTempat)
                                        <div class="col-6 col-md-6" style="display: {{request()->get('ket') === 'sewa-alat' ? 'none' : ''}}">
                                         <p><strong>Sewa Tempat <br> Rp. {{number_format($s->sewaTempat->harga,0,',','.') }} </strong></p>
                                        </div>
                                        @endif
                                        @if($s->sewaAlat)
                                        <div class="col-6 col-md-6" style="display: {{request()->get('ket') === 'sewa-tempat' ? 'none' : ''}}">
                                         <p><strong>Sewa Alat <br> Rp. {{number_format($s->sewaAlat->harga,0,',','.') }} </strong></p>
                                        </div>
                                        @endif

                                        @if($s->sewaTempat && request()->get('tanggal'))
                                        <div class="col-6 col-md-6">
                                          <a type="button" class="btn btn-warning text-white" href="{{url('s='.$s->id.'/ket=sewa-tempat/pemesanan?tanggal='.request()->get('tanggal'))}}" name="button">Sewa</a>
                                        </div>
                                        @endif
                                        @if($s->sewaAlat && request()->get('tanggal'))
                                        <div class="col-6 col-md-6">
                                          <a type="button" class="btn btn-warning text-white" href="{{url('s='.$s->id.'/ket=sewa-alat/pemesanan?tanggal='.request()->get('tanggal'))}}" name="button">Sewa</a>
                                        </div>
                                        @endif
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
                            <h6 class="">Pilih tanggal & hari</h6>
                              <div class="col-12 col-md-12 input-group mb-4">
                               <input type="text" class="form-control" id="datepicker-13" name="tanggal" value="{{request()->get('tanggal')}}" placeholder="Pilih Tanggal">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="">
                                    {{ request()->get('tanggal') ? \Carbon\Carbon::parse(request('tanggal'))->isoFormat('dddd') : '-'}}
                                  </span>
                                </div>
                             </div>

                            <form class="" action="index.html" method="post">
                            <h6>Studio</h6>

                            <div class="widget-body">
                                <ul>
                                    <li><a class="@if(!request()->get('ket') && request()->get('rating') && !request()->get('tanggal')) active @endif" href="{{url('semua-studio')}}">Semua</a></li>
                                    <li><a class="@if(request()->get('ket') == 'sewa-tempat') active @endif" href="{{url('semua-studio/filter?ket=sewa-tempat&rating='.request()->get('rating'))}}">Sewa Tempat</a></li>
                                    <li><a class="@if(request()->get('ket') == 'sewa-alat') active @endif" href="{{url('semua-studio/filter?ket=sewa-alat&rating='.request()->get('rating'))}}">Sewa Alat</a></li>
                                    <li><a class="@if(request()->get('ket') == $hari) active @endif" href="{{url('semua-studio/filter?ket='.$hari.'&rating='.request()->get('rating'))}}">Tersedia Hari Ini</a></li>
                                </ul>
                                <h6 class="mt-4">Rating</h6>
                            </div>
                            <ul>
                              <li class="mb-3">
                                <a href="{{url('semua-studio/filter?ket='.request()->get('ket').'&rating=1')}}">
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  {!!request()->get('rating') == 1 ? '<span class="ml-2 fa fa-check text-info fa-lg"></span>' : ''!!}
                                </a>
                              </li>
                              <li class="mb-3">
                                <a href="{{url('semua-studio/filter?ket='.request()->get('ket').'&rating=2')}}">
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  {!!request()->get('rating') == 2 ? '<span class="ml-2 fa fa-check text-info fa-lg"></span>' : ''!!}
                                </a>
                              </li>
                              <li class="mb-3">
                                <a href="{{url('semua-studio/filter?ket='.request()->get('ket').'&rating=3')}}">
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  {!!request()->get('rating') == 3 ? '<span class="ml-2 fa fa-check text-info fa-lg"></span>' : ''!!}
                                </a>
                              </li>
                              <li class="mb-3">
                                <a href="{{url('semua-studio/filter?ket='.request()->get('ket').'&rating=4')}}">
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star fa-lg"></span>
                                  {!!request()->get('rating') == 4 ? '<span class="ml-2 fa fa-check text-info fa-lg"></span>' : ''!!}
                                </a>
                              </li>
                              <li class="mb-3">
                                <a href="{{url('semua-studio/filter?ket='.request()->get('ket').'&rating=5')}}">
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  <span class="fa fa-star checked fa-lg"></span>
                                  {!!request()->get('rating') == 5 ? '<span class="ml-2 fa fa-check text-info fa-lg"></span>' : ''!!}
                                </a>
                              </li>
                            </ul>
                          </form>
                        </div><!-- //.widget area -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
  const url = '{{config("app.url")}}';
$( "#datepicker-13" ).datepicker({
  dateFormat: 'd-m-yy',
  dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
  autoclose: true,
  minDate: new Date(),
  onSelect: function(date) {
    window.location = url+'/semua-studio?tanggal='+date
  }
});
</script>

@endsection
