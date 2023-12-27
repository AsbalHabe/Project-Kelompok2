<?php

class Announcement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Announcement';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['announce'] = $this->db->get('announcement')->result_array();

        $this->form_validation->set_rules('judul', 'announcement', 'required');
        $this->form_validation->set_rules('deskripsi', 'announcement', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin');
            $this->load->view('announcement/index', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $this->db->insert('announcement', [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal' => $this->input->post('tanggal'),
                'date_created' => time()
            ]);

            $announData = [
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tanggal' => $this->input->post('tanggal'),
                'date_created' => time()
            ];

            $this->session->set_userdata('announData', $announData);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Telah ditambahkan!</div>');

            redirect('admin/announcement');
        }
    }

    public function update($ann_id)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Announcement";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['announcement'] = $this->db->get_where('announcement', ['id' => $ann_id])->row_array();

            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin');
            $this->load->view('announcement/editAnnouncement', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi'),
                'date_created' => time()
            ];

            $this->db->where('id', $ann_id);
            $this->db->update('announcement', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Telah diperbarui!</div>');
            redirect('admin/announcement');
        }
    }

    public function delete($ann_id)
    {
        $event = $this->db->get_where('announcement', ['id' => $ann_id])->row_array();

        if ($event) {
            $this->db->delete('announcement', ['id' => $ann_id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman telah dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengumuman tidak ditemukan!</div>');
        }

        redirect('admin/announcement');
    }
}