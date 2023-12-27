<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar" style="background: linear-gradient(45deg, #00274C, #0099FF); color: white;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon brg-li">
                    <i class="fas fa-hospital text-white"></i>
                </div>
                <div class="sidebar-brand-text text-light mx-3">MECON</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-bell"></i>
                    <span class="text-white">Dashboard</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Announcement -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Announcement') ?>">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span class="text-white">Pengumuman</span>
                </a>
            </li>


            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-solid fa-database"></i>
                    <span class="text-white">Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/dataPegawai') ?>">Data Pegawai</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/dataJabatan') ?>">Data Jabatan</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span class="text-white">Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/dataAbsensi') ?>">Data Absensi</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/potonganGaji') ?>">Setingan Potongan
                            Gaji</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/dataPenggajian') ?>">Data Gaji</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-copy"></i>
                    <span class="text-white">Laporan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('admin/laporanGaji') ?>">Laporan Gaji</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/laporanAbsensi') ?>">Laporan
                            Absensi</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/slipGaji') ?>">Slip Gaji</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user/ubahPassword') ?>">
                    <i class="fas fa-fw fa-lock"></i>
                    <span class="text-white">Ubah Password</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('autentifikasi/logout') ?>" onclick="return confirm('Yakin logout?')">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span class="text-white">Logout</span>
                </a>
            </li>


        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: linear-gradient(45deg, #00274C, #0099FF); color: white;">

                    <h1 class="h3 mb-0 text-gray-800"></h1>
                    <div class="text-right text-gray-500">
                        <p style="margin-bottom: 0px;" id="currentDateTime"></p>
                    </div>
                    <script>
                        function updateDateTime() {
                            var currentDate = new Date();
                            var formattedDateTime = currentDate.toLocaleString('en-US', {
                                weekday: 'long',
                                month: 'long',
                                day: 'numeric',
                                year: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                                hour12: true
                            });

                            document.getElementById('currentDateTime').innerHTML = formattedDateTime;
                        }

                        updateDateTime();
                        setInterval(updateDateTime, 1000);
                    </script>

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
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $user['nama'] ?>
                                <i style="margin-left: 10px;" class="fa fa-fw fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('user/index'); ?>">Profile Saya</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('autentifikasi/logout') ?>" onclick="return confirm('Yakin logout?')">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->