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