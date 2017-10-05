<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
	    $this->load->model('model_login','model');       
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function exeAuth(){
		$login = $this->model->getData();
		if($login == "berhasil"){
			echo "<script>alert('Berhasil login');</script>";
			echo "<script>document.location.href = '".base_url()."pegawai/index';</script>";
		}elseif($login == "gagal"){
			echo "<script>alert('Username Dan Password salah');</script>";
			echo "<script>document.location.href = '".base_url()."login';</script>";
		}
	}

	function logout(){
    	$array_items = array(
	        'username',
	        'nama',
	        'pangkat',
	        'foto'
        );
		$this->session->unset_userdata($array_items);

		redirect('login');
    }
}
