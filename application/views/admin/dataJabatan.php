<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray"><?php echo $title; ?></h1>
    </div>
    <a class="btn btn-sm btn-success mb-3 " href="<?php echo base_url('admin/dataJabatan/tambahData' ) ?>"><i class="fas fa-plus"></i>Tambah Data</a>

    <?php echo $this->session->flashdata('pesan') ?>
    <table class="table table-bordered table-stripped mt-2">
        <tr>
            <th class="text-center">NO</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tj. Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no = 1; foreach ($jabatan as $j) : ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $j->nama_jabatan; ?> </td>
                <td>Rp. <?php echo number_format($j->gaji_pokok, 0, ',', '.'); ?> </td>
                <td>Rp. <?php echo number_format($j->tj_transport, 0, ',', '.'); ?> </td>
                <td>Rp. <?php echo number_format($j->uang_makan, 0, ',', '.'); ?> </td>
                <td>Rp. <?php echo number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan, 0, ',', '.'); ?> </td>
                <td>
                    <div class="text-center">
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJabatan/updateData/' . $j->id_jabatan); ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJabatan/deleteData/' . $j->id_jabatan); ?>"><i class="fas fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
