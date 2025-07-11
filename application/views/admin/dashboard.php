<div class="container mb-4" style="display: flex; justify-content: center;">
    <img src="<?php echo base_url('assets/img/backgrounds/mecon.png'); ?>" style="width: 100%; height: auto; border: 1px solid #62aad4; border-radius: 10px; box-shadow: 10px 10px 5px 0px rgba(189,185,185,0.75);">
</div>

<div class="container">
    <div class="card mb-4 border border-info" style="box-shadow: 10px 10px 5px 0px rgba(189,185,185,0.75);">
        <div class="card-header" style="background-color: #AFDCF6; color: #000;">
            Pengumuman Hari Ini
        </div>
        <div class="card-body">
            <?php if ($announce) : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Pengumuman</th>
                            <th scope="col">Tanggal dibuat</th>
                        </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($announce as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['judul']; ?></td>
                            <td><?= $a['deskripsi']; ?></td>
                            <td><?= $a['tanggal']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p>Belum ada pengumuman yang dirilis oleh Admin.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="display: flex; justify-content: space-evenly;">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header" style="background-color: #AFDCF6; color: #000; text-align: center;">
                    Jumlah Pegawai
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-user"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <?= $pegawai; ?> Data Pegawai
                </h4>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header" style="background-color: #AFDCF6; color: #000; text-align: center;">
                    Data Jabatan
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-user"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <?= $jabatan; ?> Data Jabatan
                </h4>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header" style="background-color: #AFDCF6; color: #000; text-align: center;">
                    Data Kehadiran
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-user"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <?= $kehadiran; ?> Data Kehadiran
                </h4>
            </div>
        </div>

    </div>
</div>


<div class="container">
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
</div>

<!-- End Container Fluid -->