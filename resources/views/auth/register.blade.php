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
                            @if(Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                            @endif
                        </h2>
                        <div class="row justify-content-center">
                          <div class="col-lg-4">
                              <div class="tabilContainer table-responsive">
                              	 <div class="comment-form-area">
                                   <form action="{{route('user.register')}}" class="comments-entry-form mb-2" method="post">
                                     @csrf
                                      <div class="form-group">
                                          <label for="">Nama</label>
                                          <input type="text" name="nama" value="{{old('nama')}}" class="form-control" placeholder="Masukan Nama anda" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="">Email</label>
                                          <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Masukan Email anda" required>
                                      </div>
                                      <div class="form-group">
                                            <label for="">Password</label>
                                          <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Masukan password anda" required>
                                          @if ($errors->has('password'))
                                          <span class="invalid-feedback text-white" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                          @endif
                                      </div>
                                      <div class="form-group">
                                          <label for="">Ulangi Password</label>
                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password anda" required>
                                      </div>
                                      <div class="form-group">
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="pemilik" id="pemilik" name="keterangan" class="custom-control-input" required>
                                        <label class="custom-control-label" for="pemilik"><strong>Pemilik</strong></label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" value="penyewa" id="penyewa" name="keterangan" class="custom-control-input" required>
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
