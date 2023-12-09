<?php

class DataAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Absensi Pegawai";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('template_admin/footer_admin');
    }
}