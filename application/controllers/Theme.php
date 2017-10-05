<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme extends CI_Controller {

	public function index()
	{
		$data['content'] = $this->load->view('blank', '', true);
 		$this->load->view('theme', $data);
	}
}
