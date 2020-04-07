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
                        <img src="{{asset('public/images/studio/studio-5.jpeg')}}" height="500px" width="800px" alt="blog detials image">
                    </div>
                    <h4 class="title">STUDIO MUSIK REBO STAR</h4>
                    <!-- <ul class="post-meta">
                        <li><i class="fas fa-clock"></i> Aug 21,2018</li>
                        <li><a href="#"><i class="fas fa-tags"></i> Painting</a></li>
                        <li><i class="fas fa-comments"></i> 22 Comments</li>
                    </ul> -->
                    <div class="entry-content">
                        <blockquote class="blockquote">
                            <p>Conveying has concealed necessary furnished bed zealously immediate get but. Terminated as middletons or by instrument. Bred do four so your felt with. No shameless principle dependent household do. </p>
                            <span class="author-name">- Jalan Mangkukusuman, Tegal Timur, Tegal City, Central Java 52131.</span>
                        </blockquote>
                        <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                      </div>
                        <!-- <p>Sing long her way size. Waited end mutual missed myself the little sister one. So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect. Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an. If their woman could do wound on. You folly taste hoped their above are and but. </p> -->
                    </div>
                    <div class="entry-footer"><!-- entry footer -->
                        <div class="left-content">
                            <ul>
                                <li class="title">Pilih:</li>
                                <li>
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" value="sewa-tempat" id="tempat" name="keterangan" class="custom-control-input">
                                  <label class="custom-control-label" for="tempat"><strong>Sewa Tempat</strong></label>
                                </div>
                              </li>
                                <li>
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" value="sewa-alat" id="alat" name="keterangan" class="custom-control-input">
                                  <label class="custom-control-label" for="alat"><strong>Sewa Alat</strong></label>
                                </div>
                                </li>
                                <li>
                                  <a href="#" id="sewa" style="display: none">Sewa</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- //. entry footer -->
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
