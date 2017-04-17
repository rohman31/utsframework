<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function index($idKlub)
	{
		$this->load->model('klub_model');		
		$data["pemain_list"] = $this->klub_model->getPemainKlub($idKlub);
		$this->load->view('pemain', $data);
	}

	public function create($idKlub)
	{
		// idKlub = 1
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->load->model('klub_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('tambah_pemain_view');
		}else{
			$this->klub_model->insertPemain($idKlub);
			$this->load->view('tambah_pemain_sukses');
		}
	}
	public function update($idKlub)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required|numeric');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'trim|required|alpha_numeric_spaces');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pegawai_model');
		$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_pegawai_view',$data);

		}else{
			$this->pegawai_model->updateById($id);
			$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
			$this->load->view('pegawai',$data);

		}
	}

	public function delete()
	{
		
	}

}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */

 ?>