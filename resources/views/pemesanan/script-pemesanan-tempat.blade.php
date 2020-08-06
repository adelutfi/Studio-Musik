<script>
const tanggal = document.querySelector('#datepicker-13');
const waktu = document.querySelector('select[name="waktu"]');
const durasi = document.querySelector('select[name="durasi"]');
const ruangan = document.querySelector('select[name="ruangan"]');
const keteranganJadwal = document.querySelector('#keterangan-jadwal');
const harga = '{{$studio->sewaTempat->harga}}';
const totalDurasi = document.querySelector('#total-durasi');
const totalHarga = document.querySelector('#total-harga');
const jadwalData = @json($tanggal);
let closed = ``;
const jadwalTanggal = jadwalData.map(j => j.date);

async function toMidtrans(){
  let amount = harga*durasi.value;
  return fetch(url+'/pemesanan/payment-gateway?total='+amount).then(res => res.json()).then(res => res);
}

(async function(){
  let op = ``;
  let opDurasi = ``;
  if(tanggal.value !== ''){
    waktu.disabled = false;
    durasi.disabled = false;
    ruangan.disabled = false;
    const waktuData = jadwalData.filter(j => j.date == tanggal.value);
    // console.log(jadwalData);
    const optionWaktu = Object.assign({},...waktuData);
    for (let i = optionWaktu.opened.replace(':00', ''); i < optionWaktu.closed.replace(':00', ''); i++) {
      op += `<option value="${('0' + i).slice(-2) + ':00'}">${('0' + i).slice(-2) + ':00'}</option>`;
    }
    for (let i = 1; i <= optionWaktu.closed.replace(':00', '') - optionWaktu.opened.replace(':00', ''); i++) {
      opDurasi += `<option value="${i}">${i}</option>`;
    }
    waktu.innerHTML = op;
    durasi.innerHTML = opDurasi;
    closed = optionWaktu.closed.replace(':00', '');
    keteranganJadwal.style.display = ``;
    keteranganJadwal.innerHTML = `<strong>keterangan : Buka dari jam ${optionWaktu.opened} - ${optionWaktu.closed}</strong>`;
    totalDurasi.innerText = 1;
    totalHarga.innerText = rupiah(harga);
  }else {
    waktu.disabled = true;
    durasi.disabled = true;
    ruangan.disabled = true;
    waktu.innerHTML = '';
    durasi.innerHTML = '';
    keteranganJadwal.style.display = 'none';
  }
}())

bayar.addEventListener('click',async function(){
  if(tanggal.value === ''){
    alert('pilih tanggal terlebih dahulu');
    tanggal.classList.add('border','border-danger')
  }else {
    const data = await toMidtrans();
    if(data.status){
      noTransaksi.value = data.no_transaksi;
      snapToken.value = data.midtrans.token;
      snap.pay(data.midtrans.token, {
        onPending: function(result){
          document.querySelector('#pemesanan-submit').submit();
        },
      })
    }
  }

});

$( "#datepicker-13" ).datepicker({
  dateFormat: 'd-m-yy',
  dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
  autoclose: true,
  beforeShowDay: enableDays
});

function enableDays(date){
  var sdate = $.datepicker.formatDate( 'd-m-yy', date)
        if($.inArray(sdate, jadwalTanggal) != -1) {
            return [true];
        }
        return [false];
}


$( "#datepicker-13" ).on('change', function(){
  let op = ``;
  let opDurasi = ``;

  if(this.value !== ''){
    waktu.disabled = false;
    durasi.disabled = false;
    ruangan.disabled = false;
    const waktuData = jadwalData.filter(j => j.date == this.value);
    const optionWaktu = Object.assign({},...waktuData);
    for (let i = optionWaktu.opened.replace(':00', ''); i < optionWaktu.closed.replace(':00', ''); i++) {
      op += `<option value="${('0' + i).slice(-2) + ':00'}">${('0' + i).slice(-2) + ':00'}</option>`;
    }
    for (let i = 1; i <= optionWaktu.closed.replace(':00', '') - optionWaktu.opened.replace(':00', ''); i++) {
      opDurasi += `<option value="${i}">${i}</option>`;
    }
    waktu.innerHTML = op;
    durasi.innerHTML = opDurasi;
    closed = optionWaktu.closed.replace(':00', '');
    keteranganJadwal.style.display = ``;
    keteranganJadwal.innerHTML = `<strong>keterangan : Buka dari jam ${optionWaktu.opened} - ${optionWaktu.closed}</strong>`;
    totalDurasi.innerText = 1;
    totalHarga.innerText = rupiah(harga);
  }else {
    waktu.disabled = true;
    durasi.disabled = true;
    ruangan.disabled = true;
    waktu.innerHTML = '';
    durasi.innerHTML = '';
    keteranganJadwal.style.display = 'none';
  }
});

waktu.addEventListener('change', function(){
  let newOpDurasi = ``;
  for (let i = 1; i <= closed - this.value.replace(':00', ''); i++) {
    newOpDurasi += `<option value="${i}">${i}</option>`;
  }
  durasi.innerHTML = newOpDurasi;
  totalDurasi.innerText = 1;
  totalHarga.innerText = rupiah(harga);
});

durasi.addEventListener('change', function(){
  totalDurasi.innerText = this.value;
  totalHarga.innerText = rupiah(this.value * harga);
});

  function rupiah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
</script>
