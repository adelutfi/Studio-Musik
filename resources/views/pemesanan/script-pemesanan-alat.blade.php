<script type="text/javascript">
  const tanggalMulai = document.querySelector('#datepicker-13');
  const tanggalSelesai = document.querySelector('#datepicker-14');
  const date = new Date();
  const harga = '{{$studio->sewaAlat->harga}}';
  const totalDurasi = document.querySelector('#total-durasi');
  const totalHarga = document.querySelector('#total-harga');
  const jamPemesanan = document.querySelector('#jam_pemesanan');
  const jamPengembalian = document.querySelector('#jam_pengembalian');

  async function toMidtrans(){
    let amount = harga*totalDurasi.innerText;
    return fetch(url+'/pemesanan/payment-gateway?total='+amount).then(res => res.json()).then(res => res);
  }

  bayar.addEventListener('click',async function(){
    if(tanggalMulai.value === '' || tanggalSelesai.value === ''){
      alert('pilih tanggal terlebih dahulu');
      tanggalMulai.classList.add('border','border-danger')
      tanggalSelesai.classList.add('border','border-danger')
    }else if(jamPemesanan.value === '' || jamPengembalian.value === ''){
        alert('pilih jam terlebih dahulu');
    }
    else  {
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

  tanggalMulai.addEventListener('change', function(){
      if(this.value === ''){
        tanggalSelesai.disabled = true;
      }
  });

  if(tanggalMulai !== ''){
    let dateStart = tanggalMulai.value.replace('-','/').replace('-','/').split('/')
      dateStart = dateStart[1] + '/' +dateStart[0] +'/' +dateStart[2];
      const newStartDate = new Date(dateStart);
    const dateEnd = new Date(newStartDate.setDate(newStartDate.getDate() + 3));
     // console.log(dateStart);
    $( "#datepicker-14").datepicker({
        dateFormat: 'dd-mm-yy',
        dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
        autoclose: true,
        beforeShow: function(){
            $( "#datepicker-14").datepicker('option',{
              minDate : new Date(dateStart),
              maxDate : dateEnd,
              onClose: function(date){
                const dateFinish = date.replace('-','/').replace('-','/').split('/');
                // if(date !== null){
                  const newDateFinish = new Date(dateFinish[1] + '/' +dateFinish[0] +'/' +dateFinish[2]);
                  const diffTime = Math.abs(newDateFinish - new Date(dateStart));
                  const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                  totalDurasi.innerText = isNaN(diffDays) ? 1 : diffDays;
                  // console.log(isNaNdiffDays);
                  totalHarga.innerText = isNaN(diffDays) ? rupiah(harga) : rupiah(diffDays * harga.replace())
                // }
              }
            });
        },
      })
  }



  $( "#datepicker-13").datepicker({
    dateFormat: 'dd-mm-yy',
    dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
    autoclose: true,
    minDate: date,
    maxDate: '+90D',
    onClose: function( selectedDate, inst ) {
              $('#datepicker-14').datepicker('destroy');
               const date1 = selectedDate.replace('-','/').replace('-','/').split('/')
               const date2 = date1[1] + '/' +date1[0] +'/' +date1[2];
               const newDate  = new Date(date2);
               const maxDate  = new Date(date2);
               const newMaxDate = new Date(maxDate.setDate(maxDate.getDate() + 3));
               tanggalSelesai.disabled = false;
               tanggalSelesai.value = '';
               harga.innerText = rupiah(harga);
               totalDurasi.innerText = 1;
               totalHarga.innerText = rupiah(harga);

                $( "#datepicker-14").datepicker({
                  dateFormat: 'dd-mm-yy',
                  dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', "Kam", 'Jum', 'Sab'],
                  autoclose: true,
                  beforeShow: function(){
                      $( "#datepicker-14").datepicker('option',{
                        minDate : newDate,
                        maxDate : newMaxDate
                      });
                  },
                  onClose: function(date){
                    const dateFinish = date.replace('-','/').replace('-','/').split('/');
                    // if(date !== null){
                      const newDateFinish = new Date(dateFinish[1] + '/' +dateFinish[0] +'/' +dateFinish[2]);
                      const diffTime = Math.abs(newDateFinish - newDate);
                      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                      totalDurasi.innerText = isNaN(diffDays) ? 1 : diffDays;
                      // console.log(isNaNdiffDays);
                      totalHarga.innerText = isNaN(diffDays) ? rupiah(harga) : rupiah(diffDays * harga.replace())
                    // }
                  }
                });
          }

  });

  function rupiah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
</script>
