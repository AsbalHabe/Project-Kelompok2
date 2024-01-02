<div class="container-fluid">

    <div class="content-wrapper">
        <section class="content">
            <h4><strong><?php echo $title ?></strong></h4>

            <div class="table-responsive" style="max-width: 800px; overflow-x: auto;">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 150px;">NIK</th>
                        <td><?php echo $detail->nik ?></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?php echo $detail->nama_pegawai ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?php echo $detail->no_telepon ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo $detail->alamat ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?php echo $detail->jenis_kelamin ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?php echo $detail->jabatan ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td><?php echo $detail->tanggal_masuk ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php echo $detail->status ?></td>
                    </tr>
                </table>
            </div>

            <a href="<?php echo base_url('admin/dataPegawai') ?>" class="btn btn-primary">Kembali</a>
        </section>
    </div>
</div>