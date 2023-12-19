<div class="container-fluid">
    <!-- Weather Information -->
    <div class="text-right text-gray-500 mb-4" style="position: absolute; top: 20px; right: 20px;">
        <!-- Weather information content goes here -->
    </div>


    <!-- Image Card -->
    <div class="card mb-2 border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
        <div style="position: relative;">
            <img src="<?php echo base_url('assets/img/backgrounds/bg1.png'); ?>" style="width: 100%; height: auto;">
            <div class="text-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(0,0,0,0.7), rgba(0,0,0,0.7); color: black; padding: 20px;">
                <?php
                date_default_timezone_set('Asia/Jakarta');

                $waktu_sekarang = date('H:i');

                echo '<marquee behavior="scroll" direction="left">';
                if (strtotime($waktu_sekarang) >= strtotime('06:00') && strtotime($waktu_sekarang) < strtotime('10:00')) {
                    echo '<span style="font-size: 24px;">Selamat Pagi</span>';
                } elseif (strtotime($waktu_sekarang) >= strtotime('10:00') && strtotime($waktu_sekarang) < strtotime('15:00')) {
                    echo '<span style="font-size: 24px;">Selamat Siang</span>';
                } elseif (strtotime($waktu_sekarang) >= strtotime('15:00') && strtotime($waktu_sekarang) < strtotime('18:00')) {
                    echo '<span style="font-size: 24px;">Selamat Sore</span>';
                } elseif (strtotime($waktu_sekarang) >= strtotime('18:00') && strtotime($waktu_sekarang) < strtotime('24:00')) {
                    echo '<span style="font-size: 24px;">Selamat Malam</span>';
                }
                echo '</marquee>';
                ?>
            </div>
            </nav>
        </div>
    </div><br>
</div><br>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 ml-2">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Jabatan</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jabatan ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Kehadiran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kehadiran ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Berdasarkan Jenis Kelamin</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status Pegawai</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Pegawai Tetap
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Pegawai Iidak Tetap
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container Fluid -->