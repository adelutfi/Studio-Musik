@extends('templates.landing.default')

@section('content')
<section class="concert">
           <div class="overlay"></div>
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="section-title">
                           <h2 class="title title2">
                               Upcomming Concert
                           </h2>
                           <p class="subtitle subtitle2">
                               New Album Available Everywhere
                           </p>
                       </div>
                   </div>
               </div>
               <div class="row justify-content-center">
                   <div class="col-lg-8">
                       <div class="tabilContainer table-responsive">
                           <table class="table">
                               <tbody>
                                   <tr>
                                       <td>28 Maret 2019</td>
                                       <td>STUDIO 33</td>
                                       <td>Sewa Tempat</td>
                                       <td><a href="#">Info</a></td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="col-lg-12">
                    <div class="blog-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                  <span class="sr-only">Previous</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item active"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </li>
                            </ul>
                        </nav>
                    </div>
                </div>
               </div>
           </div>
       </section>

@endsection
