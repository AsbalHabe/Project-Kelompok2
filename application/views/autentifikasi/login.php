<style>
  body {
    background-color: #f8f9fc;
  }

  .login-container {
    max-width: 400px;
    margin: auto;
    margin-top: 100px;
  }
</style>

<!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">

          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="<?php echo base_url('autentifikasi') ?>" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bolder" style="text-transform: uppercase;">MeconAPP</span>
            </a>
          </div>
          <!-- /Logo -->

          <?= $this->session->flashdata('pesan'); ?>

          <form class="user" method="post" action="<?= base_url('autentifikasi/login'); ?>">
            <div class="form-group my-2">
              <input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" id="email" placeholder="Masukkan Alamat Email" name="email">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group my-2">
              <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>

            <div class="mb-3">
              <input type="submit" value="login" class="btn btn-secondary d-grid w-100"></input>
            </div>

            <div class="mb-3">
              <a href="<?php echo base_url('autentifikasi/register') ?>" class="btn btn-secondary d-grid w-100">Register</a>
            </div>

          </form>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>