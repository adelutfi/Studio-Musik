@extends('templates.landing.default')

@section('content')
<section class="concert">
           <div class="overlay"></div>
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2 class="title title2">
                              Pemesanan Alat
                           </h2>
                           <p class="subtitle subtitle2">
                               Data Pemesanan Alat
                           </p>
                       </div>
                   </div>
               </div>
               <div class="row justify-content-center">
                   <div class="col-lg-12">
                       <div class="tabilContainer table-responsive">
                           <table class="table">
                                 <th>
                                   <tr>
                                     <th class="text-white">NO</th>
                                     <th class="text-white">Studio</th>
                                     <th class="text-white">Tgl Mulai</th>
                                     <th class="text-white">Tgl Selesai</th>
                                     <th class="text-white">Durasi</th>
                                     <th class="text-white">Harga</th>
                                     <th class="text-white">Total Harga</th>
                                     <th class="text-white">Pembayaran</th>
                                     <th class="text-white">Status</th>
                                     <th class="text-white"></th>
                                   </tr>
                                 </th>
                                   <tbody>
                                     @foreach($pemesanan as $key => $p)
                                     @php($tanggalMulai = \Carbon\Carbon::parse($p->tanggal_mulai))
                                     @php($tanggalSelesai = \Carbon\Carbon::parse($p->tanggal_selesai))
                                       <tr>
                                           <td align="center" width="1%">{{$loop->iteration}}</td>
                                           <td align="center" width="15%">{{$p->studio->nama}}</td>
                                           <td align="center" width="10%">{{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}</td>
                                           <td align="center" width="12%">{{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}</td>
                                           <td align="center">{{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari</td>
                                           <td align="center" width="15%">Rp. {{number_format($p->harga,0,',','.')}}</td>
                                           <td align="center" width="15%">Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}</td>
                                            <td align="center">{{$status[$key]['store']}}</td>
                                           <td align="center">
                                             @if($status[$key]['status'] === 'pending')
                                              Menunggu
                                             @elseif($status[$key]['status'] === 'expire')
                                              Gagal
                                             @else
                                              Sukses
                                             @endif
                                           </td>
                                           <td align="center">
                                             <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#detail{{$p->id}}">Detail</a> <br>
                                             @if($status[$key]['status'] === 'pending')
                                             <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/{{$p->snap_token}}" class="mt-1" target="_blank">Pembayaran</a>
                                             @endif

                                             @if($p->status == 1 && $p->rating == 0)
                                              <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#rating{{$p->id}}">Rating</a>
                                             @endif
                                           </td>
                                       </tr>

                                       <div class="modal fade" id="detail{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan Alat</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                              <div class="col-2">
                                              @if($status[$key]['status'] === 'pending')
                                                <span class="badge badge-square badge-warning badge-md mb-2">
                                                  <strong class="text-white">Menunggu</strong>
                                                </span>
                                              @elseif($status[$key]['status'] === 'expire')
                                                  <span class="badge badge-square badge-danger badge-md mb-2">
                                                      <strong>Gagal</strong>
                                                  </span>
                                              @else
                                                <span class="badge badge-square badge-success badge-md mb-2">
                                                    <strong>Sukses</strong>
                                                </span>
                                              @endif
                                              </div>
                                              <div class="col-12">
                                                @if($p->status === null && $p->tanggal_mulai !== now()->format('Y-m-d'))
                                               <h5 class="text-center">Alat akan dikirim pada tanggal
                                                 {{\Carbon\Carbon::parse($p->tanggal_mulai)->format('d-m-Y')}}
                                                 Sebelum Pukul {{\Carbon\Carbon::parse($p->jam_pemesanan)->format('H:i')}}</h5>
                                               @elseif($p->status === null && $p->tanggal_mulai === now()->format('Y-m-d'))
                                               <h5 class="text-center">Alat segera dikirim pukul 08:00</h5>
                                               @elseif($p->status === 0)
                                               <h5 class="text-center">Alat sudah dikirim</h5>
                                               <h5 class="text-center">Batas pengembalian alat tanggal {{\Carbon\Carbon::parse($p->tanggal_selesai)->format('d-m-Y')}}
                                                 Pukul {{\Carbon\Carbon::parse($p->jam_pengembalian)->format('H:i')}}</h5>
                                               @elseif($p->status === 1)
                                               <h5 class="text-center">Alat telah di kembalikan</h5>
                                               @endif
                                              </div>
                                              </div>

                                              <ul class="list-group list-group-flush text-dark">
                                                <li class="list-group-item">
                                                  Nama Studio : {{$p->studio->nama}}
                                                </li>
                                                <li class="list-group-item">
                                                  No Telp Pemilik : {{$p->studio->pemilik->no_telp}}
                                                </li>
                                                <li class="list-group-item">
                                                  Alamat Studio : {{$p->studio->alamat}}
                                                </li>
                                                <li class="list-group-item">
                                                  Tanggal & Jam Pemesanan : {{date("d-m-Y", strtotime($p->tanggal_mulai)) }} / {{\Carbon\Carbon::parse($p->jam_pemesanan)->format('H:i')}}
                                                </li>
                                                <li class="list-group-item">
                                                  Tanggal & Jam Pengemalian : {{date("d-m-Y", strtotime($p->tanggal_selesai)) }} / {{\Carbon\Carbon::parse($p->jam_pengembalian)->format('H:i')}}
                                                </li>
                                                <li class="list-group-item">
                                                  Durasi : {{$tanggalMulai->diffInDays($tanggalSelesai) + 1}} Hari
                                                </li>
                                                <li class="list-group-item">
                                                  Harga : Rp. {{number_format($p->harga, 0,',','.')}}
                                                </li>
                                                <li class="list-group-item">
                                                  Total Harga : Rp. {{number_format($p->harga * ($tanggalMulai->diffInDays($tanggalSelesai) + 1), 0,',','.')}}
                                                </li>
                                                </ul>
                                              </div>

                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="modal fade" id="rating{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Berikan rating anda</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">


                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Simpan</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                       @endforeach
                                   </tbody>
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="col-lg-12">
                    <div class="blog-pagination">
                      <nav aria-label="Page navigation">
                        {{$pemesanan->links()}}
                      </nav>
                    </div>
                </div>
               </div>
           </div>
       </section>

@endsection
