<?php
Class Model_pegawai extends CI_Model {

	function getBidang(){
		$this->db->select("*");
		$this->db->from('bidang');
		return $this->db->get()->result();
	}

	function getTingkatan(){
		$this->db->select("*");
		$this->db->from('tingkatan');
		return $this->db->get()->result();
	}

	function getGolongan(){
		$this->db->select("*");
		$this->db->from('golongan');
		return $this->db->get()->result();
	}

	function getData(){
		$this->db->select("*, replace(nip,' ','') as id");
		$this->db->from('pegawai');
		return $this->db->get()->result();
	}

	function getData2(){
		$this->db->select("*, replace(nip,' ','') as id");
		$this->db->from('pegawai');
		$this->db->where('status', 'Aktif');
		return $this->db->get()->result();
	}

	function insertData(){
		$result = "";
		$nip = $this->input->post('txtNip');
		$cek=$this->db->query("SELECT nip FROM pegawai WHERE nip = '$nip'")->num_rows();
		if($cek > 0){
			$result = "ganda";
		}else{
			$data = array(
			   'nip' => $this->input->post('txtNip') ,
			   'nama' => $this->input->post('txtNama') ,
			   'password' => md5("password"),
			   'pangkat' => $this->input->post('txtPangkat'),
			   'golongan' => $this->input->post('txtGolongan'),
			   'jabatan' => $this->input->post('txtJabatan'),
			   'bidang' => $this->input->post('optBidang'),
			   'tingkatan' => $this->input->post('optTingkatan'),
			   'status' => $this->input->post('optStatus')
			);

			$exe = $this->db->insert('pegawai', $data); 
			if($exe){
				$result = "berhasil";
			}
		}

		return $result;
	}

	function editData(){

		$nip = $this->uri->segment(3);
		$query = $this->db->query("SELECT *, REPLACE(nip, ' ', '') as id FROM `pegawai` WHERE REPLACE(nip, ' ', '') = '".$nip."'");

		return $query->result();
	}

	function updateData(){
		$result = "";
		$data = array(
		   'nama' => $this->input->post('txtNama') ,
		   'pangkat' => $this->input->post('txtPangkat'),
		   'golongan' => $this->input->post('txtGolongan'),
		   'jabatan' => $this->input->post('txtJabatan'),
		   'bidang' => $this->input->post('optBidang'),
		   'tingkatan' => $this->input->post('optTingkatan'),
		   'status' => $this->input->post('optStatus')
		);

		$this->db->where("nip", $this->input->post('txtNip'));
		$exe = $this->db->update('pegawai', $data);
		if($exe){
			$result = "berhasil";
		}
		

		return $result;
	}


	function deleteData(){
		$result = "";

		$this->db->where("REPLACE(nip, ' ', '') = ", $this->uri->segment(3));
		$exe = $this->db->delete('pegawai');
		if($exe){
			$result = "berhasil";
		}

		return $result;
	}
	

	

}