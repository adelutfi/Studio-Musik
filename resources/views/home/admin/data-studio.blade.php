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
        <h2 class="content-header-title float-left mb-0">Data Pemilik</h2>
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
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($studio as $s)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td> <img src="{{asset('public/'.$s->gambar)}}" alt="" width="100" height="100"> </td>
                                        <td>{{$s->nama}}</td>
                                        <td>{{$s->alamat}}</td>
                                        <td>
                                          @if($s->status)
                                          <div class="badge badge-success badge-md mr-1 mb-1">Diterima</div>
                                          @elseif($s->status == 0 && $s->status != null)
                                          <div class="badge badge-danger badge-md mr-1 mb-1">Ditolak</div>
                                          @else
                                          <div class="badge badge-info badge-md mr-1 mb-1">Menunggu</div>
                                          @endif
                                        </td>
                                        <td>
                                          @if($s->status == null)
                                          <button type="button" data-toggle="modal" data-target="#terima-{{$s->id}}" class="btn btn-relief-success font-medium-3">
                                            <i class="feather icon-check-circle"></i>
                                          </button>
                                          <button type="button"  data-toggle="modal" data-target="#tolak-{{$s->id}}" class="btn btn-relief-danger font-medium-3">
                                            <i class="feather icon-x-circle"></i>
                                          </button>
                                          @endif
                                        </td>
                                    </tr>
                                    <!-- Modal terima -->
                                      <div class="modal fade text-left" id="terima-{{$s->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel110" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header bg-success white">
                                              <h5 class="modal-title" id="myModalLabel110">Terima Studio</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{route('admin.studio.terima', $s)}}" method="post">
                                              @csrf
                                              @method('PATCH')
                                            <div class="modal-body">
                                              <div class="text-center">
                                                <h3>Beri rating</h3>
                                              </div>
                                              <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5">
                                                <label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4">
                                                <label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3">
                                                <label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2">
                                                <label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1" checked>
                                                <label for="1">☆</label>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                           </form>
                                          </div>
                                        </div>
                                      </div>

                                      <!-- modal ditolak -->
                                      <div class="modal fade text-left" id="tolak-{{$s->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel110" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header bg-danger white">
                                              <h5 class="modal-title" id="myModalLabel110">Tolak Studio</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="" method="post">
                                              @csrf
                                              @method('PATCH')
                                            <div class="modal-body">
                                              <div class="text-center">
                                                <h3>Beri keterangan</h3>
                                              </div>
                                              <textarea name="name" rows="2" cols="20" class="form-control"></textarea>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-danger" data-dismiss="modal">Simpan</button>
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
