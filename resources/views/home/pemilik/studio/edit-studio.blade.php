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
        <h2 class="content-header-title float-left mb-0">Edit Studio</h2>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-12">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
          <form class="form form-vertical" action="{{route('pemilik.update.studio', $studio)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
              <div class="form-body">
                  <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                              <label for="first-name-icon"><h4>Nama Studio</h4></label>
                              <div class="position-relative has-icon-left">
                                  <input type="text" class="form-control form-control-lg" maxlength="30" minlength="5" value="{{old('nama',$studio->nama)}}" name="nama" placeholder="" required>
                                  <div class="form-control-position">
                                  <i class="feather icon-bookmark"></i>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group">
                              <label for="first-name-icon"><h4>Alamat</h4></label>
                              <div class="position-relative has-icon-left">
                                  <textarea class="form-control form-control-lg" minlength="10" name="alamat" rows="4" placeholder=""  required>{{old('alamat',$studio->alamat)}}</textarea>
                                  <div class="form-control-position">
                                  <i class="feather icon-map-pin"></i>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <div class="form-group">
                              <label for="first-name-icon"><h4>Fasilitas</h4></label>
                              <div class="position-relative has-icon-left">
                                  <textarea class="form-control form-control-lg" minlength="10" name="fasilitas" rows="10" placeholder="" required>{{old('fasilitas',$studio->fasilitas)}}</textarea>
                                  <div class="form-control-position">
                                  <i class="feather icon-book-open"></i>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <img src="{{asset('public/'.$studio->gambar)}}" width="300" height="300" alt="">
                        </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label for="first-name-icon"><h4>Gambar</h4></label>
                              <div class="position-relative has-icon-left">
                                <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" accept="image/jpeg,image/png,image/jpg">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        <small>Gambar Maksimal 2 MB</small>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                    <div class="col-12">
                      <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Kembali</button>
                      <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
