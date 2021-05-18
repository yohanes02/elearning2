<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusimhs extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
        		redirect('login');
			}
			$this->load->model("hmahasiswa/diskusimhs_model");
			$this->load->helper("security");
		}
		  
	public function index()
	{
		$this->load->view('hmahasiswa/diskusimhs_view');		
	}

	// public function ambilmk(){
	// 	$prodi = $this->session->userdata("ses_prodi");
	// 	$semester = $this->session->userdata("ses_semester");
	// 	$sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester'");
	// 	foreach($sqlmk->result() as $rowmk)
	// 	{
	// 		$mk = $rowmk->kodemk;
	// 	}
	// 	echo $mk;
	// }

	public function data($tipe){
		$prodi = $this->session->userdata("ses_prodi");
		$semester = $this->session->userdata("ses_semester");
		$sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester'");
		$mk = array();
		foreach($sqlmk->result() as $rowmk)
		{
			// $mk = $rowmk->kodemk;
			array_push($mk, $rowmk->kodemk);
		}
		$from = "mhs";
		echo json_encode($this->diskusimhs_model
							->ambilmateri($tipe,$mk,$from)->result());
	}
 
	public function ambildiskusi($prodi,$semester,$matakuliah){
		echo json_encode(
				$this->diskusimhs_model
					->ambildiskusi($prodi,$semester,$matakuliah)->result());
	}

	public function ambilisi($idmateri){
		$prodi = $this->session->userdata("ses_prodi");
		$semester = $this->session->userdata("ses_semester");
		$sqlmk = $this->db->query("SELECT * FROM tblmatakuliah WHERE prodi='$prodi' AND semester='$semester'");
		foreach($sqlmk->result() as $rowmk)
		{
			$mk = $rowmk->kodemk;
		}
		echo json_encode($this->diskusimhs_model
			->getdiskusi($idmateri,$mk)->result());
	}

	public function ambilkomentar($idmateri){
		$userid = $this->session->userdata("ses_id");
		echo json_encode($this->diskusimhs_model
							->ambilkomen($idmateri, $userid)->result());
	}

	public function kirimkomen(){
		$data = array(
			"idmateri" => $this->input->post("idmateri"),
			"userid" => $this->input->post("userid"),
			"nama" => $this->input->post("nama"),
			"komentar" => $this->input->post("kirimdiskusi")			
		);
		$status = $this->diskusimhs_model->createkomen($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function hapuskomen($iddiskusi){
		echo json_encode(array(
			"status" => $this->diskusimhs_model->deletekomen($iddiskusi)
		));
	}

	public function datamk($prodi, $sem) {
		$this->load->model("matakuliah_model");
		echo json_encode($this->matakuliah_model->ambilmatakuliah($prodi, $sem)->result());
	}

	public function absenpermk($idmhs, $mk) {
		$this->load->model("absensi_model");
		echo json_encode($this->absensi_model->dataabsensimhspermk($idmhs, $mk)->result());
	}
}
