@extends('templates.landing.default')

@section('content')
<section class="breadcumb-area breadcrumb-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-inner">
                        <h2 class="title">Studio</h2>
                        <ul class="page-lists">
                            <li><a href="{{url('/')}}">Beranda</a></li>
                            <li><a class="active" href=""></a></li>
                        </ul>
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
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                                <div class="content">
                                    <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                                    <a href="{{url('detail-studio')}}"><h3 class="title">MIXPACK STUDIO RECORD</h3></a>
                                    <p>Jalan Mangkukusuman, Tegal Timur, Tegal City, Central Java 52131.</p>
                                    <div>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                  </div>
                                    <a href="#" class="readmore">Read More</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                                <div class="content">
                                    <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                                    <a href="{{url('detail-studio')}}><h3 class="title">STUDIO MUSIK REBO STAR</h3></a>
                                    <p>Jalan Projosumarto 1 No.15, Kocro, Kemantran, Kec. Kramat, Tegal, Jawa Tengah 52181.</p>
                                    <a href="#" class="readmore">Read More</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                                <div class="content">
                                    <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                                    <a href="{{url('detail-studio')}}"><h3 class="title">RIZA MUSIK TEGAL</h3></a>
                                    <p>Jalan Pangeran Antasari No.53, Keturen, Kec. Tegal Sel., Kota Tegal, Jawa Tengah 52134.</p>
                                    <a href="#" class="readmore">Read More</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                                <div class="content">
                                    <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                                    <a href="{{url('detail-studio')}}"><h3 class="title">PUTRA MUSIK STUDIO</h3></a>
                                    <p>Jalan  Bulakwaru, Tarub, Tegal, Central Java 52184.</p>
                                    <a href="#" class="readmore">Read More</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                                <div class="content">
                                    <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                                    <a href="{{url('detail-studio')}}"><h3 class="title">MAGENTA MUSIK STUDIO</h3></a>
                                    <p> jalan ghozali no 153 RT 03/02, Kalibakung, Kec. Balapulang, Tegal, Jawa Tengah 52464.</p>
                                    <a href="#" class="readmore">Read More</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-item"><!-- single blog item -->
                                <div class="thumb">
                            <img class="img-fluid" src="{{asset('public/images/studio/studio-7.jpeg')}}" alt="">
                        </div>
                                <div class="content">
                                    <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                                    <a href="{{url('detail-studio')}}"><h3 class="title">IRAMA MUSIK STUDIO</h3></a>
                                    <p>Jalan Kesuben No 04 C, Desa, RT.04/RW.03, Kademangan, Kesuben, Kec. Lebaksiu, Tegal, Jawa Tengah 52461.</p>
                                    <a href="#" class="readmore">Read More</a>
                                </div>
                            </div><!-- //. single blog item -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="blog-pagination">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="widget-area search"><!-- widget area -->
                            <div class="widget-body">
                                <form action="blog.html" class="serach-widget-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                    <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div><!-- //.widget area -->
                        <div class="widget-area category"><!-- widget area -->
                            <div class="widget-title">
                                <h4 class="title">Category</h4>
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
                        </div><!-- //.widget area -->
                        <div class="widget-area archive"><!-- widget area -->
                            <div class="widget-title">
                                <h4 class="title">Archive</h4>
                            </div>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#"><i class="fas fa-angle-right"></i> June 2018</a></li>
                                    <li><a href="#"><i class="fas fa-angle-right"></i> July 2018</a></li>
                                    <li><a href="#"><i class="fas fa-angle-right"></i> August 2018</a></li>
                                    <li><a href="#"><i class="fas fa-angle-right"></i> September 2018</a></li>
                                    <li><a href="#"><i class="fas fa-angle-right"></i> October 2018</a></li>
                                </ul>
                            </div>
                        </div><!-- //.widget area -->
                        <div class="widget-area tag"><!-- widget area -->
                            <div class="widget-title">
                                <h4 class="title">Tags</h4>
                            </div>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#"> technology</a></li>
                                    <li><a href="#"> builing</a></li>
                                    <li><a href="#"> corporate</a></li>
                                    <li><a href="#"> business</a></li>
                                    <li><a href="#"> office</a></li>
                                    <li><a href="#"> social</a></li>
                                    <li><a href="#"> interior</a></li>
                                    <li><a href="#"> housing</a></li>
                                </ul>
                            </div>
                        </div><!-- //.widget area -->
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
