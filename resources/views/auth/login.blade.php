@extends('templates.landing.default')

@section('content')
 <section class="concert">
        <div class="overlay"></div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title title2">
                            Login
                        </h2>
                        <div class="row justify-content-center">
                          <div class="col-lg-4">
                              <div class="tabilContainer table-responsive">
                              	 <div class="comment-form-area">
                                   <form action="" class="comments-entry-form">
                                      <div class="form-group">
                                          <label for=""><strong>Email</strong></label>
                                          <input type="email" class="form-control" placeholder="Masukan Email anda">
                                      </div>
                                      <div class="form-group">
                                            <label for=""><strong>Password</strong></label>
                                          <input type="password" class="form-control" placeholder="Masukan password anda">
                                      </div>

                                      <button class="submit" type="submit">Login</button>
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
