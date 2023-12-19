<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('template_user/header_user');
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('template_user/footer_user');
    }

}