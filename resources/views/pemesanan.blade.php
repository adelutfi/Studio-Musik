@extends('templates.landing.default')

@section('content')
<style media="screen">
.borderless td, .borderless th {
  border: none;
}

</style>
<section class="contact-area" >
      <div class="container">
        <form id="pemesanan-submit" action="{{$keterangan == 'sewa-tempat' ? url('penyewa/pemesanan/'.$studio->id.'?tanggal='.request()->get('tanggal')) : url('penyewa/pemesanan/alat/'.$studio->id.'?tanggal='.request()->get('tanggal'))}}" method="post" class="contact-form">
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
                             <textarea name="alamat" class="form-control" rows="5" placeholder="Alamat" required> {{Auth::user()->alamat}}</textarea>
                         </div>
                </div>

              </div>
              <div class="col-lg-7">
                <div class="left-content-area">
                    <h5 class="title text-center">Studio {{$keterangan === 'sewa-alat' ? 'Sewa Alat' : 'Sewa Tempat'}}</h5>
                    <h4 class="text-center">{{$studio->nama}}</h4>
                    <h4 class="text-center mb-2">{{$studio->alamat}}</h4>
                    <div class="text-center">
                      <!-- @if($keterangan == 'sewa-tempat')
                        @foreach($jadwal as $j)
                        <h4 style="display: inline-block"><span class="badge badge-primary">{{$j}}</span></h4>
                        @endforeach
                      @endif -->
                    </div>

                    <ul class="info-list mt-5">
                      <input id="no-transaksi" type="hidden" name="no_transaksi" value="">
                      <input id="token" type="hidden" name="snap_token" value="">
                      @if($keterangan == 'sewa-tempat')
                        <li>
                          @php($start = now())
                           <div class="single-info-item">
                             <div class="row">
                               <div class="col-6 col-md-4 form-group">
                                <label>Hari & Tanggal</label>
                                <input type="text" class="form-control" id="datepicker-13" name="tanggal" value="{{request()->get('tanggal')}}" placeholder="Pilih Tanggal" {{request()->get('tanggal') ? 'disabled' : ''}} required>
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
                               <div class="col-6 col-md-6 form-group">
                                <label>Tanggal Mulai</label>
                                <input type="text" class="form-control" id="datepicker-13" name="tanggal_mulai" {{request()->get('tanggal') ? 'disabled' : ''}} value="{{request()->get('tanggal')}}" placeholder="Pilih Tanggal" required>
                              </div>
                               <div class="col-6 col-md-6 form-group">
                                <label>Tanggal Selesai</label>
                                <input type="text" class="form-control" id="datepicker-14" name="tanggal_selesai" value="" placeholder="Pilih Tanggal" {{request()->get('tanggal') ? '' : 'disabled'}}  required>
                              </div>
                               <div class="col-6 col-md-6 form-group">
                                <label>Jam Pemesanan</label>
                                <select class="form-control" id="jam_pemesanan" name="jam_pemesanan" placeholder="Jam Buka">
                                  <option value="">Pilih Jam</option>
                                   @for($hours = 1; $hours < 25; $hours++)
                                       @for($min = 0; $min < 60; $min+=60)
                                       <option value="{{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}">
                                       {{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}</option>
                                       @endfor
                                   @endfor
                                 </select>
                              </div>
                               <div class="col-6 col-md-6 form-group">
                                <label>Jam Pengemalian</label>
                                <select class="form-control" id="jam_pengembalian" name="jam_pengembalian" placeholder="Jam Buka">
                                  <option value="">Pilih Jam</option>
                                   @for($hours = 1; $hours < 25; $hours++)
                                       @for($min = 0; $min < 60; $min+=60)
                                       <option value="{{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}">
                                       {{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}</option>
                                       @endfor
                                   @endfor
                                 </select>
                              </div>
                            </div>
                           </div>
                        </li>
                        <li>
                          <table class="table table-sm borderless">
                            <tbody>
                              <tr>
                                <td><h4>Harga / Hari </h4></td>
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
                              <button type="button" class="submit-btn onclick="toMidtrans()"">Bayar</button>
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

<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('app.midtrans_client')}}">
</script>
<script>
  const bayar = document.querySelector('.submit-btn');
  const url = '{{config("app.url")}}';
  const noTransaksi = document.querySelector('#no-transaksi');
  const snapToken = document.querySelector('#token');
</script>
@if($keterangan == 'sewa-tempat')
  @include('pemesanan.script-pemesanan-tempat')
@else
  @include('pemesanan.script-pemesanan-alat')
@endif
@endsection
