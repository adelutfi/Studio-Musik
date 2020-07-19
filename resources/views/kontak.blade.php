@extends('templates.landing.default')

@section('content')
<section class="breadcumb-area breadcrumb-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-inner">
                        <h2 class="title">Kontak</h2>
                        <div class="row">
                          <div class="col-12 col-md-6 mb-5">
                            <ul class="page-lists">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li><a class="active" href="">Kontak</a></li>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-area" >
       <div class="container">
           <div class="row">
               <div class="col-lg-5">
                   <div class="left-content-area">
                       <h4 class="title">Studio Musik Tegal</h4>
                       <ul class="info-list">
                           <li>
                              <div class="single-info-item">
                                   <div class="icon">
                                       <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                   </div>
                                   <div class="content">
                                       <span class="details">2523 Grand Avenue Orlando, FL 32803 <br/> New York , United States</span>
                                   </div>
                              </div>
                           </li>
                           <li>
                              <div class="single-info-item">
                                   <div class="icon">
                                       <i class="fas fa-clock" aria-hidden="true"></i>
                                   </div>
                                   <div class="content d-flex align-self-center">
                                           <div class="box align-self-center">
                                                   <span class="details">Sunday - Friday</span>
                                                   <span class="details">10AM - 8PM</span>
                                           </div>
                                   </div>
                              </div>
                           </li>
                           <li>
                              <div class="single-info-item">
                                   <div class="icon">
                                       <i class="fa fa-envelope" aria-hidden="true"></i>
                                   </div>
                                   <div class="content">
                                       <span class="details">contact@Benteria.com</span>
                                       <span class="details">support@Benteria.com</span>
                                   </div>
                              </div>
                           </li>
                           <li>
                              <div class="single-info-item">
                                   <div class="icon">
                                       <i class="fa fa-phone" aria-hidden="true"></i>
                                   </div>
                                   <div class="content">
                                       <span class="details">+111 222 333 444</span>
                                       <span class="details">+111 222 333 444</span>
                                   </div>
                              </div>
                           </li>
                       </ul>
                   </div>
               </div>
               <!-- <div class="col-lg-7">
                  <div class="right-content-area">
                       <h4 class="title">Connect with Us</h4>
                       <form id="contactform" class="contact-form">
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter your name">
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter your subject">
                           </div>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter your email">
                           </div>
                           <div class="form-group text-area">
                               <textarea class="form-control" rows="5" placeholder="Enter your message"></textarea>
                           </div>
                           <div class="submit-box">
                               <button class="submit-btn">Submit</button>
                           </div>
                       </form>
                  </div>
               </div> -->
           </div>
       </div>
   </section>


@endsection
