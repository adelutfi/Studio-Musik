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
        <h2 class="content-header-title float-left mb-0">Data Pemesanan Alat</h2>
      </div>
    </div>
  </div>
</div>
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                      <form class="" action="{{route('pdf.sewa-alat')}}" method="get">
                        <div class="row mb-3">
                          <div class="col-2">
                            <select name="bulan" class="form-control" id="basicSelect" required>
                               <option value="">Pilih Bulan</option>
                               @foreach($bulan as $key => $b)
                               <option value="{{$key}}">{{$b}}</option>
                               @endforeach
                           </select>
                          </div>
                          <div class="col-2">
                            <select name="tahun" class="form-control" id="basicSelect">
                               <option value="2020">2019</option>
                               <option value="2020" {{now()->format('Y') === '2020' ? 'selected' : ''}}>2020</option>
                           </select>
                          </div>
                          <div class="col-4">
                            <button type="submit" class="btn btn-danger"> <i class="fa fa-print fa-lg"></i> </button>
                          </div>
                        </div>
                      </form>

                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Studio</th>
                                        <th>Nama Penyewa</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Harga</th>
                                        <th>Durasi</th>
                                        <th>Total Harga</th>
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                        <th>Peminjaman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($pemesanan as $key => $p)
                                  @php($tanggalMulai = \Carbon\Carbon::parse($p->tanggal_mulai))
                                  @php($tanggalSelesai = \Carbon\Carbon::parse($p->tanggal_selesai))
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->studio->nama}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td align="center" width="17%">{{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}</td>
                                    <td align="center" width="15%">{{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}</td>
                                    <td>Rp. {{number_format($p->harga, 0,',','.')}}</td>
                                    <td>{{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari</td>
                                    <td align="center" width="15%">Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}</td>
                                    <td align="center">{{$status[$key]['store']}}</td>
                                    <td>
                                       @if($status[$key]['status'] === 'pending')
                                        <span class="badge badge-square badge-warning">
                                          <strong>Menunggu</strong>
                                        </span>
                                      @elseif($status[$key]['status'] === 'expire')
                                          <span class="badge badge-square badge-danger">
                                              <strong>Gagal</strong>
                                          </span>
                                      @else
                                        <span class="badge badge-square badge-success">
                                            <strong>Seselai</strong>
                                        </span>
                                      @endif
                                    </td>
                                    <td>

                                      @if(is_null($p->status))
                                      <span class="badge badge-square badge-danger">
                                        <strong>Menunggu Pengiriman</strong>
                                      </span>

                                      @elseif($p->status == 1)
                                      <span class="badge badge-square badge-success">
                                        <strong>Selesai Penyewaan</strong>
                                      </span>
                                      @else
                                      <span class="badge badge-square badge-warning">
                                        <strong>Dalam Penyewaan</strong>
                                      </span>
                                      @endif
                                    </td>
                                    <td>
                                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail{{$p->id}}"> Detail </button>

                                      @if($p->tanggal_mulai === now()->format('Y-m-d') && $p->status === null)
                                      <button type="button" class="btn btn-primary btn-sm mt-1" data-toggle="modal" data-target="#pengiriman{{$p->id}}"> <i class="fa fa-truck"></i> </button>
                                      @elseif($p->tanggal_mulai === now()->format('Y-m-d') && $p->status === 0)
                                       <button type="button" class="btn btn-success btn-sm mt-1" data-toggle="modal" data-target="#selesai{{$p->id}}"> <i class="fa fa-check"></i> </button>
                                      @endif
                                    </td>
                                  </tr>

                                  <div class="modal fade" id="detail{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header bg-info">
                                       <h5 class="modal-title text-white" id="exampleModalLongTitle">Detail Pemesanan Alat {{$p->studio->nama}}</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>

                                     <div class="modal-body">
                                       <h5>Pembayaran : </h5>
                                      @if($status[$key]['status'] === 'pending')
                                         <span class="badge badge-square badge-warning badge-md mb-2">
                                           <strong>Menunggu</strong>
                                         </span>
                                      @elseif($status[$key]['status'] === 'expire')
                                           <span class="badge badge-square badge-danger badge-md mb-2">
                                               <strong>Gagal</strong>
                                           </span>
                                       @else
                                         <span class="badge badge-square badge-success badge-md mb-2">
                                             <strong>Seselai</strong>
                                         </span>
                                       @endif
                                       @if($p->status === null && $p->tanggal_mulai === now()->format('Y-m-d'))
                                       <h5 class="float-right">Alat Belum dikirim</h5>
                                       @elseif($p->status === 0)
                                       <h5 class="float-right">Alat dalam peminjaman</h5>
                                       @elseif($p->status === 1)
                                       <h5 class="float-right">Alat telah di kembalikan</h5>
                                       @endif
                                       <ul class="list-group list-group-flush text-dark">
                                         <li class="list-group-item">
                                           Nama : {{$p->nama}}
                                         </li>
                                         <li class="list-group-item">
                                           No Telp : {{$p->no_telp}}
                                         </li>
                                         <li class="list-group-item">
                                           Alamat Studio : {{$p->alamat}}
                                         </li>
                                         <li class="list-group-item">
                                           Studio : {{$p->studio->nama}}
                                         </li>
                                         <li class="list-group-item">
                                           Tanggal & Jam Pemesanan : {{date("d-m-Y", strtotime($p->tanggal_mulai)) }} / {{\Carbon\Carbon::parse($p->jam_pemesanan)->format('H:i')}}
                                         </li>
                                         <li class="list-group-item">
                                           Tanggal & Jam Pengemalian : {{date("d-m-Y", strtotime($p->tanggal_selesai)) }} / {{\Carbon\Carbon::parse($p->jam_pengembalian)->format('H:i')}}
                                         </li>
                                         <li class="list-group-item">
                                            Durasi : {{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari
                                         </li>
                                         <li class="list-group-item">
                                           Harga : Rp. {{number_format($p->harga, 0,',','.')}}
                                         </li>
                                         <li class="list-group-item">
                                           Total Harga : Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}
                                         </li>

                                       </ul>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="submit" class="btn btn-info" data-dismiss="modal">OK</a>
                                     </div>

                                   </div>
                                 </div>
                               </div>

                            <div class="modal fade" id="pengiriman{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header bg-info">
                                       <h5 class="modal-title text-white" id="exampleModalLongTitle">Pengiriman alat studio dari {{$p->studio->nama}}</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>
                                     <form method="post" action="{{route('pemilik.kirim.alat', $p)}}">
                                      @csrf
                                      @method('PATCH')
                                     <div class="modal-body">
                                       <h4 class="text-danger text-center mb-2">Kirim alat sebelum jam {{\Carbon\Carbon::parse($p->jam_pemesanan)->format('H:i')}}</h4>
                                       <p class="text-dark">Apakah alat studio siap untuk dikirim ?</p>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim </a>
                                     </div>
                                     </form>
                                   </div>
                                 </div>
                               </div>

                                 <div class="modal fade" id="selesai{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header bg-success">
                                       <h5 class="modal-title text-white" id="exampleModalLongTitle">Alat Sampai</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>
                                     <form method="post" action="{{route('pemilik.selesai.alat', $p)}}">
                                      @csrf
                                      @method('PUT')
                                     <div class="modal-body">
                                       <p class="text-dark">Apakah Alat telah sampai di {{$p->studio->nama}} ?</p>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="submit" class="btn btn-success">OK</a>
                                     </div>
                                     </form>
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
</section>

@endsection
@section('script')
<script type="text/javascript">
@if(Session::has('notfound'))
  Swal.fire({
    title: "Gagal!",
    text: "{{Session::get('notfound')}}!",
    type: "error",
    confirmButtonClass: "btn btn-primary",
    buttonsStyling: !1
  })
@endif
</script>
@endsection
