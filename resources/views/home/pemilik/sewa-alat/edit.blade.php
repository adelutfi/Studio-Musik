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
                                            <input type="tel" id="harga" maxlength="8" minlength="4" value="{{old('harga', $sewaAlat->harga)}}" class="form-control form-control-lg" name="harga" placeholder="Harga" required>
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
                                    <h4>Jadwal</h4>
                                    </div>


                                <div class="row justify-content-center ml-2 mt-2 mb-2">
                                   @php($hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'])
                                    @for($i = 0; $i < count($hari); $i++)
                                     <div class="col">
                                       <div class="form-label-group">
                                        <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="jadwal" name="jadwal[]" data-id="{{$i}}" value="{{$hari[$i]}}" {{in_array($hari[$i], $jadwal) ? 'checked' : ''}}>
                                        <span class="vs-checkbox">
                                          <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                          </span>
                                        </span>
                                        <span class="text-dark">{{$hari[$i]}}</span>
                                      </div>
                                     </div>
                                    </div>
                                    @endfor
                                    <div class="col-12 text-center mb-2">
                                      <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
              							            <p class="mb-0">Success</p>
              							              <input type="checkbox" class="custom-control-input" id="semua">
              							              <label class="custom-control-label" for="semua"></label>
              							          </div>
                                    </div>
                                    <!-- <div class="col-12 text-center mb-2 mt-2">
                                    <h4>Alat Tambahan</h4>
                                    </div>

                                      <div class="col-4">
                                        <input type="text" id="nama-alat" maxlength="1" minlength="1" class="form-control" name="nama_alat" placeholder="Nama Alat">
                                      </div>
                                      <div class="col-3">
                                        <input type="tel" id="harga-alat" maxlength="1" minlength="1" class="form-control" name="harga_alat" placeholder="Harga Alat">
                                      </div>
                                      <div class="col-2 mb-3">
                                        <button type="button" class="btn btn-success" name="button"> <i class="feather icon-plus"></i> </button>
                                      </div>

                                    </div> -->

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
<script>
    const jadwal = document.querySelectorAll('#jadwal');
    const semua = document.querySelector('#semua');

    const cekJadwal = [...jadwal].filter(j => j.checked);
    jadwal.forEach(j => {
      j.addEventListener('change', () => {
        const cek = [...jadwal].filter(j => j.checked);
        if (cek.length < 7) {
          semua.checked = false
        }else if(cek.length > 6) {
          semua.checked = true
        }

        console.log(cek.length);
      })
    });

    semua.addEventListener('change', function(){
    	if(this.checked){
    		jadwal.forEach(j => j.checked = true);
    	}
      else{
    		jadwal.forEach(j => j.checked = false);
    	}


    });

  if(cekJadwal.length > 6){
    semua.checked = true
  }

    // jadwal.forEach(j => {
    //     const id = j.dataset.id;
    //     console.log(j.checked);
    //     if (j.checked) {
    //            jamTutup.forEach(t => t.dataset.id === id ? t.disabled = false : '' );
    //            jamBuka.forEach(t => t.dataset.id === id ? t.disabled = false : '' );
    //        }

    //     j.addEventListener('change', function(){
    //         const changeId = this.dataset.id;
    //         if (this.checked) {
    //             jamTutup.forEach(t => t.dataset.id === changeId ? t.disabled = false : '' );
    //             jamBuka.forEach(t => t.dataset.id === changeId ? t.disabled = false : '' );
    //         }else{
    //              jamTutup.forEach(t => t.dataset.id === changeId ? t.disabled = true : '' );
    //             jamBuka.forEach(t => t.dataset.id === changeId ? t.disabled = true : '' );
    //         }
    //     });
    // });
</script>

@endsection
