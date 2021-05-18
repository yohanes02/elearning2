<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
	parent::__construct();
		//validasi jika user belum login
		if($this->session->userdata('islogin') != 'masuk'){
        	redirect('login');
		}
		$this->load->model("home_model");
		$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view('home_view');		
	}

	public function data(){
		echo json_encode($this->home_model->ambil()->result());
	}

	public function simpan(){	
		$data = array(
			"idpengirim" => $this->session->userdata("ses_id"),
			"nama" => $this->session->userdata("ses_nama"),				
			"isi" => $this->input->post("isihide"),
			"tanggal" => date('Y-m-d H:i:s')
		);

		$status = $this->home_model->buatpeng($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->home_model->delete($id)
		));
	}

	public function delete() {
		if(file_exists("./assets/img/fotomahasiswa/testdel.png")) {
			echo "DELETE FILE";
			unlink("./assets/img/fotomahasiswa/testdel.png");
		} else {
			echo "FILE NOT EXIST";
		}
	}
}
