<?php

class DataAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Absensi Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
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

    public function inputAbsensi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        if($this->input->post('submit' , TRUE) == 'submit'){

            $post=$this->input->post();

            foreach ($post['bulan'] as $key => $value){
                if($post ['bulan'][$key] !='' || $post['nik'][$key] !='')
                {
                    $simpan[] = array(

                        'bulan'                 =>$post['bulan'][$key],
                        'nik'                   =>$post['nik'][$key],
                        'nama_pegawai'          =>$post['nama_pegawai'][$key],
                        'jenis_kelamin'         =>$post['jenis_kelamin'][$key],
                        'nama_jabatan'          =>$post['nama_jabatan'][$key],
                        'hadir'                 =>$post['hadir'][$key],
                        'sakit'                 =>$post['sakit'][$key],
                        'alfa'                 =>$post['alfa'][$key],
                        
                    );
                }
            }

            $this->PenggajianModel->insert_batch('data_kehadiran', $simpan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil ditambahkan !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/dataAbsensi');
            

        }

        $data['title'] = "Form Input Absensi";

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

        $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*,
        data_jabatan.nama_jabatan FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan 
        WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND
        data_pegawai.nik=data_kehadiran.nik ) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formInputAbsensi', $data);
        $this->load->view('template_admin/footer_admin');
    }
}
