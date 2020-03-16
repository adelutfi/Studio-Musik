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
                                   <form action="blog-details.html" class="comments-entry-form mb-2">
                                      <div class="form-group">
                                          <label for="">Nama</label>
                                          <input type="text" class="form-control" placeholder="Masukan Nama anda">
                                      </div>
                                      <div class="form-group">
                                          <label for="">Email</label>
                                          <input type="email" class="form-control" placeholder="Masukan Email anda">
                                      </div>
                                      <div class="form-group">
                                            <label for="">Password</label>
                                          <input type="password" class="form-control" placeholder="Masukan password anda">
                                      </div>
                                      <div class="form-group">
                                          <label for="">Ulangi Password</label>
                                          <input type="password" class="form-control" placeholder="Konfirmasi Password anda">
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
                                        <button class="submit" type="submit">Register</button>
                                  </form>

                                  <a href="{{url('login')}}" style="display: block;" class="text-white">Sudah punya akun ?</a>
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
