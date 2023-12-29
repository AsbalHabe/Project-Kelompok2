<!-- View: profile.php -->

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-3">
            <div class="card mb-3 border border-info" style="display: flex; justify-content: center; align-items: center; background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                <img class="mt-5 border border-info" style="border-radius: 5%; width: 50%;" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-fluid" alt="<?= $user['nama'] ?>">
                <div class="card-body" style="display: flex; align-items: center; flex-direction: column;">
                    <h5 style="text-align: center;" class="card-title mt-4">
                        <?= $user['nama'] ?></h5>
                </div>
                <div class="row-md-5" style="display: flex; justify-content: center; align-items: center; background: #FFF; width: 100%; height: 100%;">
                    <a href="<?= base_url('user/edit'); ?>" class="btn btn-success" style="margin-right: 15px;"><i class=" fas fa-edit"></i>Edit Profile</a>
                    <a href="<?= base_url('user/ubahPassword'); ?>" class="btn btn-primary"><i class="fas fa-lock-open"></i>Ubah Password</a>
                </div>
            </div>
        </div>

        <div class="col-md-7 mb-3">
            <div class="card border border-info" style="display: flex; background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                <div class="card-body">
                    <h5 style="text-align: center;" class="card-title mt-1">Informasi Admin</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label">Nama</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= $user['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label">Aktif Sejak</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= date('d F Y', $user['tanggal_input']); ?>">
                            <?php
                            $tanggal_input = $user['tanggal_input'];
                            $currentTime = time();
                            $timeDifference = $currentTime - $tanggal_input;
                            $daysDifference = floor($timeDifference / (60 * 60 * 24));
                            ?>
                            <!-- <h1 class="style=col-sm-10">Bekerja sejak <?= $daysDifference ?> hari lalu</h1> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".col-lg-12").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>