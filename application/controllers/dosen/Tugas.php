<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('islogin') != 'masukdsn') {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('dosen/tugas_view');
	}
}
