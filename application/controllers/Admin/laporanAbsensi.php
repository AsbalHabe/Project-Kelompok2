<?php

class laporanAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Laporan Absensi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/filterLaporanAbsensi', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function cetakLaporanAbsensi()
    {
        $data['title'] = "Cetak Laporan Absensi";

        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulanTahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulanTahun = $bulan . $tahun;
        }

        $bulanTahun = $bulan . $tahun;
        $data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulanTahun' ORDER BY nama_pegawai ASC")->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('admin/cetakLaporanAbsensi');
    }
}
