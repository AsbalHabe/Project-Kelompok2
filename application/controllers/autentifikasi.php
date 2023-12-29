<?php
class Autentifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenggajianModel');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('autentifikasi/login');
    }

    public function login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $user = $this->PenggajianModel->cekData(['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'hak_akses' => $user['hak_akses']
                    ];
                    $this->session->set_userdata($data);

                    // Pemeriksaan hak akses setelah login
                    if ($user['hak_akses'] == 1) {
                        redirect('admin/dashboard');
                    } elseif ($user['hak_akses'] == 2) {
                        redirect('autentifikasi/blok');
                    } else {
                        // Redirect ke halaman lain jika hak akses tidak mencukupi
                        redirect('error/unauthorized');
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



    // ... (fungsi lainnya tetap sama)


    public function blok()
    {
        $this->session->set_flashdata('pesan', 'Akses tidak diizinkan. Silakan login kembali.');
        redirect('autentifikasi');
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
            $this->load->view('template_admin/header_admin', $data);
            $this->load->view('autentifikasi/register');
            $this->load->view('template_admin/footer_admin');
        } else {
            // Form validation successful, save user data
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'hak_akses' => 1,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->PenggajianModel->simpanData($data); // Save user data using the model
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('autentifikasi');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('hak_akses');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('autentifikasi');
    }
}
