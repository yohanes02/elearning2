<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subuploadmateri extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("uploadmateri_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('dosen/subuploadmateri_view');
	}

	public function do_upload() {
		// $this->form_validation->set_rules('prodi', 'prodi', 'required');
		// $this->form_validation->set_rules('semester', 'semester', 'required');
		// $this->form_validation->set_rules('matakuliah', 'matakuliah', 'required');
		$this->form_validation->set_rules('judulmateri', 'judul', 'required');
		// $this->form_validation->set_rules('upload', 'data', 'required');
		if (empty($_FILES['upload']['name']))
		{
			$this->form_validation->set_rules('upload', 'Document', 'required');
		}
		$this->form_validation 
			->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('dosen/subuploadmateri_view');
		}
		else
		{
			$this->load->model("matakuliah_model");
			$datamatkul = json_decode(json_encode($this->matakuliah_model->getmatakuliah($this->input->post('matakuliah'))), true);
			// print_r($datamatkul['namamk']);
			// die();

			$file = $_FILES['upload'];
			$implFile = explode('.', $file['name']);
			$ext = $implFile[count($implFile) - 1];
			// $file_name = $file['name'];
			$file_name = $datamatkul['namamk'].'_materi_pert'.$this->input->post('pert').'.'.$ext;
			$file_name = preg_replace('/\s+/', '_', $file_name);
			$config['upload_path']   = './assets/materi'; 
			$config['allowed_types'] = 'pdf|doc|docx'; 
			$config['max_size']      = 0;
			// $config['file_name']       = $file['name'];
			$config['file_name']       = $file_name;
			$this->load->library('upload', $config);
			//CEK APAKAH UPLOAD BERHASIL ATAU TIDAK, JIKA TIDAK BERHASIL MUNCULKAN ERROR 
			//JIKA BERHASIL LANJUT KE PROSES SELANJUTNYA
			if ( ! $this->upload->do_upload('upload')) {
				$this->session->set_flashdata('berhasil','Gagal Upload');
				redirect("dosen/subuploadmateri");
			}
			//PROSES MENYIMPAN DATA KE DATABASE 
			else { 
				$data['matakuliah']=$this->input->post('matakuliah');
				$data['idpengirim']=$this->session->userdata("ses_id");
				$data['namapengirim']=$this->session->userdata("ses_nama");
				$data['judulmateri']=$this->input->post('judulmateri');
				$data['tanggal']= date('Y-m-d');
				$data['file']=$file_name;
				$data['tipe']= "m";
				$data['prodi']= $this->input->post('prodi');
				$data['semester']= $this->input->post('semester');
				$data['pertemuan']= $this->input->post('pert');
				$this->uploadmateri_model->upmateri($data);
				$this->session->set_flashdata('berhasil','Materi ter-upload.');
				redirect("dosen/subuploadmateri");
			}
		}
		
	}
}


