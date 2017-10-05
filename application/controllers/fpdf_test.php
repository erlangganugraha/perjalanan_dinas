<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_test extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    $this->load->model('model_perjalanan','model');       
    }
	
	public function index() {	
		$this->load->library('fpdf_gen');
		
		$this->fpdf->SetFont('Arial','B',16);
		$this->fpdf->Cell(40,10,'Hello World!');
		
		echo $this->fpdf->Output('hello_world.pdf','D');
	}

	public function sp(){
		$this->load->library('fpdf_gen');
		$this->fpdf->SetMargins(77.9, 88.5, 10);
		$this->fpdf->setAutoPageBreak(true,0.5);
		
		$this->fpdf->AddPage(); 
		
		//$this->fpdf->setSourceFile(base_url().'files/template_SP.pdf'); 

		$tplIdx = $this->fpdf->importPage(1); 
		$this->fpdf->useTemplate($tplIdx, 0, 0);

		$this->fpdf->Output('SuratPerintah_'.str_replace('/', '_', $no).'.pdf' , 'D');
	

	}

	public function pdf(){
		$this->model->genPdf();
	}
}
