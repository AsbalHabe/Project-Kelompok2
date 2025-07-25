<style>
    /* Gaya Input Readonly */
    .readonly-input {
        background-color: #f8f9fa;
        /* Warna latar belakang input readonly */
        color: #495057;
        /* Warna teks input readonly */
        cursor: not-allowed;
        /* Kursor tidak bisa diubah saat hover */
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom:100px;">
        <div class="card-body">

            <?php foreach ($pegawai as $p) : ?>

                <form action="<?= base_url('admin/dataPegawai/updateDataAksi') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="hidden" name="nik" value="<?= $p->nik; ?>">
                        <input type="number" class="form-control readonly-input" value="<?= $p->nik; ?>" readonly>
                        <?= form_error('nik', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" value="<?= $p->nama_pegawai; ?>">
                        <?= form_error('nama_pegawai', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" value="<?= $p->no_telepon; ?>">
                        <?= form_error('nomor_telepon', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $p->alamat; ?>">
                        <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option value="<?= $p->jenis_kelamin; ?>"><?= $p->jenis_kelamin; ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="jabatan" id="" class="form-control">
                            <option value="<?= $p->jabatan; ?>"><?= $p->jabatan; ?></option>
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j->nama_jabatan; ?>"><?= $j->nama_jabatan; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('jabatan', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" value="<?= $p->tanggal_masuk; ?>">
                        <?= form_error('tanggal_masuk', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="<?= $p->status; ?>"><?= $p->status; ?></option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                        </select>
                        <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" name="foto" class="form-control" value="<?= $p->foto; ?>">
                        <?= form_error('foto', '<div class="text-small text-danger">', '</div>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            <?php endforeach; ?>
        </div>

    </div>

</div>