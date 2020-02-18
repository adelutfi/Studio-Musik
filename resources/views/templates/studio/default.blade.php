
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../images/favicon.ico">

    <title>VoiceX Admin - Dashboard  Blank Page </title>
  
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ asset('public/assets/studio/vendor_components/bootstrap/dist/css/bootstrap.min.css')}}">
    
    <!-- theme style -->
    <link rel="stylesheet" href="{{ asset('public/assets/studio/css/style.css')}}">
    
    <!-- Admin skins -->
    <link rel="stylesheet" href="{{ asset('public/assets/studio/css/skin_color.css')}}">    

</head>
<body class="hold-transition light-skin sidebar-mini theme-purple onlywave">
<!-- Site wrapper -->
<div class="wrapper">
    
  <div class="art-bg">
      <img src="../../images/art1.svg" alt="" class="art-img light-img">
      <img src="../../images/art2.svg" alt="" class="art-img dark-img">
      <img src="../../images/art-bg.svg" alt="" class="wave-img light-img">
      <img src="../../images/art-bg2.svg" alt="" class="wave-img dark-img">
  </div>

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.html" class="logo">
      <!-- mini logo -->
      <div class="logo-mini">
          <span class="light-logo"><img src="../../images/logo-light.png" alt="logo"></span>
          <span class="dark-logo"><img src="../../images/logo-dark.png" alt="logo"></span>
      </div>
      <!-- logo-->
      <div class="logo-lg">
          <span class="light-logo"><img src="../../images/logo-light-text.png" alt="logo"></span>
          <span class="dark-logo"><img src="../../images/logo-dark-text.png" alt="logo"></span>
      </div>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        
      <div class="app-menu">
        <ul class="header-megamenu nav">
            <li class="btn-group nav-item">
                <a href="#" class="nav-link rounded" data-toggle="push-menu" role="button">
                    <i class="nav-link-icon mdi mdi-menu text-white"></i>
                </a>
            </li>
        </ul> 
      </div>
        
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">     
          <!-- Messages -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Messages">
              <i class="mdi mdi-email"></i>
            </a>
            <ul class="dropdown-menu animated bounceIn">

              <li class="header">
                <div class="p-20">
                    <div class="flexbox">
                        <div>
                            <h4 class="mb-0 mt-0">Messages</h4>
                        </div>
                        <div>
                            <a href="#" class="text-danger">Clear All</a>
                        </div>
                    </div>
                </div>
              </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu sm-scrol">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Lorem Ipsum
                          <small><i class="fa fa-clock-o"></i> 15 mins</small>
                         </h4>
                         <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Nullam tempor
                          <small><i class="fa fa-clock-o"></i> 4 hours</small>
                         </h4>
                         <span>Curabitur facilisis erat quis metus congue viverra.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Proin venenatis
                          <small><i class="fa fa-clock-o"></i> Today</small>
                         </h4>
                         <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Praesent suscipit
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                         </h4>
                         <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          Donec tempor
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                         </h4>
                         <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                      </div>

                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">                 
                  <a href="#">See all e-Mails</a>
              </li>
            </ul>
          </li>
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notifications">
              <i class="mdi mdi-bell"></i>
            </a>
            <ul class="dropdown-menu animated bounceIn">

              <li class="header">
                <div class="p-20">
                    <div class="flexbox">
                        <div>
                            <h4 class="mb-0 mt-0">Notifications</h4>
                        </div>
                        <div>
                            <a href="#" class="text-danger">Clear All</a>
                        </div>
                    </div>
                </div>
              </li>

              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu sm-scrol">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                  <a href="#">View all</a>
              </li>
            </ul>
          </li> 
          
          <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
              <img src="../../images/avatar/7.jpg" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> My Profile</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-bag"></i> My Balance</a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-email-unread"></i> Inbox</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="ion-log-out"></i> Logout</a>
                    <div class="dropdown-divider"></div>
                    <div class="p-10"><a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-success">View Profile</a></div>
              </li>
            </ul>
          </li> 
            
          <!-- Control Sidebar Toggle Button -->
            
        </ul>
      </div>
    </nav>
  </header>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="container-full clearfix position-relative">
          
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">
              <!-- sidebar menu-->
              <ul class="sidebar-menu" data-widget="tree">

                <li class="header nav-small-cap">Menu</li>

                <li>
                  <a href="mailbox.html">
                    <i class="ti-email"></i> <span>Mailbox</span>
                  </a>
                </li>

                <li class="treeview">
                  <a href="#">
                    <i class="ti-layout-grid2"></i>
                    <span>Extra</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="extra_app_ticket.html"><i class="ti-more"></i>Support Ticket</a></li>
                    <li><a href="extra_calendar.html"><i class="ti-more"></i>Calendar</a></li>
                    <li><a href="extra_profile.html"><i class="ti-more"></i>Profile</a></li>
                    <li><a href="extra_taskboard.html"><i class="ti-more"></i>Project DashBoard</a></li>
                  </ul>
                </li>
              </ul>
            </section>
        </aside> 

        <!-- Main content -->
        <section class="content">         
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Blank page</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                                    <li class="breadcrumb-item active" aria-current="page">Blank page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                          <h4 class="box-title">Title</h4>
                        </div>
                        <div class="box-body">
                          This is some text within a card block.
                        </div>
                        <div class="box-footer">
                          Footer
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->    
      </div>
  </div>
  <!-- /.content-wrapper -->
 
   <footer class="main-footer">
      &copy; 2019 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
  </footer>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


    <!-- jQuery 3 -->
    <script src="{{ asset('public/assets/studio/vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>
    
    <!-- fullscreen -->
    <script src="{{ asset('public/assets/studio/vendor_components/screenfull/screenfull.js')}}"></script>
    
    <!-- popper -->
    <script src="{{ asset('public/assets/studio/vendor_components/popper/dist/popper.min.js')}}"></script>
    
    <!-- Bootstrap 4.0-->
    <script src="{{ asset('public/assets/studio/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
    <!-- SlimScroll -->
    <script src="{{ asset('public/assets/studio/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    
    <!-- FastClick -->
    <script src="{{ asset('public/assets/studio/vendor_components/fastclick/lib/fastclick.js')}}"></script>
    
    <!-- VoiceX Admin App -->
    <script src="{{ asset('public/assets/studio/js/template.js')}}"></script>
    
    <!-- VoiceX Admin for demo purposes -->
    <script src="{{ asset('public/assets/studio/js/demo.js')}}"></script>
    

</body>
</html>
