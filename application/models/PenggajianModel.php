<?php

class PenggajianModel extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function countData($table)
    {
        return $this->db->count_all($table);
    }

    public function get_data_pagination($table, $limit, $offset)
    {
        // Ambil data dengan batasan dan offset untuk fitur paginasi
        return $this->db->get($table, $limit, $offset);
    }

    // Model (PenggajianModel.php)
    public function checkNikExists($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('data_pegawai');
        return $query->num_rows() > 0;
    }
}
