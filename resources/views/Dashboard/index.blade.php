<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script>var base_url = "{{ url('/') }}";</script>
    <!-- Js Bundle-->
    <script src="js/extensions/jquery.min.js"></script>
    <script src="js/extensions/bootstrap.bundle.min.js"></script>
    <script src="js/extensions/jquery.easing.min.js"></script>
    <script src="js/extensions/sb-admin-2.js"></script>
    <script src="js/system/apps.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <!-- CSS & Font Bundle-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/extensions/all.min.css">
    <link rel="stylesheet" href="css/extensions/sb-admin-2.min.css">
    <link rel="stylesheet" href="css/extensions/burgerMenu.css">
    <link rel="stylesheet" href="css/extensions/content/site.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top" class='sidebar-toggled'>
  @extends('Shared.Modal.Goods.NoGoodsBarcode')
  <?php
      // $this->load->view("Shared/Modal/Goods");
      // $this->load->view("Shared/Modal/Unit");
      // $this->load->view("Shared/Modal/Confrim");
      // $this->load->view("Shared/Modal/NoGoodsBarcode");
      // $this->load->view("Shared/Modal/Alert");
      // $this->load->view("Shared/Modal/Confrim_POS");
      // $Icon_Edit = "<span class='m_r5'><img src=".base_url()."extensions\images\icon\Edit_16.png class='pointer'></span>";
      // $Icon_Delete = "<span><img src=".base_url()."extensions\images\icon\Delete_16.png class='pointer'></span>";
  ?>

  <div class='window-overlay'>
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>

  <div id="wrapper">
    <!-- Side bar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar" style="transition: width 0.3s;">
        <div class="sidebar-brand d-flex align-items-center justify-content-center"  id="sidebarHide">
            <div class="sidebar-brand-icon">
                <nav role="navigation">
                <div id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                </nav>
            </div>
            <div class="sidebar-brand-text mx-3">
                Mung Pen Kuy Rai A <sup>2</sup>
            </div>
        </div>
        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="">
            <a class="nav-link" href="{{ route('pos') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>POS</span></a>
        </li>
                
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Addons
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Goods (สินค้า)</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Screens:</h6>
                <a class="collapse-item" href="javascript:ShowModalGoods();"> Add Goods (เพิ่มสินค้า) </a>
                <a class="collapse-item" href=""> List Goods (รายการสินค้า) </a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span> --}}
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">
              @yield('content')
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Quardruple &copy; 2019 , Source Ver. 0.0.0.1, All right reserved.</span> 
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
