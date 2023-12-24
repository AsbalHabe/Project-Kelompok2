<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?php foreach ($pegawai as $p) : ?>
        <div class="row">
            <!-- Profil Pegawai -->
            <div class="col-md-5 mb-3">
                <div class="card mb-3 border border-info" style="display: flex; justify-content: center; align-items: center; background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                    <img style="width: 230px;" src="<?= base_url('assets/img/profile/' . $p->foto); ?>" alt="">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><?= $p->nama_pegawai; ?></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    if ($p->hak_akses == 1) {
                                        echo 'Admin';
                                    } else {
                                        echo 'Pegawai';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="display: flex; justify-content: center; align-items: center; background: #FFF; width: 100%; height: 100%;">
                                        <a href="<?= base_url('user/edit'); ?>" class="btn btn-success" style="margin-right: 15px;"><i class="fas fa-pencil"></i></a>
                                        <a href="<?= base_url('user/ubahPassword'); ?>" class="btn btn-primary"><i class="fas fa-key"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Informasi Pegawai -->
            <div class="col-md-7 mb-3">
                <div class="card border border-info" style="display: flex; background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                    <div class="card-body">
                        <h5 style="text-align: center;" class="card-title mt-1">Informasi Anggota</h5>
                        <hr>
                        <div class="form-group row">
                            <label for="username" class="col-sm-10 col-form-label">Jabatan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" name="username" readonly value="<?= $p->jabatan; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-10 col-form-label">Bergabung Sejak</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" name="username" readonly value="<?= $p->tanggal_masuk; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-10 col-form-label">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" name="username" readonly value="<?= $p->status; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
</div>