<?php

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');

    // Cek sesi pengguna atau kondisi lainnya
    if (!$this->session->userdata('user_logged_in')) {
      // Sesuai dengan kebutuhan Anda, bisa diarahkan ke halaman login atau halaman lain
      redirect('autentifikasi'); // Ganti 'autentifikasi' dengan URL halaman yang diinginkan
    }
  }

  public function index()
  {
    $data['title'] = "Dashboard";
    $pegawai = $this->db->query("SELECT * FROM data_pegawai");
    $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
    $jabatan = $this->db->query("SELECT * FROM data_jabatan");
    $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['pegawai'] = $pegawai->num_rows();
    $data['admin'] = $admin->num_rows();
    $data['jabatan'] = $jabatan->num_rows();
    $data['kehadiran'] = $kehadiran->num_rows();
    $data['announce'] = $this->db->get('announcement')->result_array();

    $this->load->view('template_admin/header_admin', $data);
    $this->load->view('template_admin/sidebar_admin');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('template_admin/footer_admin');
  }
}
