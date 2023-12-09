<?php

class dataPegawai extends CI_Controller
{
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

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nik                        = $this->input->post('nik');
            $nama_pegawai               = $this->input->post('nama_pegawai');
            $jenis_kelamin              = $this->input->post('jenis_kelamin');
            $tanggal_masuk              = $this->input->post('tanggal_masuk');
            $jabatan                    = $this->input->post('jabatan');
            $status                     = $this->input->post('status');
            $foto                      = $_FILES['foto']['name'];
            if ($foto = '') {
            } else {
                $config['upload_path']   = '.assets/foto';
                $config['allowed_types']  = 'jpg|png|jpeg|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo "Foto Gagal di Upload!";
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'                       => $nik,
                'nama_pegawai'              => $nama_pegawai,
                'jenis_kelamin'             => $jenis_kelamin,
                'jabatan'                   => $jabatan,
                'tanggal_masuk'             => $tanggal_masuk,
                'status'                    => $status,
                'foto'                      => $foto,
            );

            $this->PenggajianModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil ditambahkan !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function updateData($id)
    {
        $data['title'] = 'Update Data Pegawai';
        $where = array('id_pegawai' => $id);
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formUpdatePegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_pegawai');
            $this->updateData($id);
        } else {
            $id             = $this->input->post('id');
            $nik            = $this->input->post('nik');
            $nama_pegawai   = $this->input->post('nama_pegawai');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $tanggal_masuk  = $this->input->post('tanggal_masuk');
            $jabatan        = $this->input->post('jabatan');
            $status         = $this->input->post('status');
            $foto           = $_FILES['foto']['name'];

            if ($foto) {
                $config['upload_path']   = './assets/foto';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik'             => $nik,
                'nama_pegawai'    => $nama_pegawai,
                'jenis_kelamin'   => $jenis_kelamin,
                'jabatan'         => $jabatan,
                'tanggal_masuk'   => $tanggal_masuk,
                'status'          => $status,
            );

            $where = array(
                'id_pegawai' => $id
            );

            $this->PenggajianModel->update_data('data_pegawai', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil diupdate !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataPegawai');
        }
    }




    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->PenggajianModel->delete_data($where, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil di Hapus !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/dataPegawai');
    }
}
