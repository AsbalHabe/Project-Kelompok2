<?php

class DataPegawai extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Pegawai";
        $per_page = 10;

        $total_rows = $this->PenggajianModel->countData('data_pegawai');
        $total_pages = ceil($total_rows / $per_page);

        $current_page = $this->input->get('page') ? $this->input->get('page') : 1;
        $start_index = ($current_page - 1) * $per_page;

        $data['pegawai'] = $this->PenggajianModel->get_data_pagination('data_pegawai', $per_page, $start_index)->result();

        $data['current_page'] = $current_page;
        $data['total_pages'] = $total_pages;

        $this->load->view('template_pegawai/header_pegawai', $data);
        $this->load->view('template_pegawai/sidebar_pegawai');
        $this->load->view('pegawai/dataPegawai', $data);
        $this->load->view('template_pegawai/footer_pegawai');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }
}
