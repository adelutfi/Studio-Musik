@extends('templates.landing.default')

@section('content')
<section class="concert">
           <div class="overlay"></div>
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2 class="title title2">
                              Pemesanan Tempat
                           </h2>
                           <p class="subtitle subtitle2">
                              Data Pemesanan Tempat
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
                                 <th class="text-white">Tanggal / Waktu</th>
                                 <th class="text-white">Duraisi</th>
                                 <th class="text-white">Harga</th>
                                 <th class="text-white">Total Harga</th>
                                 <th class="text-white">Status Pembayaran</th>
                                 <th class="text-white"></th>
                               </tr>
                             </th>
                               <tbody>
                                 @foreach($pemesanan as $p)
                                   <tr>
                                       <td align="center">{{$loop->iteration}}</td>
                                       <td align="center">{{$p->studio->nama}}</td>
                                       <td align="center">{{date("d-m-Y", strtotime($p->tanggal)) }} / {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->format('h:i')}}</td>
                                       <td align="center">{{$p->durasi}} Jam</td>
                                       <td align="center">Rp. {{number_format($p->harga,0,',','.')}}</td>
                                       <td align="center">Rp. {{number_format($p->harga * $p->durasi,0,',','.')}}</td>
                                       <td align="center">
                                         @if($p->status == null)
                                         Menunggu
                                        @elseif($p->status == 0)
                                          Gagal
                                        @elseif($p->status == 1)
                                          Selesai
                                        @endif
                                       </td>
                                       <td align="center">
                                         <a href="javascript:void(0)" type="button" data-toggle="modal" data-target="#detail{{$p->id}}">Detail</a>
                                         @if($p->status == null)
                                         <a href="https://app.sandbox.midtrans.com/snap/v2/vtweb/{{$p->snap_token}}" target="_blank">Pembayaran</a>
                                         @endif
                                       </td>
                                   </tr>

                                   <div class="modal fade" id="detail{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan Tempat</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                          <div class="col-2">
                                          @if($p->status == null)
                                            <span class="badge badge-square badge-warning badge-md mb-2">
                                              <strong class="text-white">Menunggu</strong>
                                            </span>
                                          @elseif($p->status == 0)
                                              <span class="badge badge-square badge-danger badge-md mb-2">
                                                  <strong>Gagal</strong>
                                              </span>
                                          @else
                                            <span class="badge badge-square badge-success badge-md mb-2">
                                                <strong>Seselai</strong>
                                            </span>
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
                                              Tanggal Sewa : {{date("d-m-Y", strtotime($p->tanggal)) }}
                                            </li>
                                            <li class="list-group-item">
                                              Waktu (Mulai - Selesai) :
                                              {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->format('H:i')}}
                                              -
                                              {{\Carbon\Carbon::createFromFormat('H:i:s',$p->waktu)->addHours($p->durasi)->format('H:i')}}
                                            </li>
                                            <li class="list-group-item">
                                              Durasi : {{$p->durasi}} Jam
                                            </li>
                                            <li class="list-group-item">
                                              Harga : Rp. {{number_format($p->harga, 0,',','.')}}
                                            </li>
                                            <li class="list-group-item">
                                              Total Harga : Rp. {{number_format($p->harga * $p->durasi, 0,',','.')}}
                                            </li>
                                            </ul>
                                          </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                   @endforeach
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
