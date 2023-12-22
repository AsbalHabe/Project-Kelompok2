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
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->PenggajianModel->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template_admin/footer_admin');
    }

    public function ubahProfile()
    {
        $data['judul'] = 'Ubah Profile';
        $data['user'] = $this->PenggajianModel->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin', $data);
            $this->load->view('user/ubahProfile', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            // Upload image logic
            $upload_image = $this->upload_image('image', 'pro' . time());

            if ($upload_image) {
                $this->delete_old_image($data['user']['image']);
                $this->db->set('image', $upload_image);
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('user');
        }
    }

    public function edit()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            $userProfile = $this->upload_image('image', 'user' . $data['user']['nama']);

            if ($userProfile) {
                $this->delete_old_image($data['user']['image']);
                $this->db->set('image', $userProfile);
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah tersimpan!</div>');
            redirect('user/index');
        }
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->PenggajianModel->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
            'required' => 'Password saat ini harus diisi'
        ]);

        $this->form_validation->set_rules(
            'password_baru1',
            'Password Baru',
            'required|trim|min_length[4]|matches[password_baru2]',
            [
                'required' => 'Password Baru harus diisi',
                'min_length' => 'Password tidak boleh kurang dari 4 digit',
                'matches' => 'Password Baru tidak sama dengan ulangi password'
            ]
        );

        $this->form_validation->set_rules(
            'password_baru2',
            'Konfirmasi Password Baru',
            'required|trim|min_length[4]|matches[password_baru1]',
            [
                'required' => 'Ulangi Password harus diisi',
                'min_length' => 'Password tidak boleh kurang dari 4 digit',
                'matches' => 'Ulangi Password tidak sama dengan password baru'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('template_admin/sidebar_admin', $data);
            $this->load->view('user/ubahPassword', $data);
            $this->load->view('template_admin/footer_admin');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);

            if (!password_verify($pwd_skrg, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('user/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('user/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
                    redirect('user/ubahPassword');
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
