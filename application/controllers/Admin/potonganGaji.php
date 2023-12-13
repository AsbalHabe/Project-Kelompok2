<?php

class PotonganGaji extends CI_Controller{

    public function index()
    {
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->PenggajianModel->get_data
        ('potongan_gaji')->result();

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Potogan Gaji";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formPotonganGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }
    
}
