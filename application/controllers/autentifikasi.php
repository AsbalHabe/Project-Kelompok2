<?php
class Autentifikasi extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->database('penggajian'); // Load the database library
        $this->load->library('login.php'); // Load the session library
    }

    public function index() {
        if ($this->session->userdata('log')) {
            redirect('admin/dashboard'); // Redirect to admin dashboard if already logged in
        }

        $this->load->view('login.php');
    }

    public function login() {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $query = $this->db->get_where('login', array('username' => $user));
        $cariuser = $query->row_array();

        if ($cariuser && password_verify($pass, $cariuser['password'])) {
            $this->session->set_userdata('userid', $cariuser['id']);
            $this->session->set_userdata('username', $cariuser['username']);
            $this->session->set_userdata('log', 'login.php');

            redirect('admin/dashboard'); // Redirect to admin dashboard after successful login
        } else {
            echo '<script>alert("Data yang anda masukan salah !!");history.go(-1);</script>';
        }
    }

    public function logout() {
        $this->session->sess_destroy(); // Destroy the session
        redirect('autentifikasi'); // Redirect to the login page after logout
    }
}
