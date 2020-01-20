
<!DOCTYPE html>
<html lang="en">

@include('templates.landing.partials._head')

<body>

    <nav class="navbar navbar-area navbar-expand-lg navbar-light">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="index.html">
                    <img src="assets/img/logo.png" alt="logo image">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="album.html">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.html">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="member.html">Member</a>
                    </li>      
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Blog
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="blog.html">Blog</a>
                            <a class="dropdown-item" href="blog-details.html">Blog Details</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Area Start -->
    <div class="heroArea">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="maintitle">
                        <h1>Extra Music</h1>
                        <p>New Album Available Everywhere</p>
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
                                            <img class="img-fluid" src="assets/img/music-slider/slide1.jpg" alt="">
                                            <a class="venobox" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=R-1wBk3H2LI">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h4 class="secondaryTitle">
                                                Bus Story | Season 1
                                            </h4>
                                            <p>
                                                Music is an art form and cultural activity whose medium will include
                                                common
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                        <div class="img">
                                            <img class="img-fluid" src="assets/img/music-slider/slide2.jpg" alt="">
                                            <a class="venobox" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=R-1wBk3H2LI">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h4 class="secondaryTitle">
                                                Home Story | Season 2
                                            </h4>
                                            <p>
                                                Music is an art form and cultural activity whose medium will include
                                                common
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="contentBox">
                                    <div class="left">
                                        <div class="img">
                                            <img class="img-fluid" src="assets/img/music-slider/slide3.jpg" alt="">
                                            <a class="venobox" data-vbtype="video" data-autoplay="true" href="https://www.youtube.com/watch?v=R-1wBk3H2LI">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h4 class="secondaryTitle">
                                                Life Story | Season 3
                                            </h4>
                                            <p>
                                                Music is an art form and cultural activity whose medium will include
                                                common
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

    <!-- Album Area Start -->
    <section class="album">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">
                            Album Baru
                        </h2>
                        <p class="subtitle">
                            New Album Available Everywhere
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="left">
                        <img src="assets/img/album/busstory.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 d-flex">
                    <div class="right">
                        <h4 class="secondaryTitle">
                            Bus Story | Season 2
                        </h4>
                        <div class="list">
                            <ul>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">
                                            01. See you again
                                        </a>
                                        <p class="l">3:58</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">02. What do you mean</a>
                                        <p class="l">3:38</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">03. Love me baby</a>
                                        <p class="l">4:58</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">04. Love me like you do</a>
                                        <p class="l">3:08</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">05. I’m the one</a>
                                        <p class="l">7:58</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">06. Sorry</a>
                                        <p class="l">3:54</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="line">
                                        <a href="#" class="f">07. Sotory of life</a>
                                        <p class="l">6:54</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="socialLinks">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-apple"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-windows"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Album Area End -->

    <!-- Gallery Section Start -->
    <section class="gallery">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title title2">
                            Disco Graphy
                        </h2>
                        <p class="subtitle subtitle2">
                            New Album Available Everywhere
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallerySlider">
            <div class="container">
                <div class="row">
                <div class="col-lg-12">
                    <div class="sliderWrapper">
                       <div class="photoSlider">
                            <div class="gallery-slider" id="gallery-slider" data-slider-id="1">
                                <div class="single-product-thumb">
                                    <img src="assets/img/gallery/bigthumb1.jpg" alt="product details image">
                                </div>
                                <div class="single-product-thumb">
                                    <img src="assets/img/gallery/bigthumb2.jpg" alt="product details image">
                                </div>
                                <div class="single-product-thumb">
                                    <img src="assets/img/gallery/bigthumb3.jpg" alt="product details image">
                                </div>
                            </div>
                            <ul class="owl-thumbs product-deails-thumb" data-slider-id="1">
                                <li class="owl-thumb-item">
                                    <img src="assets/img/gallery/smallthumb1.jpg" alt="product details thumb">
                                </li>
                                <li class="owl-thumb-item">
                                    <img src="assets/img/gallery/smallthumb2.jpg" alt="product details thumb">
                                </li>
                                <li class="owl-thumb-item">
                                    <img src="assets/img/gallery/smallthumb3.jpg" alt="product details thumb">
                                </li>
                            </ul>
                       </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->

    <!-- Brand Member Section Start -->
    <section class="member">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">
                            Band Members
                        </h2>
                        <p class="subtitle">
                            New Album Available Everywhere
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="memberBox">
                        <div class="img">
                            <img src="assets/img/team/01.jpg" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                Andrew Smith
                            </h3>
                            <p>
                                Lead Guitar, Bass Guitar
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="memberBox">
                        <div class="img">
                            <img src="assets/img/team/02.jpg" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                Jeremy Anderton
                            </h3>
                            <p>
                                Singer, Dancer
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="memberBox">
                        <div class="img">
                            <img src="assets/img/team/03.jpg" alt="">
                        </div>
                        <div class="info">
                            <h3>
                                Joe Walker
                            </h3>
                            <p>
                                Lead Vocals, Guitars
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Member Section End -->

    <!-- Concert Section Start -->
    <section class="concert">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title title2">
                            Upcomming Concert
                        </h2>
                        <p class="subtitle subtitle2">
                            New Album Available Everywhere
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tabilContainer table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>17 Mar</td>
                                    <td>Melbourne, AU @Rod_Laver_Arene</td>
                                    <td><a href="#">Sold Out</a></td>
                                </tr>
                                <tr>
                                    <td>27 Apr</td>
                                    <td>Washington, DC, USA @Capital_One_Arena</td>
                                    <td><a href="#">Buy Ticket</a></td>
                                </tr>
                                <tr>
                                    <td>29 May</td>
                                    <td>Huston, TX, USA @Arena_Theatre</td>
                                    <td><a href="#">Buy Ticket</a></td>
                                </tr>
                                <tr>
                                    <td>07 June</td>
                                    <td>Melbourne, AU @Arena_Theatre</td>
                                    <td><a href="#">Sold Out</a></td>
                                </tr>
                                <tr>
                                    <td>11 Aug</td>
                                    <td>Melbourne, AU @Capital_One_Arena</td>
                                    <td><a href="#">Buy Ticket</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Concert Section End -->


    <!-- Latest Blog area start  -->
    <section class="blog-area blog-bg" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">
                            Latest News
                        </h2>
                        <p class="subtitle">
                            New Album Available Everywhere
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <!-- single blog item -->
                        <div class="thumb">
                            <img src="assets/img/blog/01.jpg" alt="blog single image">
                        </div>
                        <div class="content">
                            <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                            <a href="#">
                                <h3 class="title">On am in nearer square wanted</h3>
                            </a>
                            <p>Now indulgence dissimilar for his thoroughly has terminated. Agreement offending
                                commanded my an. Change wholly say why eldest period.</p>
                            <a href="#" class="readmore">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="thumb">
                            <img src="assets/img/blog/02.jpg" alt="blog single image">
                        </div>
                        <div class="content">
                            <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                            <a href="#">
                                <h3 class="title">Blind would equal while oh mr do</h3>
                            </a>
                            <p>Now indulgence dissimilar for his thoroughly has terminated. Agreement offending
                                commanded my an. Change wholly say why eldest period.</p>
                            <a href="#" class="readmore">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-item">
                        <div class="thumb">
                            <img src="assets/img/blog/03.jpg" alt="blog single image">
                        </div>
                        <div class="content">
                            <span class="date"><i class="far fa-clock"></i> 14 Aug 2018</span>
                            <a href="#">
                                <h3 class="title">He my polite be object oh change my</h3>
                            </a>
                            <p>Now indulgence dissimilar for his thoroughly has terminated. Agreement offending
                                commanded my an. Change wholly say why eldest period.</p>
                            <a href="#" class="readmore">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog end  -->

    <!-- UP Coming Event Area Start -->
    <section class="ucevent">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">
                        Time left Until the Upcomming Event
                    </h2>
                    <p class="subtitle">
                        27 to 29 May 2019 with over 10 show - Cincinnati, Ohio
                    </p>
                    <span id="event1">
                    </span>
                    <a class="buybtn" href="#">
                        <p>Buy Ticket</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- UP Coming Event Area End -->


        <!--   JoinUS Section Start  -->
        <section class="joinus">
            <div class="container">
                <div class="row topArea">
                    <div class="col-md-12 col-lg-6">
                        <h3>
                            Join Our Community
                        </h3>
                        <p>
                            Music is an art form and cultural activity whose medium
                            will include common elements such as pitch ...
                        </p>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="joinform">
                            <form action="#" method="POST">
                                <input type="email" placeholder="Enter your mail">
                                <button class="submit" type="submit">JOIN NOW</button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <!--   JoinUS Section End  -->



    <!-- footer area start -->
@include('templates.landing.partials._footer')
       
    <!-- footer area end -->

    <!-- back to top start -->
    <div class="back-to-top">
        <!-- back to top start -->
        <i class="fas fa-rocket"></i>
    </div>
    <!-- back to top end -->

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- preloader area end -->

@include('templates.landing.partials._scripts')


</body>

</html>
