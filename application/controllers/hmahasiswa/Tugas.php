<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
        		redirect('login');
			}
			$this->load->model("hmahasiswa/tugas_model");
			$this->load->helper("security");
		}
		  
	public function index()
	{
		$this->load->view('hmahasiswa/tugasmhs_view');
	}

	public function data() {
		$prodi = $this->session->userdata("ses_prodi");
		$semester = $this->session->userdata("ses_semester");
		$mk = array();
		$sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester'");
		foreach($sqlmk->result() as $rowmk)
		{
			array_push($mk, $rowmk->kodemk);
		}
		echo json_encode($this->tugas_model
							->ambiltugas($mk)->result());
	}

	public function ambilisi($idtugas) {
		$prodi = $this->session->userdata("ses_prodi");
		$semester = $this->session->userdata("ses_semester");
		$kodemk = $this->session->userdata("ses_kodemk");
		// $sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester' AND kodemk='$kodemk'");
		// foreach($sqlmk->result() as $rowmk)
		// {
		// 	$mk = $rowmk->kodemk;
		// }
		echo json_encode($this->tugas_model
			->gettugas($idtugas)->result());
	}

	public function kirimkomen(){
		$data = array(
			"idtugas" => $this->input->post("idtugas"),
			"idmhs" => $this->input->post("idmhs"),
			"namamhs" => $this->input->post("nama"),
			"jawaban" => $this->input->post("kirimjawaban")			
		);
		$status = $this->tugas_model->createkomen($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function ambilkomentar($idtugas){
		$idmhs = $this->session->userdata("ses_id");
		echo json_encode($this->tugas_model
							->ambilkomen($idtugas, $idmhs)->result());
	}
}
