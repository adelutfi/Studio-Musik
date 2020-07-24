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
                                       <h5 class="float-right">Alat sudah dikirim</h5>
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
                                           Tanggal Mulai : {{date("d-m-Y", strtotime($p->tanggal_mulai)) }}
                                         </li>
                                         <li class="list-group-item">
                                           Tanggal Selesai : {{date("d-m-Y", strtotime($p->tanggal_selesai)) }}
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
                                 <div class="modal-dialog" role="document">
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
                                       <p class="text-dark">Apakah alat studio siap untuk dikirim ?</p>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="submit" class="btn btn-info">OK</a>
                                     </div>
                                     </form>
                                   </div>
                                 </div>
                               </div>

                                 <div class="modal fade" id="selesai{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
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
