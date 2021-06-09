<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PIC-ART | Backend</title>
   @yield('prestyle')
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('/assets/backend2/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ url('/assets/backend2/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ url('/assets/backend2/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('/assets/backend2/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ url('/assets/backend2/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/backend2/js/select.dataTables.min.css')}}">
  <!-- End plugin css
  
  for this page -->
  <link rel="stylesheet" href="{{ url('/assets/backend2/vendors/mdi/css/materialdesignicons.min.css')}}">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('/assets/backend2/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" type="png" href="{{ url('/assets/logo.png') }}" />
  <link rel="shortcut icon" href="{{ url('/assets/PICART.png')}}" />
 
  @yield('poststyle')
   <style type="text/css">
      .nav-item{
          list-style:none!important;
      }
      .form-group {
    margin-bottom: 0.5rem;
}
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/backend') }}"><img src="{{ url('/assets/PICART.png')}}" class="mr-2" alt="logo"/></a>
        <!--<a class="navbar-brand brand-logo mr-5" href="{{ url('/home') }}"><img src="{{ url('/assets/logolargo.svg')}}" class="mr-2" alt="logo"/></a>-->
        <a class="navbar-brand brand-logo-mini" href="{{ url('/backend') }}"><img src="{{ url('/assets/PICART.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!--<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">-->
        <!--  <span class="icon-menu"></span>-->
        <!--</button>-->
        <!--<ul class="navbar-nav mr-lg-2">-->
        <!--  <li class="nav-item nav-search d-none d-lg-block">-->
        <!--    <div class="input-group">-->
        <!--      <div class="input-group-prepend hover-cursor" id="navbar-search-icon">-->
        <!--        <span class="input-group-text" id="search">-->
        <!--          <i class="icon-search"></i>-->
        <!--        </span>-->
        <!--      </div>-->
        <!--      <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">-->
        <!--    </div>-->
        <!--  </li>-->
        <!--</ul>-->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ url('/assets/face28.jpg') }}" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ url('/admin') }}">
                <i class="ti-settings text-primary"></i>
                User settings
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" 
                  onclick="event.preventDefault(); 
                  document.getElementById('logout-form').submit();"><i class="ti-power-off text-primary"></i>
              {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Visit our page</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-image menu-icon"></i>
              <span class="menu-title">Photos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.photo.index') }}">View all photos</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.photo.create') }}">Create a new photo</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="mdi mdi-camera menu-icon"></i>
              <span class="menu-title">Preset</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ route('backend.preset.index') }}">View all preset</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.preset.create') }}">Create a new preset</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-comment-processing menu-icon"></i>
              <span class="menu-title">Comments</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ route('backend.comment.index') }}">View all comment</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.comment.create') }}">Create a new comment</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="mdi mdi-content-save menu-icon"></i>
              <span class="menu-title">Favourites</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ route('backend.favourite.index') }}">View all favourite</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.favourite.create') }}">Create a new favourite</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-heart menu-icon"></i>
              <span class="menu-title">Likes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ route('backend.like.index') }}">View all like</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.like.create') }}">Create a new like</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-shopping menu-icon"></i>
              <span class="menu-title">Purchases</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ route('backend.purchase.index') }}">View all purchase</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.purchase.create') }}">Create a new purchase</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="mdi mdi-star-half menu-icon"></i>
              <span class="menu-title">Valuations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.valuation.index') }}">View all valuation</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('backend.valuation.create') }}">Create a new valuation</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.user.index') }}">
             <i class="icon-head menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
           @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
 @yield('prescript')
  <!-- plugins:js -->
  <script src="{{ url('/assets/backend2/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ url('/assets/backend2/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ url('/assets/backend2/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ url('/assets/backend2/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ url('/assets/backend2/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ url('/assets/backend2/js/off-canvas.js')}}"></script>
  <script src="{{ url('/assets/backend2/js/hoverable-collapse.js')}}"></script>
  <!--<script src="{{ url('/assets/backend2/js/template.js')}}"></script>-->
  <script src="{{ url('/assets/backend2/js/settings.js')}}"></script>
  <script src="{{ url('/assets/backend2/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ url('/assets/backend2/js/dashboard.js')}}"></script>
  <script src="{{ url('/assets/backend2/js/Chart.roundedBarCharts.js')}}"></script>
    @yield('postscript')
  <!-- End custom js for this page-->
</body>

</html>
