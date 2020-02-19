<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_cuti');
        $this->load->model('Model_pegawai');
        $this->load->model('Model_keterangan');
        $this->load->model('Model_sub_keterangan');
    }
	public function index()
	{
        if ($this->input->post('submit')) {
            $data = array(
                'cuti_nip'              => $this->input->post('nip'),
                'cuti_tanggal_mulai'    => $this->input->post('tanggal_mulai'),
                'cuti_tanggal_selesai'  => $this->input->post('tanggal_selesai'),
                'cuti_sub_jenis_id'     => $this->input->post('sub_jenis_kegiatan'),
                'cuti_nomor_surat'      => $this->input->post('nomor_surat'),
                'cuti_nomor_surat'      => $this->input->post('nomor_surat'),
                'cuti_keterangan'       => $this->input->post('keterangan'),
                'cuti_created_at'        => date("Y-m-d")
            );

            $this->Model_cuti->insert($data);
            $this->session->set_flashdata('message', 'Berhasil dibuat pada ' .date("Y-m-d"));
            redirect('input', 'refresh');
        }

        $data['pegawai'] = $this->Model_pegawai->get()->result();
        $data['kegiatan'] = $this->Model_keterangan->get()->result();

		$this->load->view('input', $data);
    }
    
    public function getPegawaiNama($id)
    {
        $pegawai = $this->Model_pegawai->getById($id)->result();

        echo json_encode($pegawai);
    }

    public function getSubJenisKegiatan($id)
    {
        $subKegiatan = $this->Model_sub_keterangan->getById($id)->result();

        echo json_encode($subKegiatan);
    }
}
