<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Login</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
  <?php
  $alert_message = $this->session->flashdata('pesan');
  if ($alert_message) {
    echo '<script>alert("' . $alert_message . '");</script>';
  }
  ?>


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