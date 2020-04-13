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
                                   <form action="{{route('user.login')}}" method="post" class="comments-entry-form mb-3">
                                     @csrf
                                      <div class="form-group">
                                          <label for=""><strong>Email</strong></label>
                                          <input name="email" type="email" class="form-control" placeholder="Masukan Email anda">
                                      </div>
                                      <div class="form-group">
                                            <label for=""><strong>Password</strong></label>
                                          <input name="password" type="password" class="form-control" placeholder="Masukan password anda">
                                      </div>
                                      <div class="form-group">
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="pemilik" id="pemilik" name="keterangan" class="custom-control-input">
                                        <label class="custom-control-label" for="pemilik"><strong>Pemilik</strong></label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="penyewa" id="penyewa" name="keterangan" class="custom-control-input">
                                        <label class="custom-control-label" for="penyewa"><strong>Penyewa</strong></label>
                                      </div>
                                    </div>
                                      <button class="submit" type="submit">Login</button>
                                  </form>

                                  <a href="#" class="text-white">Lupa password ?</a>
                                  <a href="{{url('register')}}" style="display: block;" class="text-white">Belum punya akun ?</a>
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
