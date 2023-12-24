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

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }


    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
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
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal mengupload foto!</strong> Silakan coba lagi.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/dataPegawai');
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            // Verifikasi apakah email sudah terdaftar
            $registered_email = $this->PenggajianModel->get_pegawai_by_email($email);

            if ($registered_email) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Email sudah terdaftar!</strong> Silakan gunakan email lain.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/dataPegawai');
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'foto' => $foto,
            );

            $this->PenggajianModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function updateData($id)
    {
        $data['title'] = "Update Data Pegawai";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
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
            $id = $this->input->post('id_pegawai');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['upload_path'] = './assets/Foto';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                    $this->db->set('foto', $foto);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal mengupload foto!</strong> Silakan coba lagi.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/dataPegawai');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                'username' => $username,
                'email' => $email,
                'password' => $password,
            );

            $where = array('id_pegawai' => $id);

            $this->PenggajianModel->update_data('data_pegawai', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->PenggajianModel->delete_data($where, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('admin/dataPegawai');
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
