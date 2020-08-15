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
@if($errors->all())
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Gagal Menyimpan</h4>
    <p class="mb-0">
      Silhakan cek kembali!
    </p>
  </div>
@endif
<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="{{route('pemilik.simpan.sewa-alat')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                          <select class="form-control form-control-lg" name="id_studio" id="id_studio" required>
                                            <option value="">Pilih Studio</option>
                                            @foreach($studio as $s)
                                            @if(!$s->sewaAlat)
                                            <option value="{{$s->id}}" {{old('id_studio') == $s->id ? 'selected' : '' }}>{{$s->nama}}</option>
                                            @endif
                                            @endforeach
                                           </select>
                                            <label for="id_studio">Pilih Studio</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group input-group">
                                            <input onkeyup="onNumbers(this)" type="tel" id="harga" value="{{old('harga')}}" maxlength="8" minlength="4" class="form-control form-control-lg {{ $errors->has('harga') ? 'is-invalid' : '' }}" name="harga" placeholder="Harga" required>
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="harga"> / Hari</span>
                                          </div>
                                          @if ($errors->has('harga'))
                                          <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('harga') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea name="keterangan" class="form-control form-control-lg {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" rows="4" cols="60" placeholder="Keterangan" required>{{old('keterangan')}}</textarea>
                                            @if ($errors->has('keterangan'))
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $errors->first('keterangan') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 btn-lg">Simpan</button>
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
    e.value = e.value.replace(/[a-zA-Z\s-!$%^&*()_+|~=`{}\[\]:";'<>?,.\/]/, "");
  }
}
</script>
@endsection
