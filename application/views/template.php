<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IPNU-IPPNU</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>/assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>/assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/css/animate/animate.min.css" rel="stylesheet">
  <!-- Select Chosen -->
  <link href="<?= base_url(); ?>assets/plugin/chosen/dist/css/component-chosen.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-inbox"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IPNU-IPPNU</div>
      </a>

      <!-- Heading -->
      <div class="sidebar-heading">
        Main Menu
      </div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if ($this->session->userdata('level') == 1) { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-copy"></i>
            <span>Master Surat</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url('perihal') ?>">Perihal Surat</a>
              <a class="collapse-item" href="<?= base_url('sifat') ?>">Sifat Surat</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwi" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Cabang</span>
          </a>
          <div id="collapseTwi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url('cabang') ?>">Data Cabang</a>
              <a class="collapse-item" href="<?= base_url('kecamatan') ?>">Data kecamatan</a>
            </div>
          </div>
        </li>
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#surat" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Surat</span>
        </a>
        <div id="surat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('masuk') ?>"> <i class="fas fa-download"></i> Surat Masuk</a>
            <a class="collapse-item" href="<?= base_url('keluar') ?>"> <i class="fas fa-upload"></i> Surat Keluar</a>
          </div>
        </div>
      </li>
      <?php if ($this->session->userdata('level') == 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pelaporan') ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Laporan</span></a>
        </li>
      <?php } ?>

      <?php if ($this->session->userdata('level') == 2) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('kegiatan') ?>">
            <i class="fas fa-fw fa-car"></i>
            <span>Pelaporan</span></a>
        </li>
      <?php } ?>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan') ?>">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan</span></a>
      </li> -->


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <div class="sidebar-heading">
        Setting
      </div>


      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user') ?>">
          <i class="fas fa-users-cog"></i>
          <span>Pengguna</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

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

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->


            <!-- Nav Item - Messages -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->fungsi->user_login()->nama ?></span>
                <img class="img-profile rounded-circle" src="assets/icon/man.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
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

          <!-- Page Heading -->
          <?= $contents ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; IPNU - IPPNU 2021</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Untuk Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Session Akan DI Hapus</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/sbadmin/js/sb-admin-2.min.js"></script>

  <!--- Sweet alert --->
  <script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url(); ?>assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugin/maks/dist/jquery.mask.min.js"></script>
  <script src="<?= base_url() ?>assets/plugin/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?= base_url() ?>assets/laporan/jquery-ui/jquery-ui.min.js"></script>


  <script src="<?= base_url(); ?>/assets/js/myscrip.js"></script>
  <script src="<?= base_url(); ?>/assets/js/validasi/perihal.js"></script>
  <script src="<?= base_url(); ?>/assets/js/validasi/sifat.js"></script>
  <script src="<?= base_url(); ?>/assets/js/validasi/kecamatan.js"></script>
  <script src="<?= base_url(); ?>/assets/js/validasi/cabang.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>


</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    bsCustomFileInput.init();
  });
</script>


<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({

    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#dataTable1').DataTable({

    });
  });
</script>

<script>
  $('.chosen').chosen({
    width: '100%',

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {

    // Format mata uang.
    $('.uang').mask('000.000.000', {
      reverse: true
    });
  })
</script>

<script>
  $(document).ready(function() { // Ketika halaman selesai di load
    $('.input-tanggal').datepicker({
      dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
    });
    $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
    $('#filter').change(function() { // Ketika user memilih filter
      if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
        $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
        $('#form-tanggal').show(); // Tampilkan form tanggal
      } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
        $('#form-tanggal').hide(); // Sembunyikan form tanggal
        $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
      } else { // Jika filternya 3 (per tahun)
        $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
        $('#form-tahun').show(); // Tampilkan form tahun
      }
      $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
    })
  })
</script>