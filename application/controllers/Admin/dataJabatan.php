<?php

class DataJabatan extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/tambahDataJabatan', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambah_data_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nama_jabatan   = $this->input->post('nama_jabatan');
            $gaji_pokok     = $this->input->post('gaji_pokok');
            $tj_transport   = $this->input->post('tj_transport');
            $uang_makan     = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan'  => $nama_jabatan,
                'gaji_pokok'    => $gaji_pokok,
                'tj_transport'  => $tj_transport,
                'uang_makan'    => $uang_makan,
            );

            $this->PenggajianModel->insert_data($data, 'data_jabatan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil ditambahkan !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/dataJabatan');
        }
    }

    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Update Data";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id             = $this->input->post('id_jabatan');
            $nama_jabatan   = $this->input->post('nama_jabatan');
            $gaji_pokok     = $this->input->post('gaji_pokok');
            $tj_transport   = $this->input->post('tj_transport');
            $uang_makan     = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan'  => $nama_jabatan,
                'gaji_pokok'    => $gaji_pokok,
                'tj_transport'  => $tj_transport,
                'uang_makan'    => $uang_makan,
            );

            $where = array(
                'id_jabatan' => $id,
            );

            $this->PenggajianModel->update_data('data_jabatan', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Update !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/dataJabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'Tunjangan Transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'Uang Makan', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->PenggajianModel->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil di Hapus !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('admin/dataJabatan');
    }
}
