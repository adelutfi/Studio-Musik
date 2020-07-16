@extends('templates.landing.default')

@section('content')
<style media="screen">
.borderless td, .borderless th {
  border: none;
}

</style>
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
        <form action="{{$keterangan == 'sewa-tempat' ? route('simpan.pemesanan.tempat', $studio) : ''}}" method="post" class="contact-form">
          @csrf
          <div class="row">
              <div class="col-lg-5">
                <div class="right-content-area">
                     <h4 class="title text-center">Data Pemesan </h4>
                         <div class="form-group">
                             <input type="text" name="nama" value="{{Auth::user()->nama}}" class="form-control" placeholder="Nama" required>
                         </div>
                         <div class="form-group">
                             <input type="text" name="no_telp"  value="{{Auth::user()->no_telp}}" class="form-control" placeholder="No Telephon" required>
                         </div>
                         <div class="form-group text-area">
                             <textarea class="form-control" rows="5" placeholder="Alamat" required> {{Auth::user()->alamat}}</textarea>
                         </div>
                </div>

              </div>
              <div class="col-lg-7">
                <div class="left-content-area">
                    <h5 class="title text-center">Studio {{$keterangan === 'sewa-alat' ? 'Sewa Alat' : 'Sewa Tempat'}}</h5>
                    <h4 class="text-center">{{$studio->nama}}</h4>
                    <h4 class="text-center mb-2">{{$studio->alamat}}</h4>
                    <div class="text-center">
                      @if($keterangan == 'sewa tempat')
                        @foreach($jadwal as $j)
                        <h4 style="display: inline-block"><span class="badge badge-primary">{{$j}}</span></h4>
                        @endforeach
                      @endif
                    </div>

                    <ul class="info-list mt-5">
                      @if($keterangan == 'sewa-tempat')
                        <li>
                          @php($start = now())
                           <div class="single-info-item">
                             <div class="row">
                               <div class="col-6 col-md-4 form-group">
                                <label>Hari & Tanggal</label>
                                <input type="text" class="form-control" id="datepicker-13" name="tanggal" value="" placeholder="Pilih Tanggal" required>
                              </div>
                              <div class="col-6 col-md-3 form-group">
                                  <label>Waktu</label>
                                  <select class="form-control" name="waktu" disabled required></select>
                              </div>
                              <div class="col-6 col-md-3 form-group">
                                  <label>Durasi/Jam</label>
                                  <select class="form-control" name="durasi" disabled required></select>
                              </div>
                              <div class="col-6 col-md-2 form-group">
                                  <label>Ruangan</label>
                                  <select class="form-control" id="durasi" name="ruangan" required disabled>
                                    @for($i = 1; $i <= $studio->sewaTempat->jumlah_ruangan; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                  </select>
                              </div>
                              <div class="col-12">
                                <p id="keterangan-jadwal" style="display: none">  </p>
                              </div>
                            </div>
                           </div>
                        </li>
                        <li>
                          <table class="table table-sm borderless">
                            <tbody>
                              <tr>
                                <td><h4>Harga / jam </h4></td>
                                <td> <h4>: Rp. {{number_format($studio->sewaTempat->harga,0,',','.')}}</h4> </td>
                              </tr>
                              <tr>
                                <td><h4>Durasi </h4></td>
                                <td> <h4>: <span id="total-durasi">1</span> Jam</h4> </td>
                              </tr>
                              <tr>
                                <td><h4>Total </h4></td>
                                <td> <h4>: Rp. <span id="total-harga">{{number_format($studio->sewaTempat->harga,0,',','.')}}</span> </h4> </td>
                              </tr>
                            </tbody>
                          </table>
                        </li>
                        @else
                        <li>
                          @php($start = now())
                           <div class="single-info-item">
                             <div class="row">
                               <div class="col-6 col-md-4 form-group">
                                <label>Tanggal Mulai</label>
                                <input type="text" class="form-control" id="datepicker-13" name="tanggal" value="" placeholder="Pilih Tanggal" required>
                              </div>
                               <div class="col-6 col-md-4 form-group">
                                <label>Tanggal Selesai</label>
                                <input type="text" class="form-control" id="datepicker-14" name="tanggal" value="" placeholder="Pilih Tanggal" disabled required>
                              </div>

                              <div class="col-12">
                                <p id="keterangan-jadwal" style="display: none">  </p>
                              </div>
                            </div>
                           </div>
                        </li>
                        <li>
                          <table class="table table-sm borderless">
                            <tbody>
                              <tr>
                                <td><h4>Harga / jam </h4></td>
                                <td> <h4>: Rp. {{number_format($studio->sewaAlat->harga,0,',','.')}}</h4> </td>
                              </tr>
                              <tr>
                                <td><h4>Durasi </h4></td>
                                <td> <h4>: <span id="total-durasi">1</span> Hari</h4> </td>
                              </tr>
                              <tr>
                                <td><h4>Total </h4></td>
                                <td> <h4>: Rp. <span id="total-harga">{{number_format($studio->sewaAlat->harga,0,',','.')}}</span> </h4> </td>
                              </tr>
                            </tbody>
                          </table>
                        </li>
                        @endif
                        <li>
                           <div class="single-info-item">
                             <h5 class="mb-2">Pembayaran</h5>
                             <div class="custom-control custom-radio custom-control-inline">
                             <input type="radio" value="alfamart" id="alfamart" name="pembayaran" class="custom-control-input" required>
                             <label class="custom-control-label" for="alfamart"> <img src="{{asset('public/alfamart.png')}}" width="70" alt=""> </label>
                           </div>
                           <div class="custom-control custom-radio custom-control-inline">
                           <input type="radio" value="indomart" id="indomart" name="pembayaran" class="custom-control-input" required>
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
                              <button class="submit-btn" type="submit">Simpan</button>
                          </div>
                        </li>
                    </ul>

                </div>
              </div>
          </div>
          </form>
      </div>
  </section>
@endsection
@section('script')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@if($keterangan == 'sewa-tempat')
<script>
const tanggal = document.querySelector('#datepicker-13');
const waktu = document.querySelector('select[name="waktu"]');
const durasi = document.querySelector('select[name="durasi"]');
const ruangan = document.querySelector('select[name="ruangan"]');
const keteranganJadwal = document.querySelector('#keterangan-jadwal');
const harga = '{{$studio->sewaTempat->harga}}';
const totalDurasi = document.querySelector('#total-durasi');
const totalHarga = document.querySelector('#total-harga');
const jadwalData = @json($tanggal);
let closed = ``;
const jadwalTanggal = jadwalData.map(j => j.date);

$( "#datepicker-13" ).datepicker({
  dateFormat: 'd-m-yy',
  dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
  autoclose: true,
  beforeShowDay: enableDays
});

function enableDays(date){
  var sdate = $.datepicker.formatDate( 'd-m-yy', date)
        if($.inArray(sdate, jadwalTanggal) != -1) {
            return [true];
        }
        return [false];
}

$( "#datepicker-13" ).on('change', function(){
  let op = ``;
  let opDurasi = ``;

  if(this.value !== ''){
    waktu.disabled = false;
    durasi.disabled = false;
    ruangan.disabled = false;
    const waktuData = jadwalData.filter(j => j.date == this.value);
    const optionWaktu = Object.assign({},...waktuData);
    for (let i = optionWaktu.opened.replace(':00', ''); i < optionWaktu.closed.replace(':00', ''); i++) {
      op += `<option value="${('0' + i).slice(-2) + ':00'}">${('0' + i).slice(-2) + ':00'}</option>`;
    }
    for (let i = 1; i <= optionWaktu.closed.replace(':00', '') - optionWaktu.opened.replace(':00', ''); i++) {
      opDurasi += `<option value="${i}">${i}</option>`;
    }
    waktu.innerHTML = op;
    durasi.innerHTML = opDurasi;
    closed = optionWaktu.closed.replace(':00', '');
    keteranganJadwal.style.display = ``;
    keteranganJadwal.innerHTML = `<strong>keterangan : Buka dari jam ${optionWaktu.opened} - ${optionWaktu.closed}</strong>`;
    totalDurasi.innerText = 1;
    totalHarga.innerText = rupiah(harga);
  }else {
    waktu.disabled = true;
    durasi.disabled = true;
    ruangan.disabled = true;
    waktu.innerHTML = '';
    durasi.innerHTML = '';
    keteranganJadwal.style.display = 'none';
  }
});

waktu.addEventListener('change', function(){
  let newOpDurasi = ``;
  for (let i = 1; i <= closed - this.value.replace(':00', ''); i++) {
    newOpDurasi += `<option value="${i}">${i}</option>`;
  }
  durasi.innerHTML = newOpDurasi;
  totalDurasi.innerText = 1;
  totalHarga.innerText = rupiah(harga);
});

durasi.addEventListener('change', function(){
  totalDurasi.innerText = this.value;
  totalHarga.innerText = rupiah(this.value * harga);
});

  function rupiah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
</script>
@else

<script type="text/javascript">
const tanggalMulai = document.querySelector('#datepicker-13');
const tanggalSelesai = document.querySelector('#datepicker-14');
const date = new Date();
const harga = '{{$studio->sewaAlat->harga}}';
const totalDurasi = document.querySelector('#total-durasi');
const totalHarga = document.querySelector('#total-harga');

tanggalMulai.addEventListener('change', function(){
    if(this.value === ''){
      tanggalSelesai.disabled = true;
    }
})

$( "#datepicker-13").datepicker({
  dateFormat: 'dd-mm-yy',
  dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
  autoclose: true,
  minDate: date,
  maxDate: '+90D',
  onClose: function( selectedDate, inst ) {
            $('#datepicker-14').datepicker('destroy');
             const date1 = selectedDate.replace('-','/').replace('-','/').split('/')
             const date2 = date1[1] + '/' +date1[0] +'/' +date1[2];
             const newDate  = new Date(date2);
             const maxDate  = new Date(date2);
             const newMaxDate = new Date(maxDate.setDate(maxDate.getDate() + 3));
             tanggalSelesai.disabled = false;
             tanggalSelesai.value = '';
             harga.innerText = rupiah(harga);
             totalDurasi.innerText = 1;
             totalHarga.innerText = rupiah(harga);

              $( "#datepicker-14").datepicker({
                dateFormat: 'dd-mm-yy',
                dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
                autoclose: true,
                beforeShow: function(){
                    $( "#datepicker-14").datepicker('option',{
                      minDate : newDate,
                      maxDate : newMaxDate
                    });
                },
                onClose: function(date){
                  const dateFinish = date.replace('-','/').replace('-','/').split('/')
                  const newDateFinish = new Date(dateFinish[1] + '/' +dateFinish[0] +'/' +dateFinish[2]);
                  const diffTime = Math.abs(newDateFinish - newDate);
                  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                  totalDurasi.innerText = diffDays;
                  totalHarga.innerText = rupiah(diffDays * harga.replace())
                }
              });
        }

});

function rupiah(angka){
  var reverse = angka.toString().split('').reverse().join(''),
  ribuan = reverse.match(/\d{1,3}/g);
  ribuan = ribuan.join('.').split('').reverse().join('');
  return ribuan;
}

</script>

@endif
@endsection
