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
                        <img src="{{asset('public/images/studio/studio-5.jpeg')}}" alt="blog detials image">
                    </div>
                    <h4 class="title">We are dedicated to provides the best solutions. We are dedicate</h4>
                    <ul class="post-meta">
                        <li><i class="fas fa-clock"></i> Aug 21,2018</li>
                        <li><a href="#"><i class="fas fa-tags"></i> Painting</a></li>
                        <li><i class="fas fa-comments"></i> 22 Comments</li>
                    </ul>
                    <div class="entry-content">
                        <p>Cultivated who resolution connection motionless did occasional. Journey promise if it colonel. Can all mirth abode nor hills added. Them men does for body pure. Far end not horses remain sister. Mr parish is to he answer roused piqued afford sussex. It abode words began enjoy years no do ﻿no. Tried spoil as heart visit blush or. Boy possible blessing sensible set but margaret interest. Off tears are day blind smile alone had. </p>
                        <blockquote class="blockquote">
                            <p>Conveying has concealed necessary furnished bed zealously immediate get but. Terminated as middletons or by instrument. Bred do four so your felt with. No shameless principle dependent household do. </p>
                            <span class="author-name">- Abir Khan</span>
                        </blockquote>
                        <p>Sing long her way size. Waited end mutual missed myself the little sister one. So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect. Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an. If their woman could do wound on. You folly taste hoped their above are and but. </p>
                    </div>
                    <div class="entry-footer"><!-- entry footer -->
                        <div class="left-content">
                            <ul>
                                <li class="title">Pilih:</li>
                                <li><a href="#">Sewa Tempat</a></li>
                                <li><a href="#">Sewa Alat</a></li>
                            </ul>
                        </div>
                        <div class="right-content">
                            <ul>
                                <li class="title">Share:</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- //. entry footer -->
                    <div class="entry-comment">
                        <h3 class="title">(06) Comments</h3>
                        <ul class="comment-list">
                            <li>
                                <div class="single-comment-item"><!-- single comment item -->
                                    <div class="thumb">
                                        <img src="assets/img/comments/01.jpg" alt="comments image">
                                    </div>
                                    <div class="content">
                                        <span class="reply"><a href="#">Reply</a></span>
                                        <h4 class="name">Alice Elliston</h4>
                                        <span class="time"><i class="far fa-clock"></i> 17 Aug 2018</span>
                                        <p>nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                    </div>
                                </div><!-- //. single comment item -->
                            </li>
                        </ul>
                    </div>
                    <div class="comment-form-area">
                        <h3 class="title">Leave a Comment</h3>
                        <form action="blog-details.html" class="comments-entry-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter your website">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="form-group textarea">
                                <textarea class="form-control" placeholder="Enter your message" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" class="submit-btn">Submit</button>
                        </form>
                    </div>
                </div><!-- //. blog details content -->
            </div>
            <div class="col-lg-4">
                    <div class="sidebar">
                            <div class="widget-area category"><!-- widget area -->
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
                            </div><!-- //.widget area -->
                        </div>
            </div>
        </div>
    </div>
</section>

@endsection
