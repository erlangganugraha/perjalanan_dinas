<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$isLogin = $this->session->userdata('username');
		if(($isLogin=="")):
		redirect('login');		
		endif;

		$this->load->model('model_perjalanan');
		$this->load->model('model_laporan', 'model');
    }

    public function index()
	{
		$v['getData'] = $this->model_perjalanan->getData();
		$data['content'] = $this->load->view('data_laporan', $v, true);
 		$this->load->view('theme', $data);
	}

	 public function data()
	{
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('list_laporan', $v, true);
 		$this->load->view('theme', $data);
	}

	public function add()
	{
		$id = $this->uri->segment(3);
		$v['getData'] = $this->model->getDetail($id);
		$data['content'] = $this->load->view('tambah_laporan', $v, true);
 		$this->load->view('theme_laporan', $data);
	}

	public function exeAdd(){
		$simpan = $this->model->insertData();
		if($simpan == "berhasil"){
			echo "<script>alert('Berhasil disimpan');</script>";
			echo "<script>document.location.href = '".base_url()."laporan/data';</script>";
		}
	}

	public function edit()
	{
		$v['editData'] = $this->model->editData();
		$data['content'] = $this->load->view('edit_laporan', $v, true);
 		$this->load->view('theme', $data);
	}

	public function exeEdit(){
		$edit = $this->model->updateData();
		if($edit == "berhasil"){
			echo "<script>alert('Berhasil diubah');</script>";
			echo "<script>document.location.href = '".base_url()."laporan/data';</script>";
		}
	}

	public function exeDelete(){
		$delete = $this->model->deleteData();
		if($delete == "berhasil"){
			echo "<script>alert('Berhasil dihapus');</script>";
			echo "<script>document.location.href = '".base_url()."laporan/data';</script>";
		}
	}

	function bulanID($t1){
		$t2 = str_replace("Jan", "Januari", $t1);
		$t2 = str_replace("Feb", "Februari", $t2);
		$t2 = str_replace("Mar", "Maret", $t2);
		$t2 = str_replace("Apr", "April", $t2);
		$t2 = str_replace("May", "Mei", $t2);
		$t2 = str_replace("Jun", "Juni", $t2);
		$t2 = str_replace("Jul", "Juli", $t2);
		$t2 = str_replace("Aug", "Agustus", $t2);
		$t2 = str_replace("Sep", "September", $t2);
		$t2 = str_replace("Oct", "Oktober", $t2);
		$t2 = str_replace("Nov", "November", $t2);
		$t2 = str_replace("Dec", "Desember", $t2);
		return $t2;
	}

	function generate_pdf(){
		$id = $this->uri->segment(3);
		//$perjalanan = $this->model->getSpPerjalanan($id);
		$laporan = $this->model->editData($id);
		$tgl = date("Y-m-d");
		

		foreach ($laporan as $k) {
			$judul = $k->judul;
			$isi = $k->isi;
			$tgl = $k->tgl_input;
			$id_perjalanan = $k->id_perjalanan;
		}

		$data['pelaksana'] = $this->model->getSpPelaksana($id_perjalanan);

		$bulan = $this->bulanID(date("j M Y", strtotime($tgl)));
		$data['judul'] = $judul;
		$data['isi'] = $isi;
		$data['tgl'] = $bulan;

        //load the view and saved it into $html variable
        $html=$this->load->view('laporan_perjalanan', $data, true );
         //this the the PDF filename that user will get to download
        
        $maksud = $this->limit_text($judul, 5);

        $pdfFilePath = "Laporan_".$maksud.".pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}


	function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]);
      }
      return $text;
    }


}
