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
                        <form class="form" method="post" action="{{route('pemilik.simpan.sewa-tempat')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                          <select class="form-control form-control-lg" name="id_studio" id="id_studio" required>
                                            <option>Pilih Studio</option>
                                            @foreach($studio as $s)
                                            @if($s->sewaTempat)
                                            <option value="{{$s->id}}">{{$s->nama}}</option>
                                            @endif
                                            @endforeach
                                           </select>
                                            <label for="id_studio">Pilih Studio</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group input-group">
                                            <input type="tel" id="harga" maxlength="6" minlength="4" class="form-control form-control-lg" name="harga" placeholder="Harga" required>
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="harga"> / Jam</span>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group">
                                            <input type="tel" id="jumlah_ruangan" maxlength="1" minlength="1" class="form-control form-control-lg" name="jumlah_ruangan" placeholder="Jumlah Ruangan" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea name="keterangan" class="form-control form-control-lg" rows="4" cols="60" placeholder="Keterangan"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                    <h4>Jadwal</h4>
                                    </div>


                                <div class="row justify-content-center mt-2 mb-2">
                                   @php($hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'])
                                    @for($i = 0; $i < count($hari); $i++)
                                     <div class="col-4">
                                       <div class="form-label-group">
                                        <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="jadwal" name="jadwal[]" data-id="{{$i}}" value="{{$hari[$i]}}">
                                        <span class="vs-checkbox">
                                          <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                          </span>
                                        </span>
                                        <span class="text-dark">{{$hari[$i]}}</span>
                                      </div>
                                     </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-label-group">
                                         <select class="form-control" id="jam-buka" data-id="{{$i}}" name="jam_buka[]" placeholder="Jam Buka" disabled="">
                                            @for($hours = 6; $hours < 13; $hours++)
                                                @for($min = 0; $min < 60; $min+=60)
                                                <option value="{{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}">
                                                {{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}</option>
                                                @endfor
                                            @endfor
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-label-group">
                                            <select id="jam-tutup" data-id="{{$i}}" class="form-control" name="jam_tutup[]" placeholder="Jam Tutup" disabled="">
                                             @for($hours = 12; $hours < 25; $hours++)
                                                @for($min = 0; $min < 60; $min+=60)
                                                <option value="{{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}">
                                                {{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}
                                            </option>
                                                @endfor
                                            @endfor
                                            </select>
                                        </div>
                                    </div>
                                    @endfor
                                    <div class="col-12 text-center mb-2 mt-2">
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
<script>
    const jadwal = document.querySelectorAll('#jadwal');
    const jamBuka = document.querySelectorAll('#jam-buka');
    const jamTutup = document.querySelectorAll('#jam-tutup');

    jadwal.forEach(j => {
        const id = j.dataset.id;
        console.log(j.checked);
        if (j.checked) {
               jamTutup.forEach(t => t.dataset.id === id ? t.disabled = false : '' );
               jamBuka.forEach(t => t.dataset.id === id ? t.disabled = false : '' );
           }

        j.addEventListener('change', function(){
            const changeId = this.dataset.id;
            if (this.checked) {
                jamTutup.forEach(t => t.dataset.id === changeId ? t.disabled = false : '' );
                jamBuka.forEach(t => t.dataset.id === changeId ? t.disabled = false : '' );
            }else{
                 jamTutup.forEach(t => t.dataset.id === changeId ? t.disabled = true : '' );
                jamBuka.forEach(t => t.dataset.id === changeId ? t.disabled = true : '' );
            }
        });
    });
</script>

@endsection
