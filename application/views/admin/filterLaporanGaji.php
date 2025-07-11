<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card mx-auto" style="width: 50%;">
        <div class="card-header text-white text-center"" style=" background: linear-gradient(45deg, #3949ab, #1e88e5);">
            Filter Laporan Gaji Pegawai
        </div>
        <form action="<?php echo base_url('admin/laporanGaji/cetakLaporanGaji') ?>" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="">Bulan</label>
                    <div class="col-sm-9">
                        <select name="bulan" class="form-control">
                            <option value="">--Pilih Bulan--</option>
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

                <div class="form-group row">
                    <label for="">Tahun</label>
                    <div class="col-sm-9">
                        <select name="tahun" id="" class="form-control">
                            <option value="">--Pilih Tahun--</option>
                            <?php
                            $tahun = date('Y');
                            for ($i = 2020; $i < $tahun + 10; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button style="width: 100%;" type="submit" class="btn btn-primary"><i class="fas fa-file-download fa-lg"></i> Unduh Laporan Gaji</button>
            </div>
    </div>
    </form>




</div>