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
        <h2 class="content-header-title float-left mb-0">Data Penyewa</h2>
      </div>
    </div>
  </div>
</div>
@if(Session::has('message'))
<div class="col-12">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0"><i class="feather icon-check-circle"></i><strong> Sukses! </strong> {{Session::get('message')}}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
</div>
@endif
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Konfirmasi KTP</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($penyewa as $p)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->no_telp}}</td>
                                        <td>{{$p->alamat}}</td>
                                        <td>{!!$p->konfirmasi_ktp ? '<span class="badge badge-success">Sudah</span>' : '<span class="badge badge-danger">Belum</span>'!!}</td>
                                        <td>{!!$p->status ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'!!}</td>
                                        <td>
                                          <button type="button" class="btn btn-icon btn-icon {{$p->status ? 'btn-danger' : 'btn-success'}} waves-effect waves-light" data-toggle="modal" data-target="#status{{$p->id}}">
                                            <i class="feather {{$p->status ? 'icon-x' : 'icon-check'}}">
                                            </i></button>
                                          @if($p->ktp && !$p->konfirmasi_ktp)
                                          <button type="button" class="btn btn-icon btn-icon btn-info waves-effect waves-light" data-toggle="modal" data-target="#ktp{{$p->id}}">KTP</button>
                                          @endif
                                        </td>
                                    </tr>

                                  <div class="modal fade" id="status{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                       <div class="modal-header {{$p->status ? 'bg-danger' : 'bg-success'}}">
                                         <h5 class="modal-title text-white" id="exampleModalLongTitle">{{$p->status ? 'Non Aktifkan Penyewa' : 'Aktifkan Penyewa'}}</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <form action="{{ route('admin.penyewa.status', $p) }}" method="POST">
                                          @csrf
                                          @method('PATCH')
                                       <div class="modal-body">
                                         <h5>Apakah anda yakin akan {{$p->status ? 'Non Aktifkan' : 'Aktifkan'}} <b>{{$p->nama}}</b> ? </h5>
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                          <button type="submit" class="btn {{$p->status ? 'btn-danger' : 'btn-success'}}">{{$p->status ? 'Non Aktifkan' : 'Aktifkan'}}</button>
                                       </div>
                                     </form>
                                     </div>
                                   </div>
                                 </div>

                                    <div class="modal fade" id="ktp{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                                     <div class="modal-content">
                                       <div class="modal-header bg-info">
                                         <h5 class="modal-title text-white" id="exampleModalLongTitle">Konfirmasi Ktp</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <form action="{{ route('admin.penyewa.ktp', $p) }}" method="POST">
                                          @csrf
                                          @method('PATCH')
                                       <div class="modal-body">
                                         <h5>Nama : <b>{{$p->nama}}</b> </h5>
                                         <h5>email : <b>{{$p->email}}</b> </h5>
                                         @if($p->ktp)
                                         <img src="{{asset('public/'.$p->ktp)}}" class="img-fluid" alt="">
                                         @endif
                                       </div>
                                       <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                         <button type="submit" class="btn btn-info">Konfirmasi</button>
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
