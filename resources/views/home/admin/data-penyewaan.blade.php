@extends('templates.studio.default')

@section('navbar')
    @include('templates.studio.partials._admin-navbar')
@endsection

@section('sidebar')
    @include('templates.studio.partials._admin-sidebar')
@endsection

@section('content')
<div class="content-header row">
  <div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-12">
        <h2 class="content-header-title float-left mb-0">Data Penyewaan</h2>
      </div>
    </div>
  </div>
</div>
<section id="">
<div class="row match-height">
 <div class="col-xl-12 col-lg-12">
   <div class="card overflow-hidden">
       <div class="card-header">
         <h4 class="card-title">Data Pengembalian Penyewaan Alat</h4>
       </div>
       <div class="card-content">
         <div class="card-body">
           <div class="nav-vertical">
             <ul class="nav nav-tabs nav-left flex-column" role="tablist">
               <li class="nav-item">
                 <a class="nav-link active" id="baseVerticalLeft-tab1" data-toggle="tab"
                   aria-controls="tabVerticalLeft1" href="#tabVerticalLeft1" role="tab" aria-selected="true">Belum Mengembalikan</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" id="baseVerticalLeft-tab2" data-toggle="tab" aria-controls="tabVerticalLeft2"
                   href="#tabVerticalLeft2" role="tab" aria-selected="false">Telah mengembalikan</a>
               </li>
             </ul>
             <div class="tab-content">
               <div class="tab-pane active" id="tabVerticalLeft1" role="tabpanel" aria-labelledby="baseVerticalLeft-tab1">
                 <p class="text-danger"> <strong>Belum Mengembalikan</strong> </p>
                 <div class="table-responsive">
                    <table class="table zero-configuration-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penyewa</th>
                                <th>Studio</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Selesai</th>
                                <th>Harga</th>
                                <th>Durasi</th>
                                <th>Total Harga</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($pemesanan->where('status', 0)->get() as $p)
                            @php($tanggalMulai = \Carbon\Carbon::parse($p->tanggal_mulai))
                            @php($tanggalSelesai = \Carbon\Carbon::parse($p->tanggal_selesai))
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->studio->nama}}</td>
                                <td align="center" width="17%">{{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}</td>
                                <td align="center" width="15%">{{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}</td>
                                <td>Rp. {{number_format($p->harga, 0,',','.')}}</td>
                                <td>{{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari</td>
                                <td align="center" width="15%">Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}</td>
                                <td>
                                  <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#detail{{$p->id}}">
                                  Detail
                                </button>
                              </td>
                            </tr>

                            <div class="modal fade text-left" id="detail{{$p->id}}" tabindex="-1" role="dialog"
                              aria-labelledby="myModalLabel160" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-danger">
                                    <h5 class="modal-title" id="myModalLabel160">Detail Pemesanan Alat (Belum Dikembalikan)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-6">
                                        <p class="text-dark">Detail Penyewa</p>
                                        <ul class="list-group text-dark">
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                               Nama :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->nama}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                No Hp :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->no_telp}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Alamat :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->alamat}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Email :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->penyewa->email}}
                                             </p>
                                           </li>
                                         </ul>
                                      </div>
                                      <div class="col-6">
                                        <p class="text-dark">Detail Studio</p>
                                        <ul class="list-group text-dark">
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                               Pemilik :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->pemilik->nama}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                No Hp :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->pemilik->no_telp}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Email :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->pemilik->email}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                               Nama Studio :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->nama}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Alamat :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->alamat}}
                                             </p>
                                           </li>
                                         </ul>
                                      </div>
                                      <div class="col-12 mt-1">
                                        <strong> <hr> </strong>
                                        <p class="text-dark text-center">Detail Pemesanan</p>
                                      </div>
                                      <div class="col-6 mt-1">
                                          <ul class="list-group text-dark">

                                             <li class="list-group-item d-flex">

                                               <p class="text-center mb-0">
                                                 Tenggal Mulai :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 {{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}
                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Tenggal Selesai :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 {{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}
                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Harga :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 Rp. {{number_format($p->harga, 0,',','.')}}
                                               </p>
                                             </li>

                                           </ul>
                                      </div>
                                      <div class="col-6 mt-1">
                                          <ul class="list-group text-dark">
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Waktu Pemesanan : Pukul {{\Carbon\Carbon::parse($p->jam_pemesanan)->format('H:i')}}
                                               </p>
                                               <p class="ml-1 mb-0">

                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Waktu Pengembalian : Pukul {{\Carbon\Carbon::parse($p->jam_pengembalian)->format('H:i')}}
                                               </p>
                                               <p class="ml-1 mb-0">

                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Durasi :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 {{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari
                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Total Harga:
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}
                                               </p>
                                             </li>
                                           </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
               </div>

               <div class="tab-pane" id="tabVerticalLeft2" role="tabpanel" aria-labelledby="baseVerticalLeft-tab2">
                <p class="text-success"> <strong>Telah Mengembalikan</strong> </p>
                 <div class="table-responsive">
                    <table class="table zero-configuration-2">
                        <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Penyewa</th>
                              <th>Studio</th>
                              <th>Tgl Mulai</th>
                              <th>Tgl Selesai</th>
                              <th>Harga</th>
                              <th>Durasi</th>
                              <th>Total Harga</th>
                              <td></td>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($pemesanan->where('status', 1)->get() as $p)
                            @php($tanggalMulai = \Carbon\Carbon::parse($p->tanggal_mulai))
                            @php($tanggalSelesai = \Carbon\Carbon::parse($p->tanggal_selesai))
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->studio->nama}}</td>
                                <td align="center" width="17%">{{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}</td>
                                <td align="center" width="15%">{{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}</td>
                                <td>Rp. {{number_format($p->harga, 0,',','.')}}</td>
                                <td>{{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari</td>
                                <td align="center" width="15%">Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}</td>
                                <td>
                                  <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#detail{{$p->id}}">
                                  Detail
                                </button>
                              </td>
                            </tr>

                            <div class="modal fade text-left" id="detail{{$p->id}}" tabindex="-1" role="dialog"
                              aria-labelledby="myModalLabel160" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-success">
                                    <h5 class="modal-title" id="myModalLabel160">Detail Pemesanan Alat (Telah Dikembalikan)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-6">
                                        <p class="text-dark">Detail Penyewa</p>
                                        <ul class="list-group text-dark">
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                               Nama :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->nama}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                No Hp :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->no_telp}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Alamat :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->alamat}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Email :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->penyewa->email}}
                                             </p>
                                           </li>
                                         </ul>
                                      </div>
                                      <div class="col-6">
                                        <p class="text-dark">Detail Studio</p>
                                        <ul class="list-group text-dark">
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                               Pemilik :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->pemilik->nama}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                No Hp :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->pemilik->no_telp}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Email :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->pemilik->email}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                               Nama Studio :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->nama}}
                                             </p>
                                           </li>
                                           <li class="list-group-item d-flex">
                                             <p class="text-center mb-0">
                                                Alamat :
                                             </p>
                                             <p class="ml-1 mb-0">
                                               {{$p->studio->alamat}}
                                             </p>
                                           </li>
                                         </ul>
                                      </div>
                                      <div class="col-12 mt-1">
                                        <strong> <hr> </strong>
                                        <p class="text-dark text-center">Detail Pemesanan</p>
                                      </div>
                                      <div class="col-6 mt-1">
                                          <ul class="list-group text-dark">

                                             <li class="list-group-item d-flex">

                                               <p class="text-center mb-0">
                                                 Tenggal Mulai :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 {{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}
                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Tenggal Selesai :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 {{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}
                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Harga :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 Rp. {{number_format($p->harga, 0,',','.')}}
                                               </p>
                                             </li>

                                           </ul>
                                      </div>
                                      <div class="col-6 mt-1">
                                          <ul class="list-group text-dark">
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Waktu Pemesanan :
                                               </p>
                                               <p class="ml-1 mb-0">

                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Waktu Pengembalian :
                                               </p>
                                               <p class="ml-1 mb-0">

                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Durasi :
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 {{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari
                                               </p>
                                             </li>
                                             <li class="list-group-item d-flex">
                                               <p class="text-center mb-0">
                                                 Total Harga:
                                               </p>
                                               <p class="ml-1 mb-0">
                                                 Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}
                                               </p>
                                             </li>
                                           </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
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
@section('script')
<script type="text/javascript">
  $('.zero-configuration-1').DataTable();
  $('.zero-configuration-2').DataTable();
</script>

@endsection
