<?php
Class Model_sub_keterangan extends CI_Model
{
    public function getById($id)
    {
        return $this->db->where('sub_jenis_jenis_id', $id)->get('sub_jenis_keterangan');
    }
}