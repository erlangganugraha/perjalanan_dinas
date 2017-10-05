<?php
Class Model_login extends CI_Model {

	function getData(){
		$nip = $this->input->post('txtNip');
		$password = md5($this->input->post('txtPassword'));
		$proses = "";

		$query = $this->db->query("select * from pegawai WHERE nip='$nip' AND password='$password'");
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$newdata = array(
			        'username'  => $row['nip'],
			        'nama'  => $row['nama'],
			        'pangkat' => $row['pangkat'],
			        'isLogin' => TRUE
			);
			$this->session->set_userdata($newdata);
			
			$proses = "berhasil";
		}else{
			$proses = "gagal";
		}

		return $proses;
	}
}