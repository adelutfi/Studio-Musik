@extends('templates.landing.default')

@section('content')
 <section class="concert">
        <div class="overlay"></div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title title2">Register</h2>
                        <div class="row justify-content-center">
                          @if($errors->all())
                          <div class="col-4">
                            <div class="alert alert-danger" role="alert">
                              <i class="fas fa-exclamation-circle"></i>
                                  <strong>Gagal!</strong> Registrasi tidak berhasil
                            </div>
                          </div>
                          @endif
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-lg-4">
                              <div class="tabilContainer table-responsive">
                              	 <div class="comment-form-area">
                                   <form action="{{route('penyewa.register')}}" class="comments-entry-form mb-2" method="post">
                                     @csrf
                                      <div class="form-group">
                                          <label for="">Nama</label>
                                          <input type="text" name="nama" value="{{old('nama')}}" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="Masukan Nama anda" required>
                                          @if ($errors->has('nama'))
                                          <span class="invalid-feedback text-white" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                          </span>
                                          @endif
                                      </div>
                                      <div class="form-group">
                                          <label for="">Email</label>
                                          <input type="email" name="email" value="{{old('email')}}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Masukan Email anda" required>
                                          @if ($errors->has('email'))
                                          <span class="invalid-feedback text-white" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                          @endif
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
