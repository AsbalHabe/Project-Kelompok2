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

        $this->load->view('template_admin/header_admin', $data);
        $this->load->view('template_admin/sidebar_admin');
        $this->load->view('announcement/index', $data);
        $this->load->view('template_admin/footer_admin');
    }
}
