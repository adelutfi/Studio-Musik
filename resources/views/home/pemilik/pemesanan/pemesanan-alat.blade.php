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
                                        <th>Harga</th>
                                        <th>Durasi</th>
                                        <th>Tanggal / waktu</th>
                                        <th>Total Harga</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($pemesanan as $p)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$p->studio->nama}}</td>
                                    <td>{{$p->penyewa->nama}}</td>
                                    <td>Rp. {{number_format($p->harga, 0,',','.')}}</td>
                                    <td>{{$p->durasi}} Jam</td>
                                    <td>{{date("d-m-Y", strtotime($p->tanggal)) }} / {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->format('h:i')}}</td>
                                    <td>Rp. {{number_format($p->harga * $p->durasi, 0,',','.')}}</td>
                                    <td>
                                      @if($p->status === null)
                                        <span class="badge badge-square badge-warning">
                                          <strong>Menunggu</strong>
                                        </span>
                                      @elseif($p->status === 0)
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
                                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail{{$p->id}}"> Detail </button>
                                    </td>
                                  </tr>

                                  <div class="modal fade" id="detail{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header bg-info">
                                       <h5 class="modal-title text-white" id="exampleModalLongTitle">Detail Pemesanan Tempat {{$p->studio->nama}}</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>

                                     <div class="modal-body">
                                       @if($p->status === null)
                                         <span class="badge badge-square badge-warning badge-md mb-2">
                                           <strong>Menunggu</strong>
                                         </span>
                                       @elseif($p->status === 0)
                                           <span class="badge badge-square badge-danger badge-md mb-2">
                                               <strong>Gagal</strong>
                                           </span>
                                       @else
                                         <span class="badge badge-square badge-success badge-md mb-2">
                                             <strong>Seselai</strong>
                                         </span>
                                       @endif
                                       @if($p->pembayaran == 'indomart')
                                       <img src="{{asset('public/indomart.png')}}"  width="90" alt="">
                                       @else
                                       <img src="{{asset('public/alfamart.png')}}"  width="90" alt="">
                                       @endif
                                       <ul class="list-group list-group-flush text-dark">
                                         <li class="list-group-item">
                                           Nama : {{$p->penyewa->nama}}
                                         </li>
                                         <li class="list-group-item">
                                           No Telp : {{$p->penyewa->no_telp}}
                                         </li>
                                         <li class="list-group-item">
                                           Alamat : {{$p->penyewa->alamat}}
                                         </li>
                                         <li class="list-group-item">
                                           Studio : {{$p->studio->nama}}
                                         </li>
                                         <li class="list-group-item">
                                           Tanggal Sewa : {{date("d-m-Y", strtotime($p->tanggal)) }}
                                         </li>
                                         <li class="list-group-item">
                                           Waktu (Mulai - Selesai) :
                                           {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->format('h:i')}}
                                           -
                                           {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->addHours($p->durasi)->format('h:i')}}
                                         </li>
                                         <li class="list-group-item">
                                           Durasi : {{$p->durasi}} Jam
                                         </li>
                                         <li class="list-group-item">
                                           Harga : Rp. {{number_format($p->harga, 0,',','.')}}
                                         </li>
                                         <li class="list-group-item">
                                           Total Harga : Rp. {{number_format($p->harga * $p->durasi, 0,',','.')}}
                                         </li>

                                       </ul>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="submit" class="btn btn-info" data-dismiss="modal">OK</a>
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
</section>

@endsection
