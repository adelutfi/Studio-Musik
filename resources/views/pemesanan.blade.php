@extends('templates.landing.default')

@section('content')
<!-- <section class="breadcumb-area breadcrumb-bg">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcumb-inner">

                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="contact-area" >
      <div class="container">
        <!-- <form id="contactform" class="contact-form"> -->
          <div class="row">
              <div class="col-lg-7">
                <div class="right-content-area">
                     <h4 class="title">Data Pengguna</h4>
                         <div class="form-group">
                             <input type="text" name="nama" class="form-control" placeholder="Nama">
                         </div>
                         <div class="form-group">
                             <input type="text" name="email" class="form-control" placeholder="Email">
                         </div>
                         <div class="form-group">
                             <input type="text" name="no_telp" class="form-control" placeholder="No telephon">
                         </div>
                         <div class="form-group text-area">
                             <textarea class="form-control" rows="5" placeholder="Alamat" placeholder="Enter your message"></textarea>
                         </div>
                </div>

              </div>
              <div class="col-lg-5">
                <div class="left-content-area">
                    <h4 class="title">Studio</h4>
                    <ul class="info-list">
                        <li>
                           <div class="single-info-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                </div>
                                <div class="content">
                                    <span class="details">2523 Grand Avenue Orlando, FL 32803 <br/> New York , United States</span>
                                </div>
                           </div>
                        </li>
                        <li>
                          @php($start = now())
                           <div class="single-info-item">
                             <div class="row">
                               <div class="col-6 form-group">
                                <label>Tanggal</label>
                                <input class="date form-control" type="date" value="{{now()->format('Y-m-d')}}" onkeypress="return false;"
                                max="{{now()->addDays(14)->format('Y-m-d')}}" min="{{now()->format('Y-m-d')}}" />
                              </div>
                              <div class="col-3 form-group">
                                  <label>Waktu</label>
                                  <select class="form-control" name="">
                                    @for($hours = 8; $hours < 22; $hours++)
                                        @for($min = 0; $min < 60; $min+=30)
                                        <option value="">{{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}</option>
                                        @endfor
                                    @endfor
                                  </select>
                              </div>
                              <div class="col-3 form-group">
                                  <label>Durasi/Jam</label>
                                  <select class="form-control" id="durasi" name="durasi">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                  </select>
                              </div>
                            </div>
                           </div>
                        </li>
                        <li>
                           <div class="single-info-item">
                            <p class="mb-2">Alat Tambahan</p>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" data-harga="20000" name="tambahan[]" class="tambahan form-check-input" value="">
                                Piano Rp. 20.000
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" data-harga="10000" name="tambahan[]" class="tambahan form-check-input" value="">
                                Suling Rp 10.000
                              </label>
                            </div>
                           </div>
                        </li>
                        <li>
                           <div class="single-info-item">
                                <div class="icon">
                                  <img src="{{asset('public/assets/landing/img/money.png')}}" style="width: 20px" alt="">
                                </div>
                                <div class="content d-flex align-self-center">
                                        <div class="box align-self-center">
                                                <br>
                                                <span id="jumlah-awal" style="display: none;" data-jumlah="80000" class="details"></span>
                                                <span id="jumlah-akhir" data-jumlah="80000" class="details">Rp. 80.000</span>
                                        </div>
                                </div>
                           </div>
                        </li>
                        <li>
                           <div class="single-info-item">
                             <p>Pembayaran</p>
                             <div class="custom-control custom-radio custom-control-inline">
                             <input type="radio" value="alfamart" id="alfamart" name="pembayaran" class="custom-control-input">
                             <label class="custom-control-label" for="alfamart"> <img src="{{asset('public/alfamart.png')}}" width="70" alt=""> </label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" value="indomart" id="indomart" name="pembayaran" class="custom-control-input">
                           <label class="custom-control-label" for="indomart"> <img src="{{asset('public/indomart.png')}}"  width="70" alt=""></label>
                         </div>
                         <!-- <div class="custom-control custom-radio custom-control-inline">
                         <input type="radio" value="bayar-di-tempat" id="bayar-di-tempat" name="pembayaran" class="custom-control-input">
                         <label class="custom-control-label" for="bayar-di-tempat"><strong> Bayar Ditempat </strong></label>
                       </div> -->
                           </div>
                        </li>
                        <li>
                          <div class="single-info-item">
                              <button class="submit-btn" onclick="window.location='{{url("penyewaan")}}'">Simpan</button>
                          </div>
                        </li>
                    </ul>

                </div>
              </div>
          </div>
          <!-- </form> -->
      </div>
  </section>

  <script>
    const jumlahAwal = document.querySelector('#jumlah-awal');
    const jumlahAkhir = document.querySelector('#jumlah-akhir');
    const durasi = document.querySelector('#durasi');
    const tambahan = document.querySelectorAll('.tambahan');
    let totalAwal = +jumlahAwal.dataset.jumlah;
    let totalAkhir = +jumlahAkhir.dataset.jumlah;
    durasi.addEventListener('change', function(){
      totalAkhir = +totalAwal * +this.value
      tambahan.forEach(t => {
        if(t.checked){
          totalAkhir += +t.dataset.harga
        }
      })
      jumlahAkhir.innerText = 'Rp. '+rupiah(totalAkhir)
      jumlahAkhir.dataset.jumlah = totalAkhir
    })

    if (tambahan.length > 0) {
      tambahan.forEach(t => {
        t.addEventListener('change', function(){
          if(this.checked){
            totalAkhir = totalAkhir + +this.dataset.harga
            jumlahAkhir.innerText = 'Rp. '+rupiah(totalAkhir)
            jumlahAkhir.dataset.jumlah = totalAkhir
          }else if(!this.checked) {
            totalAkhir = totalAkhir - +this.dataset.harga
            jumlahAkhir.innerText = 'Rp. '+rupiah(totalAkhir)
            jumlahAkhir.dataset.jumlah = totalAkhir
          }
        })
      })
    }



    function rupiah(angka){
      var reverse = angka.toString().split('').reverse().join(''),
      ribuan = reverse.match(/\d{1,3}/g);
      ribuan = ribuan.join('.').split('').reverse().join('');
      return ribuan;
    }

  </script>

@endsection
