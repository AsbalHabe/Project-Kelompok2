<?php

class DataPegawai extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $per_page = 5;

        $total_rows = $this->PenggajianModel->countData('data_pegawai');
        $total_pages = ceil($total_rows / $per_page);

        $current_page = $this->input->get('page') ? $this->input->get('page') : 0;
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function check_unique_nik($nik)
    {
        $current_nik = $this->input->post('nik');

        // Cek apakah NIK yang dimasukkan tidak sama dengan NIK saat ini
        if ($current_nik != $nik) {
            $existing_nik = $this->PenggajianModel->isNikExists($nik);

            // Jika NIK digunakan oleh rekord lain, kembalikan FALSE
            if ($existing_nik) {
                $this->form_validation->set_message('check_unique_nik', 'NIK telah digunakan.');
                return FALSE;
            }
        }

        return TRUE;
    }


    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $last_nik = $this->PenggajianModel->get_last_nik();
            $last_nik_number = ($last_nik) ? $last_nik['nik'] : 0;
            $nik = $last_nik_number + 1;

            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            $no_telepon = $this->input->post('no_telepon');
            $alamat = $this->input->post('alamat');
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
                    return;
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
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

    public function updateData($nik)
    {
        $data['title'] = "Update Data Pegawai";
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE nik = '$nik'")->result();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formUpdatePegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }
    public function updateDataAksi()
    {
        $this->_rules();

        $nik = $this->input->post('nik');

        if ($this->form_validation->run() == FALSE) {
            // Validasi form gagal, panggil fungsi updateData tanpa parameter $nik
            $this->updateData($nik);
        } else {
            // Validasi form berhasil
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            $no_telepon = $this->input->post('no_telepon');
            $alamat = $this->input->post('alamat');
            $foto = $_FILES['foto']['name'];

            if ($foto) {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal mengupload foto!</strong> Silakan coba lagi.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/dataPegawai');
                    return;
                }
            }

            $data = array(
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'foto' => $foto,
            );

            $where = array('nik' => $nik);

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



    public function deleteData($nik)
    {
        $where = array('nik' => $nik);
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
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');

        // Perform the search using the model
        $data['pegawai'] = $this->PenggajianModel->get_keyword($keyword);

        // Check if the search is successful
        $data['search_successful'] = ($data['pegawai']) ? true : false;

        // Set flashdata based on the search result
        if ($data['search_successful']) {
            $this->session->set_flashdata('pesan', 'Data ditemukan');
        } else {
            $this->session->set_flashdata('pesan', 'Data tidak ditemukan');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Pegawai";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function detailData($id)
    {
        $this->load->model('PenggajianModel');
        $detail = $this->PenggajianModel->detail_data($id);
        $data['detail'] = $detail;

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = " Detail Data Pegawai";
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/detailPegawai', $data);
        $this->load->view('template_admin/footer_admin');
    }
}
