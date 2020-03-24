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
        <form id="contactform" class="contact-form">
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
                           <div class="single-info-item">
                                <div class="icon">
                                  <img src="{{asset('public/assets/landing/img/money.png')}}" style="width: 20px" alt="">
                                </div>
                                <div class="content d-flex align-self-center">
                                        <div class="box align-self-center">
                                                <br>
                                                <span id="jumlah" data-jumlah="80000" class="details">Rp. 80.000</span>
                                        </div>
                                </div>
                           </div>
                        </li>
                        <li>
                           <div class="single-info-item">
                            <p>Alat Tambahan</p>
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
                              <button class="submit-btn">Simpan</button>
                          </div>
                        </li>
                    </ul>

                </div>
              </div>
          </div>
          </form>
      </div>
  </section>

  <script>
    const jumlah = document.querySelector('#jumlah');
    const tambahan = document.querySelectorAll('.tambahan');
    if (tambahan.length > 0) {
      tambahan.forEach(t => {
        t.addEventListener('change', function(){
          let total = +jumlah.dataset.jumlah;
          if(this.checked){
            total = +this.dataset.harga + total
            jumlah.innerText = 'Rp. '+rupiah(total)
            jumlah.dataset.jumlah = total
          }else if(!this.checked) {
            total = total - +this.dataset.harga
            jumlah.innerText = 'Rp. '+rupiah(total)
            jumlah.dataset.jumlah = total
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
