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
        <h2 class="content-header-title float-left mb-0">Data Pemesanan Tempat</h2>
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
                                        <th>Tanggl / waktu</th>
                                        <th>Total Harga</th>
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
                                    <td>{{$p->durasi}}</td>
                                    <td>{{date("d-m-Y", strtotime($p->tanggal)) }} / {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->format('h:i')}}</td>
                                    <td>Rp. {{number_format($p->harga * $p->durasi, 0,',','.')}}</td>
                                    <td>
                                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail{{$p->id}}"> Detail </button>
                                    </td>
                                  </tr>

                                  <div class="modal fade" id="detail{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header bg-info">
                                       <h5 class="modal-title text-white" id="exampleModalLongTitle">Detail Pemesanan Tempat</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>

                                     <div class="modal-body">

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
