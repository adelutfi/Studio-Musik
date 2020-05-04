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
        <h2 class="content-header-title float-left mb-0">Tambah Sewa Tempat</h2>
      </div>
    </div>
  </div>
</div>
<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form With Label Placeholder</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                          <select class="form-control form-control-lg" name="id_studio" id="id_studio">
                                            <option>Pilih Studio</option>
                                            @foreach($studio as $s)
                                            <option value="{{$s->id}}">{{$s->nama}}</option>
                                            @endforeach
                                           </select>
                                            <label for="id_studio">Pilih Studio</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group input-group">
                                            <input type="email" id="harga" class="form-control form-control-lg" name="harga" placeholder="Harga">
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="harga"> / Jam</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group">
                                            <input type="number" id="jumlah_ruangan" class="form-control form-control-lg" name="jumlah_ruangan" placeholder="Jumlah Ruangan">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea name="keterangan" class="form-control form-control-lg" rows="4" cols="60" placeholder="Keterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                      <label for="">Jadwal</label>
                                        <div class="form-group">
                                          <select class="select2 form-control form-control-lg text-dark" multiple="multiple">
                                            <option value="square" class=""> <span class="text-dark">Senin</span> </option>
                                            <option value="square" class="">Selasa</option>
                                            <option value="square" class="">Rabu</option>
                                            <option value="square" class="">Kamis</option>
                                            <option value="square" class="">Jum'at</option>
                                            <option value="square" class="">Sabtu</option>
                                            <option value="square" class="">Minggu</option>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
@endsection

@section('script')
<script>
  ! function(t, e, o) {
    o(".select2").select2({
       dropdownAutoWidth: !0,
       width: "100%"
   })
  }(window, document, jQuery);
</script>

@endsection
