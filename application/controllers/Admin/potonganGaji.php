<?php

class PotonganGaji extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Setting Potongan Gaji";
        $data['pot_gaji'] = $this->PenggajianModel->get_data('potongan_gaji')->result();

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Jenis Potongan Gaji";
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
            $jml_potongan        = $this->input->post('potongan');

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

    public function _rules()
    {
        $this->form_validation->set_rules('potongan','jenis potongan','required');
        $this->form_validation->set_rules('jml_potongan','jumlah potongan','required');
    }
}
