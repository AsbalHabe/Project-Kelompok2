<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Add your authentication or authorization logic here
        // For example: $this->check_login();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profil Saya';
        $id = $this->session->userdata('nik');
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE nik='$id'")->result();

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template_admin/footer_admin');
    }


    public function edit()
    {
        $data['judul'] = 'Ubah Profil';

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $nama = $this->input->post('nama', true);
            $nama = $this->input->post('nama', true);

            $userProfile = $this->upload_image('image', 'user' . $data['user']['nama']);

            if ($userProfile) {
                $this->delete_old_image($data['user']['image']);
                $this->db->set('image', $userProfile);
            }

            $this->db->set('nama', $nama);
            $this->db->where('nama', $nama);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah tersimpan!</div>');
            redirect('user/index');
        }
    }


    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            // Tampilkan form ubah password
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah!</div>');
                redirect('user/ubahPassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                    redirect('user/ubahPassword');
                } else {
                    // Password is valid, update password
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('user');
                }
            }
        }
    }

    // Helper function to upload image
    private function upload_image($input_name, $file_name)
    {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '4096';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($input_name)) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
            return false;
        }
    }

    // Helper function to delete old image
    private function delete_old_image($image_name)
    {
        $image_path = FCPATH . 'assets/img/profile/' . $image_name;

        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
}
