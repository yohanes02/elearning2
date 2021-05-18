<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller
{
	function __construct(){
		parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('islogin') != 'masukdsn'){
			redirect('login');
		}
		$this->load->model("absensi_model");
		$this->load->helper("security");
	}

	public function index() {
		$this->load->view("dosen/absensi_view");
	}

	public function datapermk() {
		// $nim = $this->session->userdata("ses_id");
		$mk = $this->session->userdata("ses_kodemk");
		// $sem = $this->session->userdata("ses_semester");
		echo json_encode($this->absensi_model->dataabsensipermk($mk)->result());
	}

}


?>
