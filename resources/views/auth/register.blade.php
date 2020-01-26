@extends('templates.landing.default')

@section('content')
 <section class="concert">
        <div class="overlay"></div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title title2">
                            Register
                        </h2>
                        <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="tabilContainer table-responsive">
                    	 <div class="comment-form-area">
                         <form action="blog-details.html" class="comments-entry-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Masukan Nama anda">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Masukan Email anda">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Masukan password anda">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Konfirmasi Password anda">
                            </div>
                         
                            <button type="submit" class="submit-btn">Register</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection