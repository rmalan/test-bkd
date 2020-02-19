<?php
Class Model_keterangan extends CI_Model
{
    public function get()
    {
        return $this->db->get('jenis_keterangan');
    }
}