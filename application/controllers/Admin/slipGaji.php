<?php

class SlipGaji extends CI_Controller
{

    public function index()
    {
        $data['title'] = " Filter Slip Gaji Pegawai";
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/filterSlipGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function cetakSLipGaji()
    {
        $data['title'] = "Cetak Slip Gaji";
        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $nama =$this->input->post('nama_pegawai');
        $bulan =$this->input->post('bulan');
        $tahun =$this->input->post('tahun');
        $bulantahun=$bulan.$tahun;

        $data['print_slip']=$this->db->query("SELECT  data_pegawai.nik,data_pegawai.nama_pegawai,
        data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.tj_transport,data_jabatan.uang_makan,
        data_kehadiran.alfa
        FROM data_pegawai
        INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan
        WHERE data_kehadiran.bulan='$bulantahun' AND data_kehadiran.nama_pegawai='$nama'")->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('admin/cetakSlipGaji', $data);
    }
}
