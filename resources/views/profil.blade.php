@extends('templates.landing.default')

@section('content')

<section class="contact-area" >
      <div class="container">
        <!-- <form id="contactform" class="contact-form"> -->
          <div class="row">
            
              <div class="col-lg-6">
                <div class="right-content-area">
                     <h4 class="title text-center">Data Diri</h4>
                        <form action="{{route('profil.update')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                     <div class="row">
                       <div class="col-3">
                         <img src="{{asset('public/'.Auth::user()->foto)}}" class="rounded-circle mb-3" alt="Foto" height="100" width="100">
                       </div>
                        <div class="col-9">
                           <div class="custom-file mt-5">
                          <input type="file" name="foto" class="custom-file-input" accept="image/jpeg,image/png,image/jpg">
                          <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                        </div>
                        </div>
                      </div>
                         <div class="form-group">
                          <label>Nama</label>
                             <input type="text" name="nama" value="{{Auth::user()->nama}}" class="form-control" placeholder="Nama" required="">
                         </div>
                         <div class="form-group">
                          <label>Email</label>
                             <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Nama" required="">
                         </div>
                         <div class="form-group">
                          <label>No Telepon</label>
                             <input type="tel" maxlength="13" minlength="11" name="no_telp"  value="{{Auth::user()->no_telp}}" class="form-control" placeholder="No Telephon" required="">
                         </div>
                         <div class="form-group text-area">
                          <div class="row">
                            <div class="col md-6">
                              <label>Alamat</label>    
                            </div>
                            <div class="col md-6 mb-2">
                              <button type="button" class="btn btn-primary btn-sm float-right" id="address"> <i class="fa fa-location-arrow" aria-hidden="true"></i> </button>    
                            </div>
                          </div>
                          
                             <textarea id="alamat" name="alamat" class="form-control" rows="5" placeholder="Alamat" required="">{{Auth::user()->alamat}}</textarea>
                         </div>

                         <h4>Tambahan untuk penyewaan alat</h4>
                          <div class="form-group">
                            <label>Upload Ktp Anda <span class="text-danger">(pilih gambar dengan benar karena gambar tidak bisa diubah)</span></label>
                           <div class="custom-file">
                          <input type="file" name="ktp" class="custom-file-input" accept="image/jpeg,image/png,image/jpg">
                          <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar</label>
                        </div>
                         </div>
                         <div class="text-center">
                         <button type="submit" class="submit-btn">Simpan</button>
                         </div>
                      </form>
                </div>
              </div>
              <div class="col-lg-6">
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
              </div>
          </div>
          <!-- </form> -->
      </div>
  </section>
@endsection
@section('script')
  <script type="text/javascript">
    $("#address").click(function () { //user clicks button
  if ("geolocation" in navigator){ //check geolocation available 
    navigator.geolocation.getCurrentPosition(async function(position){ 
      const pos = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${position.coords.longitude},${position.coords.latitude}.json?types=poi&access_token=pk.eyJ1IjoiYWRlbHV0ZmkiLCJhIjoiY2tiN2ZhazUwMDUwdzJxcGlsOXZ6c3g0YyJ9.L3bSsEiImljFjm-YwjN48Q`)
      .then(res => res.json()).then(res => res.features[0]);
      const jl = pos.properties.address;
      const desa = "Desa "+pos.context[0].text;
      const Kecamatan = "Kecamatan "+pos.context[1].text;
      const Kabupaten = pos.context[3].text;
      const kode_pos = pos.context[2].text;
      
      $('#alamat').val(`${jl}, ${desa}, ${Kecamatan}, ${Kabupaten}, ${kode_pos}`)
      })
  }else{
    console.log("Browser doesn't support geolocation!");
  }
});
  </script>
@endsection