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
        <h2 class="content-header-title float-left mb-0">Data Sewa Tempat</h2>
      </div>
      <div class="col-6 pull-right">
        <button type="button" onclick="window.location='{{route("pemilik.tambah.sewa-tempat")}}'" class="float-right btn btn-primary" name="button"><i class="feather icon-plus"></i> Tambah</button>
      </div>
    </div>
  </div>
</div>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <p class="mb-0"><i class="feather icon-check-circle"></i><strong> Sukses! </strong> {{Session::get('message')}}</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
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
                                        <th>Studio</th>
                                        <th>Harga</th>
                                        <th>Jum. Ruangan</th>
                                        <th>Jadwal</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($sewaTempat as $s)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$s->studio->nama}}</td>
                                    <td>Rp. {{number_format($s->harga, 0,',','.')}}</td>
                                    <td>{{$s->jumlah_ruangan}}</td>
                                    @php($jadwal = explode(',',$s->jadwal))
                                    @php($jamBuka = explode(',',$s->jam_buka))
                                    @php($jamTutup = explode(',',$s->jam_tutup))
                                    <td>
                                      @for($i = 0; $i < count($jadwal); $i ++)
                                        {{$jadwal[$i]}} : {{$jamBuka[$i]}} / {{$jamTutup[$i]}}<br>
                                      @endfor
                                    </td>
                                    <td class="text-center">
                                      <button type="button" onclick="window.location='{{route("pemilik.edit.sewa-tempat", $s)}}'" class="btn btn-warning btn-sm" name="button"> <i class="feather icon-edit"></i> </button>
                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$s->id}}"> <i class="feather icon-trash"></i> </button>
                                    </td>
                                  </tr>

                                  <div class="modal fade" id="hapus{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header bg-danger">
                                       <h5 class="modal-title text-white" id="exampleModalLongTitle">Hapus Sewa Tempat</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>
                                     <form action="{{ route('pemilik.hapus.sewa-tempat', $s) }}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                     <div class="modal-body">
                                       <h5>Apakah anda yakin akan menghapus sewa tempat di <b>{{$s->studio->nama}}</b> ? </h5>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                       <button type="submit" class="btn btn-danger">Hapus</a>
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
