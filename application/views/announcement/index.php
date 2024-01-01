<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <p style="margin-top: -25px;"></p>

    <div class="row">
        <div class="col-lg-12">
            <?= form_error('judul', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <div class="flash_message">
                <?= $this->session->flashdata('message') ?>
            </div>
            <a href="" data-toggle="modal" data-target="#newAnnouncementModal" class="btn btn-primary mb-3"> Tambah
                Announcement</a>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Isi pengumuman</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($announce as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['judul']; ?></td>
                            <td><?= $a['tanggal']; ?></td>
                            <td><?= $a['deskripsi']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/announcement/update/' . $a['id']); ?>" class="btn btn-success">
                                    <i class="fas fa-edit" style="color: #ffffff;"></i>
                                </a>
                                <a href="<?= base_url('admin/announcement/delete/' . $a['id']); ?>" class="btn btn-danger">
                                    <i class="fas fa-trash" style="color: #ffffff;"></i>
                                </a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal Tambah Announcement -->
<div class="modal fade" id="newAnnouncementModal" tabindex="-1" aria-labelledby="newAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="newAnnouncementModalLabel">Tambah Announcement</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
            </div>
            <form action="<?= base_url('admin/announcement') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Ringkas">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Isi Pengumuman">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Isi Pengumuman">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".flash_message").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>