<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('islogin') != 'masukmhs'){
			redirect('login');
		}
		$this->load->model("absensi_model");
		$this->load->helper("security");
	}

	public function index() {
		$this->load->view("hmahasiswa/absensi_view");
	}

	public function datapermhs() {
		$nim = $this->session->userdata("ses_id");
		$prodi = $this->session->userdata("ses_prodi");
		$sem = $this->session->userdata("ses_semester");
		echo json_encode($this->absensi_model->dataabsensipermhs($nim, $prodi, $sem)->result());
	}

}


?>
