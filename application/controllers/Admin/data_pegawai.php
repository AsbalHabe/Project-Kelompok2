<?php

class Data_pegawai extends CI_Controller{
    public function index(){
        $data = $this->db->query("SELECT * FROM data_pegawai")->result();
        var_dump($data);
    }
}