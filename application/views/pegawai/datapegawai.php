<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800"><?php echo $title ?></h4>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <!-- Tombol Previous dan Next -->
    <div class="text-right mb-2">
        <?php if ($current_page > 1) : ?>
            <a class="btn btn-sm btn-secondary" href="<?php echo base_url('pegawai/datapegawai?page=' . ($current_page - 1)); ?>">Previous</a>
        <?php endif; ?>

        <?php if ($current_page < $total_pages) : ?>
            <a class="btn btn-sm btn-secondary" href="<?php echo base_url('pegawai/datapegawai?page=' . ($current_page + 1)); ?>">Next</a>
        <?php endif; ?>
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
        </tr>

        <?php $no = 1;
        foreach ($pegawai as $p) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $p->nama_pegawai ?></td>
                <td><?php echo $p->jenis_kelamin ?></td>
                <td><?php echo $p->jabatan ?></td>
                <td><?php echo $p->status ?></td>
                <td><img src="<?php echo base_url() . 'assets/Foto/' . $p->foto ?>" width="75px"></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>