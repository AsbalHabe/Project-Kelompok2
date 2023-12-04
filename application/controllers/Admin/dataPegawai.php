<?php

class dataPegawai extends CI_Controller{
    public function index()
    {
        // Set judul halaman
        $data['title'] = "Data Pegawai";
        
        // Mengambil data jabatan dari model
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();
        
        // Memuat tampilan dengan template
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambahData()
    {
       // Set judul halaman
       $data['title'] = "Tambah Data Pegawai";
        
       // Mengambil data jabatan dari model
       $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
       
       // Memuat tampilan dengan template
       $this->load->view('template_admin/header_admin', $data);
       $this->load->view('template_admin/sidebar_admin');
       $this->load->view('admin/formTambahPegawai', $data);
       $this->load->view('template_admin/footer_admin');
    }
}
