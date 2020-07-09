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
        <h2 class="content-header-title float-left mb-0">Data Sewa Alat</h2>
      </div>
      <div class="col-6 pull-right">
        <button type="button" onclick="window.location='{{route("pemilik.tambah.sewa-alat")}}'" class="float-right btn btn-primary" name="button"><i class="feather icon-plus"></i> Tambah</button>
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
                                        <th>Harga</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($sewaAlat as $s)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$s->studio->nama}}</td>
                                    <td>Rp. {{number_format($s->harga, 0, ',', '.')}}</td>
                                    @php($jadwal = explode(',',$s->jadwal))
                                    <td>
                                      @for($i = 0; $i < count($jadwal); $i ++)
                                        {{$jadwal[$i]}}
                                      @endfor
                                    </td>
                                    <td class="text-center">
                                      <button type="button" onclick="window.location='{{route("pemilik.edit.sewa-alat", $s)}}'" class="btn btn-warning btn-sm" name="button"> <i class="feather icon-edit"></i> </button>
                                      <button type="button" class="btn btn-danger btn-sm" name="button"> <i class="feather icon-trash"></i> </button>
                                    </td>
                                  </tr>
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
