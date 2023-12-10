<?php

class DataAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Absensi Pegawai";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) &&
            $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, 
        data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, data_pegawai.jabatan 
        FROM data_kehadiran
        INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE data_kehadiran.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();
        
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function inputAbensi(){

        $data['title'] = "Form Input Absensi";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formInputAbsensi', $data);
        $this->load->view('template_admin/footer_admin');
    }
}
