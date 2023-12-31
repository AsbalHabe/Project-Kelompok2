<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h4>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>

    <!-- Tombol Previous dan Next -->



    <div class="d-flex justify-content-between mb-2">
        <?php echo form_open('admin/dataPegawai/search', 'class="form-inline"'); ?>
        <div class="form-group mr-2">
            <input type="text" name="keyword" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-success">Cari Pegawai</button>
        <?php echo form_close(); ?>

        <a class="mb-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataPegawai/tambahDataAksi'); ?>">
            <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
    </div>
    <?php if (isset($search_successful) && $search_successful) : ?>
        <div class="mt-3">
            <a class="" href="<?php echo base_url('admin/dataPegawai'); ?>">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

    <?php endif; ?>


    </style>
    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nik</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Nomor Telepon</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no = 1;
        foreach ($pegawai as $p) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $p->nik ?></td>
                <td><?php echo $p->nama_pegawai ?></td>
                <td><?php echo $p->no_telepon ?></td>
                <td><?php echo $p->jenis_kelamin ?></td>
                <td><?php echo $p->jabatan ?></td>
                <td><?php echo $p->tanggal_masuk ?></td>
                <td><?php echo $p->status ?></td>
                <td><img src="<?php echo base_url() . 'assets/Foto/' . $p->foto ?>" width="75px"></td>

                <td>
                    <div class="text-center">
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPegawai/updateData/' . $p->nik); ?>"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/' . $p->nik); ?>"><i class="fas fa-trash"></i></a>
                    </div>

                </td>

            </tr>
        <?php endforeach; ?>

    </table>
    <div class="mt-4">
        <?php if (isset($total_pages) && $total_pages > 1) : ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-start">
                    <?php if ($current_page > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo base_url('admin/dataPegawai?page=' . ($current_page - 1)); ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                            <a class="page-link" href="<?php echo base_url('admin/dataPegawai?page=' . $i); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo base_url('admin/dataPegawai?page=' . ($current_page + 1)); ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>