<?php
class Autentifikasi extends CI_Controller
{
    public function index()
    {
        // If the user is already logged in, redirect to the user dashboard
        if ($this->session->userdata('email')) {
            redirect('login');
        }

        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => 'Email Harus diisi!!',
                'valid_email' => 'Email Tidak Benar!!'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Harus diisi'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'login';
            $data['user'] = '';

            // Load views
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('template_admin/footer_admin');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->Modeluser->cekData(['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        if ($user['image'] == 'default.jpg') {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                        }
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('autentifikasi');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }

    public function blok()
        {
            $this->load->view('autentifikasi/blok');
        }   
    public function gagal()
        {
            $this->load->view('autentifikasi/gagal');
        }
    
    public function register()
        {
            // Redirect user to the dashboard if already logged in
            if ($this->session->userdata('email')) {
                redirect('user');
            }
        
            // Set form validation rules
            $this->form_validation->set_rules(
                'nama',
                'Nama Lengkap',
                'required',
                ['required' => 'Nama Belum diisi!!']
            );
            $this->form_validation->set_rules(
                'email',
                'Alamat Email',
                'required|trim|valid_email|is_unique[user.email]',
                [
                    'valid_email' => 'Email Tidak Benar!!',
                    'required' => 'Email Belum diisi!!',
                    'is_unique' => 'Email Sudah Terdaftar!'
                ]
            );
            $this->form_validation->set_rules(
                'password1',
                'Password',
                'required|trim|min_length[3]|matches[password2]',
                [
                    'matches' => 'Password Tidak Sama!!',
                    'min_length' => 'Password Terlalu Pendek'
                ]
            );
            $this->form_validation->set_rules(
                'password2',
                'Repeat Password',
                'required|trim|matches[password1]'
            );
        
            // Check form validation
            if ($this->form_validation->run() == false) {
                // Load registration view with validation errors
                $data['judul'] = 'Registrasi Member';
                $this->load->view('autentifikasi/register');
            } else {
                // Form validation successful, save user data
                $email = $this->input->post('email', true);
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'email' => htmlspecialchars($email),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 0,
                    'tanggal_input' => time()
                ];
        
                $this->Modeluser->simpanData($data); // Save user data using the model
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
                redirect('autentifikasi');
            }
        }
        
    public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata
            ('pesan','<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
            redirect('autentifikasi');
        }

        

}

