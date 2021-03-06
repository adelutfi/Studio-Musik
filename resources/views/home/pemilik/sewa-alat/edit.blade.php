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
        <h2 class="content-header-title float-left mb-0">Tambah Sewa Alat</h2>
      </div>
    </div>
  </div>
</div>
<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('pemilik.update.sewa-alat', $sewaAlat)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                          <select class="form-control form-control-lg" name="id_studio" id="id_studio" required>
                                            <option>Pilih Studio</option>
                                            @foreach($studio as $s)
                                            @if(!$s->sewaAlat || $s->sewaAlat->id_studio == $s->id)
                                            <option value="{{$s->id}}" {{$sewaAlat->id_studio === $s->id ? 'selected' : ''}}>{{$s->nama}}</option>
                                            @endif
                                            @endforeach
                                           </select>
                                            <label for="id_studio">Pilih Studio</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group input-group">
                                            <input type="tel" onkeyup="onNumbers(this)" id="harga" maxlength="8" minlength="4" value="{{old('harga', $sewaAlat->harga)}}" class="form-control form-control-lg" name="harga" placeholder="Harga" required>
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="harga"> / Hari</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea name="keterangan" class="form-control form-control-lg" rows="4" cols="60" placeholder="Keterangan">{{old('keterangan', $sewaAlat->keterangan)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                        <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button> -->
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
<script type="text/javascript">
function onNumbers(e) {
  const RegExpression = /^[0-9]+$/;
  if(!RegExpression.test(e.value)){
    e.value = e.value.replace(/[a-zA-Z\s-!$%^&*()_+|~=`{}\[\\\]:";'<>?,.\/]/, "");
  }
}
</script>
@endsection
