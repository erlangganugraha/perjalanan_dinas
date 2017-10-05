<?php
Class Model_laporan extends CI_Model {

	function getData(){
		$this->db->select('*, perjalanan.maksud_perjalanan, perjalanan.tgl_berangkat, perjalanan.tgl_kembali');
		$this->db->from('laporan');
		$this->db->join('perjalanan', 'perjalanan.id_perjalanan = laporan.id_perjalanan');
		$this->db->order_by('id_laporan', 'DESC');
		$r = $this->db->get();
		return $r->result();
	}

	function getDetail($id){
		$r = $this->db->query("SELECT * FROM perjalanan WHERE id_perjalanan = '$id'");
		return $r->result();
	}

	function getSpPelaksana($id){
		return $this->db->query("
			SELECT *,pegawai.nip,pegawai.nama FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' ORDER BY pegawai.golongan DESC
			")->result();
	}


	function insertData(){
		$result = "";
		
		$data = array(
		   'id_perjalanan' => $this->uri->segment(3) ,
		   'judul' => $this->input->post('txtJudul') ,
		   'isi' => $this->input->post('editor1'),
		   'tgl_input' => date("Y-m-d")
		);

		$exe = $this->db->insert('laporan', $data); 
		if($exe){
			$result = "berhasil";
		}
		

		return $result;
	}

	function editData(){

		$id = $this->uri->segment(3);
		$query = $this->db->query("SELECT * FROM `laporan` WHERE id_laporan = '".$id."'");

		return $query->result();
	}

	function updateData(){
		$result = "";
		$data = array(
		   'judul' => $this->input->post('txtJudul') ,
		   'isi' => $this->input->post('editor1'),
		   'tgl_input' => date("Y-m-d")
		);

		$this->db->where("id_laporan", $this->uri->segment(3));
		$exe = $this->db->update('laporan', $data);
		if($exe){
			$result = "berhasil";
		}
		

		return $result;
	}


	function deleteData(){
		$result = "";

		$this->db->where("id_laporan", $this->uri->segment(3));
		$exe = $this->db->delete('laporan');
		if($exe){
			$result = "berhasil";
		}

		return $result;
	}

}