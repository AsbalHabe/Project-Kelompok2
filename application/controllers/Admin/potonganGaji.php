<?php

class PotonganGaji extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Jenis Potongan Gaji";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/formPotonganGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $potongan            = $this->input->post('potongan');
            $jml_potongan        = $this->input->post('jml_potongan');

            $data = array(
                'potongan'       => $potongan,
                'jml_potongan'   => $jml_potongan
            );

            $this->PenggajianModel->insert_data($data, 'potongan_gaji');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di tambahkan !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/potonganGaji');
        }
    }

    public function updateData($id)
    {
        $where = array('id' => $id);
        $data['title'] = "Update Potongan Gaji";
        $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE
        id='$id'")->result();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/updatePotonganGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $this->updateData($id);
        } else {
            $id           = $this->input->post('id');
            $potongan     = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');

            $data = array(
                'potongan'     => $potongan,
                'jml_potongan' => $jml_potongan,
            );

            $where = array('id' => $id);

            $this->PenggajianModel->update_data('potongan_gaji', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/potonganGaji');
        }
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->PenggajianModel->delete_data($where, 'potongan_gaji');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/potonganGaji');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('potongan', 'jenis potongan', 'required');
        $this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
    }
}
