<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buattugas extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('islogin') != 'masukdsn') {
			redirect('login');
		}

		$this->load->model("dosen/tugas_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view('dosen/buattugas_view');
	}

	public function simpan()
	{
		$this->form_validation->set_rules('tipetugas', 'tipe tugas', 'required');
		$this->form_validation->set_rules('judultugas', 'judul', 'required');
		$this->form_validation->set_rules('isitugas', 'tugas', 'required');
		$this->form_validation->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dosen/buattugas_view');
		} else {
			$data = array(
				"iddosen" => $this->session->userdata("ses_id"),
				"namadosen" => $this->session->userdata("ses_nama"),
				"matakuliah" => $this->input->post("matakuliah"),
				"judultugas" => $this->input->post("judultugas"),
				"isi" => $this->input->post("isitugas"),
				"tipe" => $this->input->post("tipetugas"),
				"prodi" => $this->input->post("prodi"),
				"semester" => $this->input->post("semester"),
			);

			$this->tugas_model->uptugas($data);

			$this->session->set_flashdata('berhasil','Tugas telah terupload.');
			redirect('dosen/buattugas');
		}
	}
}
