<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mx-auto shadow-lg p-3 mb-5 rounded" style="width: 65%; height: 70vh; background: linear-gradient(45deg, #3949ab, #1e88e5); color: white;">
        <div class="card-header" style="background-color: #2196f3; color: #212529; text-align: center;">
            <h3 class="mb-0">Filter Slip Gaji</h3>
        </div>

        <form action="<?= base_url('admin/slipGaji/cetakSlipGaji'); ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="bulan" class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #3f51b5;"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <select name="bulan" id="bulan" class="form-control" style="background-color: #3f51b5; color: white;">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #3f51b5;"><i class="fas fa-calendar"></i></span>
                            </div>
                            <select name="tahun" id="tahun" class="form-control" style="background-color: #3f51b5; color: white;">
                                <option value="">-- Pilih Tahun --</option>
                                <?php
                                $tahun = date('Y');
                                for ($i = 2020; $i < $tahun + 20; $i++) { ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun" class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background-color: #3f51b5;"><i class="fas fa-user"></i></span>
                            </div>
                            <select name="nama_pegawai" id="tahun" class="form-control" style="background-color: #3f51b5; color: white;">
                                <option value="">-- Pilih Pegawai --</option>
                                <?php foreach ($pegawai as $p) : ?>
                                    <option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-info btn-block btn-print" style="background-color: #2196f3;"><i class="fas fa-print"></i> Cetak Slip Gaji</button>
            </div>
        </form>

    </div>
</div>