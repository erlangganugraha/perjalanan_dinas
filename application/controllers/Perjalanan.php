<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perjalanan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$isLogin = $this->session->userdata('username');
		if(($isLogin=="")):
		redirect('login');		
		endif;

		$this->load->model('model_pegawai');
		$this->load->model('model_perjalanan', 'model');
    }

    public function index()
	{
		$v['getData'] = $this->model->getData();
		$data['content'] = $this->load->view('data_perjalanan', $v, true);
 		$this->load->view('theme', $data);
	}

	public function sp()
	{
		$data['content'] = $this->load->view('data_perjalanan', '', true);
 		$this->load->view('theme', $data);
	}

	public function detail()
	{
		$v['getData'] = $this->model->getDetail($this->uri->segment(3));
		$v['getData2'] = $this->model->getDetail2($this->uri->segment(3));
		$data['content'] = $this->load->view('detail_perjalanan', $v, true);
 		$this->load->view('theme', $data);
	}

	public function add()
	{
		$v['getPenugas1'] = $this->model->getPenugas1();
		$v['getPenugas2'] = $this->model->getPenugas2();
		$v['getPenugas3'] = $this->model->getPenugas3();
		$v['getData'] = $this->model_pegawai->getData2();
		$data['content'] = $this->load->view('tambah_perjalanan', $v, true);
 		$this->load->view('theme', $data);
	}

	public function exeAdd(){
		$simpan = $this->model->insertData();
		if($simpan == "gandatugas"){
			$id= "";
			foreach($this->input->post('txtPelaksana') as $nip) {
		    	$id = $id."'".$nip."',";
	    	}

			$id = rtrim($id, ",");
			$ganda = $this->model->getDataGanda($id,$this->input->post('txtTglBerangkat'),$this->input->post('txtTglKembali'));
			$list = "";
			foreach ($ganda as $k) {
				$list = $list." ".$k->nama."\\n";
			}
			$list = rtrim($list, ",");

			$message = $list. "\\n Ditanggal tersebut sedang ada penugasan";

			echo "<script>alert('".$message."');</script>";
	    	echo "<script>document.location.href = '".base_url()."perjalanan/add';</script>";
		}
		elseif($simpan == "berhasil"){
			echo "<script>alert('Berhasil disimpan');</script>";
			echo "<script>document.location.href = '".base_url()."perjalanan/index';</script>";
		}
	}

	public function edit()
	{
		$id= $this->uri->segment(3);
		$v['getPenugas1'] = $this->model->getPenugas1();
		$v['getPenugas2'] = $this->model->getPenugas2();
		$v['getPenugas3'] = $this->model->getPenugas3();
		$v['getEdit'] = $this->model->editData($id);
		foreach ($v['getEdit'] as $key) {
			$kpa = $key->kpa;
			$penugas = $key->penugas;
		}

		$v['kpa'] = $this->model->editData2($kpa);
		$v['penugas'] = $this->model->editData2($penugas);

		$data['content'] = $this->load->view('edit_perjalanan', $v, true);
 		$this->load->view('theme', $data);
	}

	public function exeEdit(){
		$edit = $this->model->updateData();
		if($edit == "berhasil"){
			echo "<script>alert('Berhasil diubah');</script>";
			echo "<script>document.location.href = '".base_url()."perjalanan/index';</script>";
		}
	}

	public function exeDelete(){
		$delete = $this->model->deleteData();
		if($delete == "berhasil"){
			echo "<script>alert('Berhasil dihapus');</script>";
			echo "<script>document.location.href = '".base_url()."perjalanan/index';</script>";
		}
	}

	/*function test(){
		$this->model->getDataTgl("'19670323 200701 1 006'","2017-08-02","2017-08-04");
	}*/

	function test(){
		$this->model->getIdPerjalanan();
	}

	public function pdfSpd(){
		$this->model->genPdfSpd($this->uri->segment(4),$this->uri->segment(3));
	}

	public function pdfSp(){
		$this->model->genPdfSp($this->uri->segment(4),$this->uri->segment(3));
	}

	function datepicker(){
		$data['content'] = $this->load->view('datepicker', '', true);
 		$this->load->view('theme', $data);
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

	function laporan_pdf2(){
		$data = [];
        //load the view and saved it into $html variable
        $html=$this->load->view('example_laporan');
         //this the the PDF filename that user will get to download
        /*$pdfFilePath = "output_pdf_name.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");*/
 
       
	}


	function laporan_pdf3(){
		$data = [];
        //load the view and saved it into $html variable
        $html=$this->load->view('example_laporan', $data, true );
         //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
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

	function laporan_sp(){
		$id = $this->uri->segment(3);
		$perjalanan = $this->model->getSpPerjalanan($id);
		$pelaksana = $this->model->getSpPelaksana($id);
		$tgl = date("Y-m-d");
		$bulan = $this->bulanID(date("j M Y", strtotime($tgl)));

		foreach ($perjalanan as $k) {
			$no_surat = $k->no_surat;
			$dasar = $k->dasar;
			$untuk = $k->untuk;
			$tgl_input = $k->tgl_input;
			$maksud = $k->maksud_perjalanan;
			$tgl_ayena = $bulan;
			$kpa = $k->kpa;
		}

		$ttd = $this->model->getSpKpa($kpa);
		foreach ($ttd as $j) {
			$jabatanKpa = $j->jabatan;
			$bidangKpa = $j->bidang;
			$pangkatKpa = $j->pangkat;
			$namaKpa = $j->nama;
			$nipKpa = $j->nip;
		}

		$data['no_surat'] = $no_surat;
		$data['dasar'] = $dasar;
		$data['untuk'] = $untuk;
		$data['tgl_input'] = $tgl_input;
		$data['tgl_ayena'] = $tgl_ayena;
		$data['maksud'] = $maksud;
		$data['pelaksana'] = $pelaksana;

		$data['jabatanKpa'] =  $jabatanKpa;
		$data['bidangKpa'] = $bidangKpa;
		$data['pangkatKpa'] = $pangkatKpa;
		$data['namaKpa'] = $namaKpa;
		$data['nipKpa'] = $nipKpa;

        //load the view and saved it into $html variable
        $html=$this->load->view('sp_laporan', $data, true );
         //this the the PDF filename that user will get to download
        $unik = date("Hms");
        $pdfFilePath = "Surat Perintah ".$maksud."_".$unik.".pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}

	function laporan_sp2(){
		$id = $this->uri->segment(3);
		$perjalanan = $this->model->getSpPerjalanan($id);
		$pelaksana = $this->model->getSpPelaksana($id);
		$tgl = date("Y-m-d");
		$bulan = $this->bulanID(date("j M Y", strtotime($tgl)));

		foreach ($perjalanan as $k) {
			$no_surat = $k->no_surat;
			$dasar = $k->dasar;
			$untuk = $k->untuk;
			$tgl_input = $k->tgl_input;
			$maksud = $k->maksud_perjalanan;
			$tgl_ayena = $bulan;
			$kpa = $k->kpa;
		}

		$ttd = $this->model->getSpKpa($kpa);
		foreach ($ttd as $j) {
			$jabatanKpa = $j->jabatan;
			$bidangKpa = $j->bidang;
			$pangkatKpa = $j->pangkat;
			$namaKpa = $j->nama;
			$nipKpa = $j->nip;
		}

		$data['no_surat'] = $no_surat;
		$data['dasar'] = $dasar;
		$data['untuk'] = $untuk;
		$data['tgl_input'] = $tgl_input;
		$data['tgl_ayena'] = $tgl_ayena;
		$data['maksud'] = $maksud;
		$data['pelaksana'] = $pelaksana;

		$data['jabatanKpa'] =  $jabatanKpa;
		$data['bidangKpa'] = $bidangKpa;
		$data['pangkatKpa'] = $pangkatKpa;
		$data['namaKpa'] = $namaKpa;
		$data['nipKpa'] = $nipKpa;

        //load the view and saved it into $html variable
        $html=$this->load->view('sp_laporan_nonkop', $data, true );
         //this the the PDF filename that user will get to download
        $unik = date("Hms");
        $pdfFilePath = "Surat Perintah ".$maksud."_".$unik.".pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
	}

}
