<?php
Class Model_cuti extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('cuti', $data);
    }
}