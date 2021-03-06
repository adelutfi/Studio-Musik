
@extends('templates.landing.default')

@section('content')

<section class="contact-area" >
      <div class="container">
        <!-- <form id="contactform" class="contact-form"> -->
          <div class="row mt-5">
              <div class="col-lg-12">
                <div class="right-content-area">
                     <h4 class="title text-center">Data Diri
                       {!!Auth::user()->konfirmasi_ktp ? '<i class="fa fa-check text-primary" aria-hidden="true"></i>' : '' !!}
                     </h4>
                     @if($errors->all())
                     <div class="col-12">
                         <div class="alert alert-danger" role="alert">
                           <i class="fas fa-exclamation-circle"></i>
                               <strong>Gagal!</strong> Profil gagal diubah
                         </div>
                     </div>
                     @endif
                     @if(Session::has('success'))
                     <div class="col-12">
                         <div class="alert alert-success" role="alert">
                           <i class="fas fa-exclamation-circle"></i>
                               <strong>Berhasil!</strong> {{Session::get('success')}}
                         </div>
                     </div>
                     @endif
                        <form action="{{route('profil.update')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                     <div class="row">
                       <div class="col-3">
                         @if(Auth::user()->foto)
                         <img src="{{asset('public/'.Auth::user()->foto)}}" class="rounded-circle mb-3" alt="Foto" height="100" width="100">
                         @else
                         <img src="{{ asset('public/gambar/foto.png')}}" class="rounded-circle mb-3" alt="Foto" height="100" width="100">
                         @endif
                       </div>
                        <div class="col-9">
                           <div class="custom-file mt-5">
                          <input type="file" id="foto" name="foto" onchange="checkImage(this)" class="custom-file-input{{ $errors->has('foto') ? ' is-invalid border border-danger' : '' }}" accept="image/jpeg,image/png,image/jpg">
                          <label id="file-name" class="custom-file-label" for="validatedCustomFile">Pilih Foto</label>
                          <div class="mt-2">
                            <strong>Gambar harus JPG,JPEG,PNG Maksimal 1 MB</strong><br>
                            <strong class="text-danger" id="message"></strong>
                          </div>
                          @if ($errors->has('foto'))
                          <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $errors->first('foto') }}</strong>
                          </span>
                          @endif
                        </div>
                        </div>
                      </div>
                         <div class="form-group">
                          <label>Nama</label>
                             <input type="text" onkeyup="onLetters(this)" name="nama" value="{{old('nama',Auth::user()->nama)}}" class="form-control{{ $errors->has('nama') ? ' is-invalid border border-danger' : '' }}" placeholder="Nama" required="">
                             @if ($errors->has('nama'))
                             <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('nama') }}</strong>
                             </span>
                             @endif
                         </div>
                         <div class="form-group">
                          <label>Email</label>
                             <input onkeyup="onEmail(this)" type="email" name="email" value="{{old('email',Auth::user()->email)}}" class="form-control{{ $errors->has('email') ? ' is-invalid border border-danger' : '' }}" placeholder="Email" required="">
                             <span class="invalid-feedback text-danger" role="alert">
                               <strong id="email-message"></strong>
                             </span>
                            @if ($errors->has('email'))
                             <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('email') }}</strong>
                             </span>
                             @endif
                         </div>
                         <div class="form-group">
                          <label>No Telepon</label>
                             <input type="tel" onkeyup="onNumbers(this)" maxlength="13" minlength="11" name="no_telp"  value="{{old('no_telp',Auth::user()->no_telp)}}" class="form-control{{ $errors->has('no_telp') ? ' is-invalid border border-danger' : '' }}" placeholder="No Telephon" required="">
                             @if ($errors->has('no_telp'))
                             <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('no_telp') }}</strong>
                             </span>
                             @endif
                         </div>
                         <div class="form-group text-area">
                          <div class="row">
                            <div class="col md-6">
                              <label>Alamat</label>
                            </div>
                          </div>
                             <textarea id="alamat" name="alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid border border-danger' : '' }}" rows="5" placeholder="Alamat" required="">{{old('alamat',Auth::user()->alamat)}}</textarea>
                             @if ($errors->has('alamat'))
                             <span class="invalid-feedback text-danger" role="alert">
                               <strong>{{ $errors->first('alamat') }}</strong>
                             </span>
                             @endif
                         </div>
                         @if(Auth::user()->konfirmasi_ktp == 0)
                         <h4>Tambahan untuk penyewaan alat</h4>
                          <div class="form-group">
                            <label>Upload Ktp Anda <span class="text-danger">(pilih gambar dengan benar karena gambar tidak bisa diubah)</span></label>
                           <div class="custom-file">
                          <input type="file" name="ktp" class="custom-file-input{{ $errors->has('ktp') ? ' is-invalid border border-danger' : '' }}" accept="image/jpeg,image/png,image/jpg">
                          <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                          @if ($errors->has('ktp'))
                          <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $errors->first('ktp') }}</strong>
                          </span>
                          @endif
                          </div>
                         </div>
                         @endif
                    <div class="text-center">
                            <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                </div>
              </div>
              <!-- <div class="col-lg-6">
                  <div class="right-content-area">
                  <form>
                    <h4 class="title text-center">Ubah Password</h4>
                         <div class="form-group mt-5">
                             <input type="password" name="password_lama" class="form-control" placeholder="Password lama">
                         </div>
                         <div class="form-group">
                             <input type="password" name="password_baru" class="form-control" placeholder="Password baru">
                         </div>
                         <div class="form-group">
                             <input type="password" name="" class="form-control" placeholder="Ulangi password baru">
                         </div>
                         <div class="text-center">
                         <button class="submit-btn">Simpan</button>
                         </div>
                      </form>


                </div>
              </div> -->
          </div>
          <!-- </form> -->
      </div>
  </section>
@endsection
@section('script')
<script type="text/javascript">
  const foto = document.querySelector('#foto');
  const simpan = document.querySelector('#simpan');
  const message = document.querySelector('#message');
  const fileName = document.querySelector('#file-name');
  const emailMessage = document.querySelector('#email-message');

  const maxfilesize = 1024 * 1024;

function onEmail(e){
  const RegExpression = /^[a-zA-Z0-9@.\s]*$/;
  const valid = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(!RegExpression.test(e.value)){
    e.value = e.value.replace(/[-!#$%^&*()_+|~=`{}\[\\\]:";'<>?,\/]/, "");
  }else if(!valid.test(e.value)){
    simpan.disabled = true;
    e.classList.add('is-invalid');
    emailMessage.innerText = "Masukan email dengan benar";
  }else{
    e.classList.remove('is-invalid');
    e.classList.add('is-valid');
    simpan.disabled = false
  }
}

function onLetters(e) {
  const RegExpression = /^[a-zA-Z\s]*$/;
  if(!RegExpression.test(e.value)){
    e.value = e.value.replace(/[0-9-!@$%^&*()_+|~=`{}\[\\\]:";'<>?,.\/]/, "");
  }
}

function onNumbers(e) {
  const RegExpression = /^[0-9]+$/;
  if(!RegExpression.test(e.value)){
    e.value = e.value.replace(/[a-zA-Z\s-!@$%^&*()_+|~=`{}\[\\\]:";'<>?,.\/]/, "");
  }
}

  function checkImage(e){
    const file = e.files[0];
    // console.log(file);
    if(file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png'){
        if(+file.size > maxfilesize){
          message.innerText = "Gambar yang anda masukan terlalu besar";
          simpan.disabled = true;
          fileName.innerText = file.name;
          foto.classList.add('is-invalid');
        }else {
          message.innerText = '';
          foto.classList.remove('is-invalid');
          foto.classList.add('is-valid');
          simpan.disabled = false;
          fileName.innerText = file.name;
        }
    }else {
      simpan.disabled = true;
      foto.classList.add('is-invalid');
      fileName.innerText = file.name;
      message.innerText = "Gambar yang anda masukan tidak sesuai";
    }
  }
</script>

@endsection
