<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }

    public function index()
    {
        $this->load->view('admin/dashboard',);
        $this->load->view('template_admin/header_admin',);
        $this->load->view('template_admin/sidebar_admin',);
        $this->load->view('template_admin/topbar',);
        $this->load->view('admin/dashboard',);
        $this->load->view('template_admin/footer_admin');
    }
}
