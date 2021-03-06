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
        <h2 class="content-header-title float-left mb-0">Edit Sewa Tempat</h2>
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
                        <form id="form-submit" class="form" method="post" action="{{route('pemilik.update.sewa-tempat', $sewaTempat)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-label-group">
                                          <select class="form-control form-control-lg" name="id_studio" id="id_studio" required>
                                            <option>Pilih Studio</option>
                                            @foreach($studio as $s)
                                            @if(!$s->sewaTempat || $s->sewaTempat->id_studio == $s->id)
                                            <option value="{{$s->id}}" {{old('id_studio',$sewaTempat->id_studio) == $s->id ? 'selected' : ''}}>{{$s->nama}}</option>
                                            @endif
                                            @endforeach
                                           </select>
                                            <label for="id_studio">Pilih Studio</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group input-group">
                                            <input type="tel" id="harga" onkeyup="onNumbers(this)" maxlength="6" minlength="4" class="form-control form-control-lg {{ $errors->has('harga') ? 'is-invalid' : '' }}" value="{{old('harga', $sewaTempat->harga)}}" name="harga" placeholder="Harga" required>
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="harga"> / Jam</span>
                                          </div>
                                          @if ($errors->has('harga'))
                                          <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('harga') }}</strong>
                                          </span>
                                          @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-label-group input-group">
                                            <input type="tel" id="jumlah_ruangan" onkeyup="onNumbers(this)" maxlength="1" minlength="1" class="form-control form-control-lg {{ $errors->has('jumlah_ruangan') ? 'is-invalid' : '' }}" value="{{old('jumlah_ruangan', $sewaTempat->jumlah_ruangan)}}" name="jumlah_ruangan" placeholder="Jumlah Ruangan" required>
                                            <div class="input-group-append">
                                            <span class="input-group-text" id="harga"> / Ruang</span>
                                          </div>
                                            @if ($errors->has('jumlah_ruangan'))
                                            <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $errors->first('jumlah_ruangan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-label-group">
                                            <textarea name="keterangan" class="form-control form-control-lg" rows="4" cols="60" placeholder="Keterangan">{{old('harga', $sewaTempat->keterangan)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                    <h4>Jadwal</h4>
                                    </div>

                                <div class="row justify-content-center mt-2 mb-2">
                                   @php($hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu']);
                                    @for($i = 0; $i < count($hari); $i++)

                                     <div class="col-4">
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
                                    <div class="col-3">
                                        <div class="form-label-group">
                                         <select class="form-control" id="jam-buka" data-id="{{$i}}" name="jam_buka[]" placeholder="Jam Buka" disabled="">
                                            @for($hours = 6; $hours < 13; $hours++)
                                                @for($min = 0; $min < 60; $min+=60)
                                                <option value="{{str_pad($hours,2,'0',STR_PAD_LEFT)}}:{{str_pad($min,2,'0',STR_PAD_LEFT)}}" >
                                                  {{str_pad($hours,2,'0',STR_PAD_LEFT).":".str_pad($min,2,'0',STR_PAD_LEFT)}}
                                                </option>
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
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="button" onclick="window.location='{{route("pemilik.sewa-tempat")}}'" class="btn btn-secondary mr-1 mb-1">Kembali</button>
                                        <button type="button" onclick="simpan()" class="btn btn-primary mr-1 mb-1">Simpan</button>
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
<script>
    const jadwal = document.querySelectorAll('#jadwal');
    const jamBuka = document.querySelectorAll('#jam-buka');
    const jamTutup = document.querySelectorAll('#jam-tutup');
    const cekJamBuka = @json($jamBuka);
    const cekJamTutup = @json($jamTutup);
    const cekJadwal = [...jadwal].filter(j => j.checked === true);
    const form = document.querySelector('#form-submit');

    function simpan(){
      const checkJadwal = [...jadwal].filter(j => j.checked);

      if(checkJadwal.length < 1){
        Swal.fire({
               type: "error",
               title: "Oops...",
               text: "Pilih jadwal terlebih dahulu",
               confirmButtonClass: "btn btn-primary",
               buttonsStyling: !1
           });
      }else {
        form.submit();
      }
    }

    jamBuka.forEach(b => {
      cekJadwal.map((c, i) => {
        if(b.dataset.id === c.dataset.id){
          let x = i;
          [...b.options].map(op => {
            if(op.value === cekJamBuka[x]){
              op.selected = true
            }
          })
        }
      })
    });

    jamTutup.forEach(b => {
      cekJadwal.map((c, i) => {
        if(b.dataset.id === c.dataset.id){
          let x = i;
          [...b.options].map(op => {
            if(op.value === cekJamTutup[x]){
              op.selected = true
            }
          })
        }
      })
    });


    jadwal.forEach(j => {
        const id = j.dataset.id;

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
