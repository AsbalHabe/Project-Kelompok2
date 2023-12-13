<?php

class DataPenggajian extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Gaji Pegawai";
    
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) &&
            $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        
        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $data['gaji']  = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai,
        data_pegawai.jenis_kelamin,data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,
        data_jabatan.tj_transport,data_jabatan.uang_makan,data_kehadiran.alfa FROM data_pegawai
        INNER JOIN data_kehadiran on data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan on data_jabatan.nama_jabatan=data_pegawai.jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }
}
