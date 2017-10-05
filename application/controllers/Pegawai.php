<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$isLogin = $this->session->userdata('username');
		if(($isLogin=="")):
		redirect('login');		
		endif;
	    $this->load->model('model_pegawai','model');       
    }

    public function laporan_pdf(){
	    $data = array(
	        "dataku" => array(
	            "nama" => "Petani Kode",
	            "url" => "http://petanikode.com"
	        )
	    );

	    $this->load->library('pdf');

	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "laporan-petanikode.pdf";
	    $this->pdf->load_view('laporan_pdf', $data);
	}

	public function index()
	{
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('data_pegawai', $v, true);
 		$this->load->view('theme', $data);
	}

	public function add()
	{
		$v['getGolongan'] = $this->model->getGolongan();
		$v['getBidang'] = $this->model->getBidang();
		$v['getTingkatan'] = $this->model->getTingkatan();
		$data['content'] = $this->load->view('tambah_pegawai', $v, true);
 		$this->load->view('theme', $data);
	}

	public function exeAdd(){
		$simpan = $this->model->insertData();
		if($simpan == "ganda"){
			echo "<script>alert('NIP ada yang sama');</script>";
			echo "<script>document.location.href = '".base_url()."pegawai/add';</script>";
		}elseif($simpan == "berhasil"){
			echo "<script>alert('Berhasil disimpan');</script>";
			echo "<script>document.location.href = '".base_url()."pegawai/index';</script>";
		}
	}

	public function edit()
	{
		$v['getGolongan'] = $this->model->getGolongan();
		$v['getBidang'] = $this->model->getBidang();
		$v['getTingkatan'] = $this->model->getTingkatan();
		$v['editData'] = $this->model->editData();
		$data['content'] = $this->load->view('edit_pegawai', $v, true);
 		$this->load->view('theme', $data);
	}

	public function exeEdit(){
		$edit = $this->model->updateData();
		if($edit == "berhasil"){
			echo "<script>alert('Berhasil diubah');</script>";
			echo "<script>document.location.href = '".base_url()."pegawai/index';</script>";
		}
	}

	public function exeDelete(){
		$delete = $this->model->deleteData();
		if($delete == "berhasil"){
			echo "<script>alert('Berhasil dihapus');</script>";
			echo "<script>document.location.href = '".base_url()."pegawai/index';</script>";
		}
	}
}
