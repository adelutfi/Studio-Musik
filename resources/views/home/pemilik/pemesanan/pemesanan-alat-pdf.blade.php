<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css" media="all">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    div.total-harga {
        position: absolute;
        right: 0;
        width: 100px;
        height: 120px;
    }
</style>
<center>
    <h4>Laporan Sewa Alat</h4>
    <h5>{{$pemilik->alamat}}</h5>
    <hr>
</center>

<p> Nama Pemilik : {{$pemilik->nama}} </p>
<p> Bulan : {{$namaBulan}}</p>

<table class="table table-bordered" style="width: 100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No Telp</th>
        <th>Nama Studio</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Durasi</th>
        <th>Harga</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
      @php($totalHarga = 0)
      @foreach($pemesanan as $p)
      @php($tanggalMulai = \Carbon\Carbon::parse($p->tanggal_mulai))
      @php($tanggalSelesai = \Carbon\Carbon::parse($p->tanggal_selesai))
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$p->nama}}</td>
        <td>{{$p->no_telp}}</td>
        <td>{{$p->studio->nama}}</td>
        <td>{{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}</td>
        <td>{{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}</td>
        <td>{{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari</td>
        <td>Rp. {{number_format($p->harga, 0,',','.')}}</td>
        <td>
          Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}
          @php($totalHarga += ($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1)))
        </td>
      </tr>
      @endforeach
        <tr>
            <td colspan="7"></td>
            <td>Jumlah</td>
            <td>Rp. {{number_format($totalHarga, 0,',','.')}}</td>
        </tr>
    </tbody>

</table>

</body>
</html>
