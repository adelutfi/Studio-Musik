@extends('templates.studio.default')

@section('navbar')
    @include('templates.studio.partials._navbar')
@endsection

@section('sidebar')
    @include('templates.studio.partials._sidebar')
@endsection

@section('content')
<div class="content-header row">
  <div class="content-header-left col-md-12 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-6">
        <h2 class="content-header-title float-left mb-0">Data Profil</h2>
      </div>
    </div>
  </div>
</div>
<section id="page-account-settings">
  <div class="row">
    <!-- left menu section -->
    <div class="col-md-3 mb-2 mb-md-0">
      <ul class="nav nav-pills flex-column mt-md-0 mt-1">
        <li class="nav-item">
          <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
            href="#account-vertical-general" aria-expanded="true">
            <i class="feather icon-globe mr-50 font-medium-3"></i>
            Umum
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info"
            aria-expanded="false">
            <i class="feather icon-info mr-50 font-medium-3"></i>
            Pribadi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
            href="#account-vertical-password" aria-expanded="false">
            <i class="feather icon-lock mr-50 font-medium-3"></i>
            Ganti Password
          </a>
        </li>
      </ul>
    </div>
    <!-- right content section -->

    <div class="col-md-9">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                aria-labelledby="account-pill-general" aria-expanded="true">
              <form action="{{route('pemilik.update.profil')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="media">
                  <a href="javascript: void(0);">
                    <img src="{{asset('public/'.Auth::user()->foto)}}" class="rounded mr-75"
                      alt="profile image" height="64" width="64">
                  </a>
                  <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                      <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                        for="account-upload">Upload foto baru</label>
                      <input type="file" name="foto" id="account-upload" accept="image/jpeg,image/png,image/jpg" hidden>
                    </div>
                    <p class="text-dark ml-75 mt-50"><small> JPG,PNG, JPEG. Max 1MB</small></p>
                  </div>
                </div>
                <hr>

                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-username">Nama</label>
                          <input type="text" class="form-control" name="nama" placeholder="Masukan nama anda" value="{{Auth::user()->nama}}" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-username">Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Masukan email anda" value="{{Auth::user()->email}}" required>
                        </div>
                      </div>
                    </div>
                    @if(!Auth::user()->verifikasi_email)
                    <div class="col-12">
                      <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <p class="mb-0">
                          Your email is not confirmed. Please check your inbox.
                        </p>
                        <a href="javascript: void(0);">Resend confirmation</a>
                      </div>
                    </div>
                    @endif
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-username">Alamat</label>
                          <textarea name="alamat" class="form-control" rows="4" cols="80">{{Auth::user()->alamat}}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-start">
                      <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info"
              aria-expanded="false">
              <form action="{{route('pemilik.update.personal')}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="accountTextarea">No Telepon</label>
                      <input type="tel" name="no_telp" class="form-control" minlength="11" maxlength="13" value="{{Auth::user()->no_telp}}" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <div class="controls">
                        <label for="account-birth-date">No Rekening</label>
                        <input type="tel" name="no_rek" class="form-control" minlength="16" maxlength="16" value="{{Auth::user()->no_rek}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-start">
                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                  </div>
                </div>
              </form>
            </div>

              <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                aria-labelledby="account-pill-password" aria-expanded="false">
                <form novalidate>
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-old-password">Old Password</label>
                          <input type="password" class="form-control" id="account-old-password" required
                            placeholder="Old Password"
                            data-validation-required-message="This old password field is required">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-new-password">New Password</label>
                          <input type="password" name="password" id="account-new-password" class="form-control"
                            placeholder="New Password" required
                            data-validation-required-message="The password field is required" minlength="6">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-retype-new-password">Retype New
                            Password</label>
                          <input type="password" name="con-password" class="form-control" required
                            id="account-retype-new-password" data-validation-match-match="password"
                            placeholder="New Password"
                            data-validation-required-message="The Confirm password field is required" minlength="6">
                        </div>
                      </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-start">
                      <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
