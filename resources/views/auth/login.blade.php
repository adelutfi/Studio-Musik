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
                          @if(Session::has('failed'))
                          <div class="col-4">
                            <div class="alert alert-danger" role="alert">
                              <i class="fas fa-exclamation-circle"></i>
                                  <strong>Login Gagal</strong> {{Session::get('failed')}}
                            </div>
                          </div>
                          @endif
                          @if(Session::has('success'))
                          <div class="col-4">
                            <div class="alert alert-success" role="alert">
                              <i class="fas fa-check-circle"></i>
                                  {{Session::get('success')}}
                                  <p>Silahkan cek email anda</p>
                            </div>
                          </div>
                          @endif
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-4">
                              <div class="tabilContainer table-responsive">
                              	 <div class="comment-form-area">
                                   <form action="{{route('penyewa.login')}}" method="post" class="comments-entry-form mb-3">
                                     @csrf
                                      <div class="form-group">
                                          <label for=""><strong>Email</strong></label>
                                          <input name="email" type="email" class="form-control" value="{{old('email')}}" placeholder="Masukan Email anda" required>
                                      </div>
                                      <div class="form-group">
                                            <label for=""><strong>Password</strong></label>
                                          <input name="password" type="password" class="form-control" placeholder="Masukan password anda" required>
                                      </div>
                                      <button class="submit" type="submit">Login</button>
                                  </form>

                                  <!-- <a href="{{route('penyewa.lupa-password')}}" class="text-white">Lupa password ?</a> -->
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
