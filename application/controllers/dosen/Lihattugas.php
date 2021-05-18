<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihattugas extends CI_Controller {
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
		$this->load->view('dosen/lihattugas_view');
	}

	public function data() {
		$prodi = $this->session->userdata("ses_prodi");
		$semester = $this->session->userdata("ses_semester");
		$kodemk = $this->session->userdata("ses_kodemk");
		$sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester' AND kodemk='$kodemk'");
		foreach($sqlmk->result() as $rowmk)
		{
			$mk = $rowmk->kodemk;
		}
		echo json_encode($this->tugas_model
							->ambiltugas($mk)->result());
	}

	public function ambilisi($idtugas) {
		$prodi = $this->session->userdata("ses_prodi");
		$semester = $this->session->userdata("ses_semester");
		$kodemk = $this->session->userdata("ses_kodemk");
		$sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester' AND kodemk='$kodemk'");
		foreach($sqlmk->result() as $rowmk)
		{
			$mk = $rowmk->kodemk;
		}
		echo json_encode($this->tugas_model
			->gettugas($idtugas,$mk)->result());
	}

	public function ambilkomentar($idtugas){
		echo json_encode($this->tugas_model
							->ambilkomen($idtugas)->result());
	}
}
