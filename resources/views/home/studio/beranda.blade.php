@extends('templates.studio.default')

@section('sidebar')
    @include('templates.studio.partials._sidebar')
@endsection

@section('content')
<div class="content-header row">
       <div class="content-header-left col-md-4 col-12 mb-2">
         <h3 class="content-header-title">Beranda</h3>
       </div>
     </div>
<div class="content-body"><!-- Header footer section start -->
  <section id="ecommerce-stats">
    <div class="row match-height">
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header ">
                    <!-- <h4 class="card-title">New Customers</h4> -->
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="reload">
                                    <i class="ft-rotate-cw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="card-header pt-0 pb-0">
                            <p class="danger darken-2">Total Customers</p>
                            <h3 class="display-4 blue-grey lighten-1">14,962</h3>
                        </div>
                        <div class="card-content">
                            <div id="new-customers" class="height-150 newCustomersdonutShadow"></div>
                            <ul class="list-inline clearfix mt-2">
                                <li>
                                    <h1 class="blue-grey lighten-1 text-bold-400">1465</h1>
                                    <span class="danger darken-2">
                                        <i class="ft-user"></i> Average New Customers</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header ">
                    <!-- <h4 class="card-title">New Projects</h4> -->
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="reload">
                                    <i class="ft-rotate-cw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="card-header pt-0 pb-0">
                            <p class="info darken-2">Total Projects</p>
                            <h3 class="display-4 blue-grey lighten-1">3,527</h3>
                        </div>
                        <div class="card-content">
                            <div id="new-projects" class="height-150 newProjectsdonutShadow"></div>
                            <ul class="list-inline clearfix mt-2">
                                <li>
                                    <h1 class="blue-grey lighten-1 text-bold-400">526</h1>
                                    <span class="info darken-2">
                                        <i class="ft-airplay"></i> Average New Projects</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-header ">
                    <!-- <h4 class="card-title">Tasks Completed</h4> -->
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <a data-action="reload">
                                    <i class="ft-rotate-cw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="card-header pt-0 pb-0">
                            <p class="warning darken-2">Total Tasks</p>
                            <h3 class="display-4 blue-grey lighten-1">32,225</h3>
                        </div>
                        <div class="card-content">
                            <div id="tasks-completed" class="height-150 tasksCompleteddonutShadow"></div>
                            <ul class="list-inline clearfix mt-2">
                                <li>
                                    <h1 class="blue-grey lighten-1 text-bold-400">6525</h1>
                                    <span class="warning darken-2">
                                        <i class="ft-layers"></i> Average New Tasks</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
@endsection
