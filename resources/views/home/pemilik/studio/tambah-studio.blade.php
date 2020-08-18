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
        <h2 class="content-header-title float-left mb-0">Tambah Studio</h2>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-12">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
          <form class="form form-vertical" action="{{route('pemilik.simpan.studio')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-body">
                  <div class="row">
                      <div class="col-12">
                          <div class="form-group">
                              <label for="first-name-icon"><h4>Nama Studio</h4></label>
                              <div class="position-relative has-icon-left">
                                  <input type="text" class="form-control form-control-lg" value="{{old('nama')}}" maxlength="30" minlength="5" name="nama" placeholder="" required>
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
                                  <textarea class="form-control form-control-lg" minlength="10" name="alamat" rows="4" placeholder="" required>{{old('alamat')}}</textarea>
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
                                  <textarea class="form-control form-control-lg" minlength="10" name="fasilitas" rows="10" placeholder="" required>{{old('fasilitas')}}</textarea>
                                  <div class="form-control-position">
                                  <i class="feather icon-book-open"></i>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label for="first-name-icon"><h4>Gambar</h4></label>
                              <div class="position-relative has-icon-left">
                                <div class="custom-file">
                                        <input id="gambar" type="file" class="custom-file-input" onchange="checkImage(this)" name="gambar" accept="image/jpeg,image/png,image/jpg" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                        <small class="text-dark">Gambar harus JPG,JPEG,PNG Maksimal 2 MB</small>
                                        <small id="message" class="text-danger"></small>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                    <div class="col-12">
                      <button type="submit" id="simpan" class="btn btn-primary mr-1 mb-1" disabled>Simpan</button>
                      <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Kembali</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
  <script type="text/javascript">
    const gambar = document.querySelector('#gambar');
    const simpan = document.querySelector('#simpan');
    const message = document.querySelector('#message');
    const maxfilesize = 2048 * 1024;

    function checkImage(e){
      const file = e.files[0];

      if(file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png'){
          if(+file.size > maxfilesize){
            gambar.classList.add('is-invalid');
            message.innerText = "Gambar yang anda masukan terlalu besar";
            simpan.disabled = true;
          }else {
            message.innerText = '';
            gambar.classList.remove('is-invalid');
            gambar.classList.add('is-valid');
            simpan.disabled = false
          }
      }else {
        simpan.disabled = true
        gambar.classList.add('is-invalid');
        message.innerText = "Gambar yang anda masukan tidak sesuai";
      }
    }
  </script>
@endsection
