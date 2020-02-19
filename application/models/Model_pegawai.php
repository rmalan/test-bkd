<?php
Class Model_pegawai extends CI_Model
{
    public function get()
    {
        return $this->db->get('pegawai');
    }

    public function getById($id)
    {
        return $this->db->where('pegawai_id', $id)->get('pegawai');
    }
}