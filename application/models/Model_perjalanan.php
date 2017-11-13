<?php
Class Model_perjalanan extends CI_Model {

	function getData(){
		$p = $this->db->query("SELECT *,count(id_pelaksana) as jumlah_orang FROM perjalanan INNER JOIN pelaksana on perjalanan.id_perjalanan = pelaksana.id_perjalanan GROUP BY pelaksana.id_perjalanan ORDER BY perjalanan.id_perjalanan DESC")->result();
		return $p;
	}

	function getDetail($id){
		$p = $this->db->query("SELECT * , pegawai.nama,pegawai.jabatan FROM perjalanan
			JOIN pelaksana on perjalanan.id_perjalanan = pelaksana.id_perjalanan
			JOIN pegawai on pegawai.nip = pelaksana.nip WHERE perjalanan.id_perjalanan = '$id' ")->result();
		return $p;
	}

	function getDetail2($id){
		$p = $this->db->query("SELECT * FROM perjalanan")->result();
		return $p;
	}

	function insertData(){
		$result = "";
		$data = array(
		   'no_surat' => $this->input->post('txtNoSurat') ,
		   'dasar' => $this->input->post('editor1') ,
		   'untuk' => $this->input->post('editor2') ,
		   'maksud_perjalanan' => $this->input->post('txtMaksudPerjalanan'),
		   'tingkat_biaya' => $this->input->post('txtTingkatBiaya'),
		   'kpa' => $this->input->post('txtKpa'),
		   'tempat_berangkat' => $this->input->post('txtTempatBerangkat'),
		   'tempat_tujuan' => $this->input->post('txtTempatTujuan'),
		   'tgl_berangkat' => $this->input->post('txtTglBerangkat'),
		   'tgl_kembali' => $this->input->post('txtTglKembali'),
		   'instansi' => $this->input->post('txtInstansi'),
		   'akun' => $this->input->post('txtAkun'),
		   'penugas' => $this->input->post('txtPenugas'),
		   'alat_angkut' => $this->input->post('txtAlatAngkut'),
		   'tgl_input' => date('Y-m-d')
		);

		$id= "";
		/*$id_perjalanan = $this->getIdPerjalanan();
		foreach($this->input->post('txtPelaksana') as $nip) {
        $d[] = array('id_perjalanan' => $id_perjalanan,
        	'nip' => $nip,
        	);
    	$id = $id."'".$nip."',";
    	}

		$id = rtrim($id, ",");*/
		 
		$cek = $this->getDataTgl($this->input->post('txtTglBerangkat'), $this->input->post('txtTglKembali'));

    	if($cek['status'] == "ada"){
    		$result = "gandatugas";
    	}else{
    		$simpan = $this->db->insert('perjalanan', $data);
    		$insert_id = $this->db->insert_id('perjalanan');
    		foreach($this->input->post('txtPelaksana') as $nip) {
	        $data2[] = array('id_perjalanan' => $insert_id,
	        	'nip' => $nip,
	        	'tgl_berangkat' => $this->input->post('txtTglBerangkat'),
		   		'tgl_kembali' => $this->input->post('txtTglKembali'),
	        	);
	    	}

    		$simpan2 =  $this->db->insert_batch('pelaksana', $data2);
    		if($simpan2 == TRUE && $simpan == TRUE){
    			$result = "berhasil";
    		}
    	}
		
		return $result;
	}

	function editData($id){
		$query = $this->db->query("SELECT * FROM perjalanan WHERE id_perjalanan = '$id'");

		return $query->result();
	}

	function editData2($id){
		$query = $this->db->query("SELECT * FROM pegawai WHERE nip = '$id'");

		return $query->result();
	}

	function updateData(){
		$result = "";
		$data = array(
		   'no_surat' => $this->input->post('txtNoSurat') ,
		   'dasar' => $this->input->post('editor1') ,
		   'untuk' => $this->input->post('editor2') ,
		   'maksud_perjalanan' => $this->input->post('txtMaksudPerjalanan'),
		   'tingkat_biaya' => $this->input->post('txtTingkatBiaya'),
		   'kpa' => $this->input->post('txtKpa'),
		   'tempat_berangkat' => $this->input->post('txtTempatBerangkat'),
		   'tempat_tujuan' => $this->input->post('txtTempatTujuan'),
		   'tgl_berangkat' => $this->input->post('txtTglBerangkat'),
		   'tgl_kembali' => $this->input->post('txtTglKembali'),
		   'instansi' => $this->input->post('txtInstansi'),
		   'akun' => $this->input->post('txtAkun'),
		   'penugas' => $this->input->post('txtPenugas'),
		   'alat_angkut' => $this->input->post('txtAlatAngkut'),
		   'tgl_input' => date('Y-m-d')
		);

		$tgl_berangkat = $this->input->post('txtTglBerangkat');
		$tgl_kembali = $this->input->post('txtTglKembali');

		//$cek = $this->cekEditDataTgl($this->input->post('txtTglBerangkat'), $this->input->post('txtTglKembali'));

		$cek['status'] = "";
		if($cek['status']=="ada"){
			$result = "gandatugas";
		}else{
			$this->db->where("id_perjalanan", $this->uri->segment(3));
			$exe = $this->db->update('perjalanan', $data);

			$id = $this->uri->segment(3);

			$exe2 = $this->db->query(
				"UPDATE `pelaksana` SET `tgl_berangkat`='$tgl_berangkat',`tgl_kembali`='$tgl_kembali' WHERE id_perjalanan = '$id'"
			);
			if($exe && $exe2){
				$result = "berhasil";
			}
		}

		
		

		return $result;
	}
	
	function cekPelaksana($id){

		$getData = $this->db->query("SELECT * FROM pelaksana WHERE (nip IN($id)) ORDER BY tgl_berangkat ASC LIMIT 1");
		$row = $getData->row();

		$tgl = "";
		$tgl_mulai = $row->tgl_berangkat;
		$tgl_akhir = $this->input->post('txtTglKembali');
		$tgl_tambah = date('Y-m-d', strtotime($tgl_mulai. ' - 1 days'));
		
		for ($i=$tgl_mulai; $i <= $tgl_akhir ; $i++) {
			$tgl_tambah = date('Y-m-d', strtotime($tgl_tambah. ' + 1 days'));
			$tgl = $tgl.$tgl_tambah.", ";
		}

		$tgl = rtrim($tgl, ", ");

		$query = $this->db->query("SELECT * FROM pelaksana WHERE (nip IN($id)) AND (tgl_kembali IN ($tgl) OR tgl_berangkat IN($tgl))");

		if($query->num_rows()> 0 ){
			$hasil = "ada";
		}else{
			$hasil = "tidakada";
		}
		return $hasil;
	}


	function dataPelaksana(){
		$id= "";
		$id_perjalanan = $this->getIdPerjalanan();
		foreach($this->input->post('txtPelaksana') as $nip) {
        $d[] = array('id_perjalanan' => $id_perjalanan,
        	'nip' => $nip,
        	);
    	$id = $id."'".$nip."',";
    	}

		$id = rtrim($id, ",");

		$tgl = rtrim($tgl, ", ");

		$query = $this->db->query("SELECT * FROM pelaksana WHERE (nip IN($id))");

		if($query->num_rows()> 0 ){
			$data = $query->result();
		}
		return $data;

	}

	function cekEditDataTgl($tgl_berangkat, $tgl_kembali){
		$nama = array();
		$status = "";
		$id_perjalanan = $this->uri->segment(3);
		$edit = $this->db->query("SELECT * FROM pelaksana WHERE id_perjalanan = '$id_perjalanan'");

		foreach($edit->result() as $k) {
		$nip = $k->nip;
		$query = $this->db->query("SELECT * FROM pelaksana WHERE nip =  '$nip'");
			foreach($query->result() as $v){
				$colTglBerangkat = $v->tgl_berangkat;
				$colTglKembali = $v->tgl_kembali;
				
				
				if (!($tgl_berangkat > $colTglKembali && $tgl_kembali > $colTglBerangkat)  || ($tgl_berangkat < $colTglKembali && $tgl_kembali < $colTglBerangkat) || ($tgl_berangkat != $colTglBerangkat && $tgl_kembali != $colTglKembali) ) {
					$status = "ada";
					//$nip = $nip.$v->nip.", ";
					$id = $v->nip;
					$sql = $this->db->query("SELECT nama FROM pelaksana JOIN pegawai ON pegawai.nip = pelaksana.nip
						WHERE pelaksana.nip = '$id'
					")->row();
					$nama[] = $sql->nama;
				}else{
					$status = "tidakada";
					$nama = "";
				}
			}
		}

		//print_r($query->result());
		//echo "<script>alert('".$nama."')</script>";
		//echo $nip;
		$return =  array('status'=>$status, 'nama'=>$nama);
		return $return;
	}

	function getDataTgl($tgl_berangkat, $tgl_kembali){
		//$nip = array("19580815 198303 1 020", "19620523 198603 1 005", "19610523 198203 1 005", "19620418 199003 2 005");


		/*$bentrok = "BENTROK";
		for ($i=0; $i<sizeof($_POST["pelaksana"]); $i++){
			$pelaksana = $_POST["pelaksana"][$i];
			$cek = mysql_query("select * from surat where pelaksana like '%$pelaksana%'");
			while ($suratpelaksana = mysql_fetch_row($cek)){
				if (((date("d-m-Y", strtotime($tgl_berangkat)) > date("d-m-Y", strtotime($colTglKembali))) && ($tgl_kembali > $colTglBerangkat)) || ((date("d-m-Y", strtotime($tgl_berangkat)) < date("d-m-Y", strtotime($colTglKembali))) && ($tgl_kembali < $colTglBerangkat))) {
				} else {
					$bentrok = $bentrok.'-'.$i.':'.$suratpelaksana[0];
				}	
			}
		}*/

		/*

		((date("d-m-Y", strtotime($tgl_berangkat)) >= date("d-m-Y", strtotime($colTglKembali))) && ($tgl_kembali >= $colTglBerangkat)) 
				||
				((date("d-m-Y", strtotime($tgl_berangkat)) <= date("d-m-Y", strtotime($colTglKembali))) && ($tgl_kembali <= $colTglBerangkat))
		*/

		$nama = array();
		$status = "";
		foreach($this->input->post('txtPelaksana') as $nip) {
		$query = $this->db->query("SELECT * FROM pelaksana WHERE nip =  '$nip'");
			foreach($query->result() as $v){
				$colTglBerangkat = $v->tgl_berangkat;
				$colTglKembali = $v->tgl_kembali;
				
				
				if (!($tgl_berangkat > $colTglKembali && $tgl_kembali > $colTglBerangkat)  || ($tgl_berangkat < $colTglKembali && $tgl_kembali < $colTglBerangkat)) {
					$status = "ada";
					//$nip = $nip.$v->nip.", ";
					$id = $v->nip;
					$sql = $this->db->query("SELECT nama FROM pelaksana JOIN pegawai ON pegawai.nip = pelaksana.nip
						WHERE pelaksana.nip = '$id'
					")->row();
					$nama[] = $sql->nama;
				}else{
					$status = "tidakada";
					$nama = "";
				}
			}
		}

		//print_r($query->result());
		//echo "<script>alert('".$nama."')</script>";
		//echo $nip;
		$return =  array('status'=>$status, 'nama'=>$nama);
		return $return;
		/*

		$row = $this->db->query("SELECT tgl_kembali, tgl_berangkat, nip FROM pelaksana WHERE nip IN($nip) ORDER BY tgl_berangkat ASC LIMIT 1")->row();
		if(!empty($row)){
			$txtTglBerangkat = $row->tgl_berangkat;
			//echo "<script>alert('$txtTglBerangkat')</script>";
			$txtTglKembali = $tgl_kembali;
		}else{
			$txtTglBerangkat = "";
			//echo "<script>alert('$txtTglBerangkat')</script>";
			$txtTglKembali = "";
		}
		
		
		$query = $this->db->query(
			"SELECT * FROM pelaksana WHERE (nip IN($nip)) AND ((tgl_berangkat BETWEEN '$txtTglBerangkat' AND '$tgl_kembali' ))"
			
		);
		if($query->num_rows()> 0 ){
			$hasil = "ada";
		}else{
			$hasil = "tidakada";
		}

		return $hasil;*/
	}

	function getDataGanda($nip, $minvalue, $maxvalue){
		//$nip = array("19580815 198303 1 020", "19620523 198603 1 005", "19610523 198203 1 005", "19620418 199003 2 005");
		$data = "";
		$this->db->select('*, pegawai.nama');
		$this->db->from('pelaksana');
		$this->db->where("pelaksana.nip IN ($nip)");
		$this->db->join('pegawai', 'pegawai.nip = pelaksana.nip');
		$query = $this->db->get();
		if($query->num_rows()> 0 ){
			$data = $query->result();
		}
		return $data;
	}

	function getIdPerjalanan(){
		$id_perjalanan = "";
		$query= $this->db->query("SELECT id_perjalanan FROM perjalanan ORDER BY id_perjalanan DESC LIMIT 1");
		$row = $query->row();

		if($query->num_rows>0){
			$id_perjalanan = $row->id_perjalanan;
		}else{
			$id_perjalanan = "1";
		}

		return $id_perjalanan;
	}

	function getPenugas1(){
		$this->db->select("*, replace(nip,' ','') as id");
		$this->db->where("tingkatan", "Kepala Dinas");
		$this->db->order_by("nama");
		$this->db->from("pegawai");
		return $this->db->get()->result();
	}

	function getPenugas2(){
		$this->db->select("*, replace(nip,' ','') as id");
		$this->db->where("tingkatan", "Sekretaris");
		$this->db->order_by("nama");
		$this->db->from("pegawai");
		return $this->db->get()->result();
	}

	function getPenugas3(){
		$this->db->select("*, replace(nip,' ','') as id");
		$this->db->where("tingkatan", "Kepala Bidang");
		$this->db->order_by("nama");
		$this->db->from("pegawai");
		return $this->db->get()->result();
	}

	


	function deleteData(){
		$result = "";
		$id_perjalanan = $this->uri->segment(3);
		$exe = $this->db->query("DELETE FROM perjalanan WHERE id_perjalanan = '$id_perjalanan'");
		$exe2 = $this->db->query("DELETE FROM pelaksana WHERE id_perjalanan = '$id_perjalanan'");
		if($exe == TRUE && $exe2 == TRUE){
			$result = "berhasil";
		}

		return $result;
	}

	function bilangRatusan($x){
		$kata = array('', 'Satu ', 'Dua ', 'Tiga ' , 'Empat ', 'Lima ', 'Enam ', 'Tujuh ', 'Delapan ', 'Sembilan ');
		$string = '';
		$ratusan = floor($x/100);
		$x = $x % 100;
		if ($ratusan > 1)
			$string .= $kata[$ratusan]."Ratus ";
		else if ($ratusan == 1)
			$string .= "Seratus ";
		$puluhan = floor($x/10);
		$x = $x % 10;
		if ($puluhan > 1){
			$string .= $kata[$puluhan]."Puluh ";
			$string .= $kata[$x];
		} else if (($puluhan == 1) && ($x > 0))
			$string .= $kata[$x]."Belas ";
		else if (($puluhan == 1) && ($x == 0))
			$string .= $kata[$x]."Sepuluh ";
		else if ($puluhan == 0)
			$string .= $kata[$x];
		return $string;
	}

	function terbilang($x){
		$x = number_format($x, 0, "", ".");
		$pecah = explode(".", $x);
		$string = "";
		for($i = 0; $i <= count($pecah)-1; $i++){
			if ((count($pecah) - $i == 5) && ($pecah[$i] != 0))
				$string .= $this->bilangRatusan($pecah[$i])."Triliyun ";
			else if ((count($pecah) - $i == 4) && ($pecah[$i] != 0))
				$string .= $this->bilangRatusan($pecah[$i])."Milyar ";
			else if ((count($pecah) - $i == 3) && ($pecah[$i] != 0))
				$string .= $this->bilangRatusan($pecah[$i])."Juta ";
			else if ((count($pecah) - $i == 2) && ($pecah[$i] == 1))
				$string .= "Seribu ";
			else if ((count($pecah) - $i == 2) && ($pecah[$i] != 0))
				$string .= $this->bilangRatusan($pecah[$i])."Ribu ";
			else if ((count($pecah) - $i == 1) && ($pecah[$i] != 0))
				$string .= $this->bilangRatusan($pecah[$i]);
		}
		return $string;
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

	function genPdfSpd($id,$kop){
		require_once APPPATH.'third_party/pdf/fpdf.php';
		require_once APPPATH.'third_party/pdf/fpdi.php';

		/*$surat = $this->db->query("select * from perjalanan where id_perjalanan = '$no'")->row_array();
		$pelaksana = explode(";", $surat[2]);
		$penugas = $this->db->query("select * from pegawai where nip = '$surat[6]'")->row_array();
		$kpa = $this->db->query("select * from pegawai where nip = '$surat[10]'")->row_array();*/


		$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id'
			")->result();

		$spd = new FPDI();
		$spd->setAutoPageBreak(true,0.5);

		foreach ($p as $perjalanan) {
			$kpa = $this->db->query("SELECT * FROM pegawai WHERE NIP = '$perjalanan->kpa'")->row();

			$spd->AddPage(); 
			$spd->SetMargins(113, 88.5, 10);
			if ($kop == 1){
				$spd->setSourceFile('files/template_SPD_P1.pdf'); 
			} else {
				$spd->setSourceFile('files/template_SPD_P1N.pdf'); 
			}
			$tplIdx = $spd->importPage(1); 
			$spd->useTemplate($tplIdx, 0, 0);

			$spd->SetXY(113, 88.5); 
			$spd->SetFont('Arial', 'B', 11); 
			$spd->Write(5, $kpa->nama);
			
			$spd->SetFont('Arial', '', 11); 
			$spd->SetXY(113, 99.5); 
			$spd->Write(5, $perjalanan->nama); 
			$spd->Ln();
			$spd->Write(5, 'NIP. '.$perjalanan->nip); 

			$spd->SetXY(118, 111); 
			$spd->Write(5, $perjalanan->pangkat); 
			
			$spd->SetMargins(118, 88.5, 10);
			$spd->SetXY(118, 116.5); 
			$spd->Write(5, ucwords(strtolower($perjalanan->jabatan))); 

			$spd->SetMargins(118, 88.5, 10);
			$spd->SetXY(118, 127.5); 
			$spd->Write(5, $perjalanan->tingkat_biaya); 
			
			$spd->SetMargins(113, 88.5, 10);
			$spd->SetXY(113, 134); 
			$spd->Write(5, $perjalanan->maksud_perjalanan); 
			
			$spd->SetXY(113, 144.9); 
			$spd->Write(5, $perjalanan->alat_angkut); 
			
			$spd->SetXY(118, 150.6); 
			$spd->Write(5, $perjalanan->tempat_berangkat); 
			
			$spd->SetXY(118, 156.1); 
			$spd->Write(5, $perjalanan->tempat_tujuan); 
			
			$spd->SetXY(118, 161.8); 
			$lamanya = date_diff(date_create($perjalanan->tgl_berangkat), date_create($perjalanan->tgl_kembali))->d+1;
			$spd->Write(5, $lamanya.' ('.rtrim(strtolower($this->terbilang($lamanya)), " ").') hari');
			
			$spd->SetXY(118, 167.6); 
			$spd->Write(5, $this->bulanID(date("j M Y", strtotime($perjalanan->tgl_berangkat))));
			
			$spd->SetXY(118, 173.1); 
			$spd->Write(5, $this->bulanID(date("j M Y", strtotime($perjalanan->tgl_kembali))));

			$spd->SetXY(118, 207.5); 
			$spd->Write(5, $perjalanan->instansi);

			$spd->SetXY(118, 213); 
			$spd->Write(5, $perjalanan->akun);
			
			$spd->SetXY(153.5, 235.4); 
			$spd->Write(5, $this->bulanID(date("j M Y", strtotime($perjalanan->tgl_input))));
			
			$spd->SetFont('Arial', 'B', 11); 
			$spd->SetMargins(100, 88.5, 10);
			$spd->SetXY(105, 270); 
			$spd->Cell(90,5,$kpa->nama,0,1,'C');

			$spd->SetFont('Arial', '', 11); 
			$spd->SetXY(105, 275); 
			$spd->Cell(90,5,$kpa->pangkat.', '.$kpa->golongan,0,1,'C');

			$spd->SetXY(105, 280); 
			$spd->Cell(90,5,'NIP. '.$kpa->nip,0,1,'C');
			
			$spd->AddPage(); 
			$spd->setSourceFile('files/template_SPD_P2.pdf'); 
			$tplIdx = $spd->importPage(1); 
			$spd->useTemplate($tplIdx, 0, 0); 
			
			$spd->SetXY(156.5, 18); 
			$spd->Write(5, $perjalanan->tempat_tujuan);
			
			$spd->SetXY(156.5, 22.5); 
			$spd->Write(5, $this->bulanID(date("j M Y", strtotime($perjalanan->tgl_berangkat)))); 
			
			$spd->SetFont('Arial', 'B', 11); 
			$spd->SetMargins(100, 88.5, 10);
			$spd->SetXY(108, 50); 
			$spd->Cell(90,5,$kpa->nama,0,1,'C');
			
			$spd->SetFont('Arial', '', 11); 
			$spd->SetXY(108, 55); 
			$spd->Cell(90,5,$kpa->pangkat.', '.$kpa->golongan,0,1,'C');

			$spd->SetXY(108, 60); 
			$spd->Cell(90,5,'NIP. '.$kpa->nip,0,1,'C');
			
			$spd->SetXY(56.5, 66.8); 
			$spd->Write(5, "");//Kolom II Tiba Di
			
			$spd->SetXY(56.5, 71.6); 
			$spd->Write(5, "");//Kolom II Pada Tanggal
			
			$spd->SetXY(156.5, 66.8); 
			$spd->Write(5, "");//Kolom II Berangkat Dari
			
			$spd->SetXY(156.5, 71.6); 
			$spd->Write(5, "");//Kolom II Ke
			
			$spd->SetXY(156.5, 76.4); 
			$spd->Write(5, "");//Kolom II Pada Tanggal
			
			$spd->SetFont('Arial', 'B', 11); 
			$spd->SetMargins(5, 88.5, 10);
			$spd->SetXY(13, 241.5); 
			$spd->Cell(90,5,$kpa->nama,0,1,'C');
			
			$spd->SetFont('Arial', '', 11); 
			$spd->SetXY(13, 246.5); 
			$spd->Cell(90,5,$kpa->pangkat.', '.$kpa->golongan,0,1,'C');

			$spd->SetXY(13, 251.5); 
			$spd->Cell(90,5,'NIP. '.$kpa->nip,0,1,'C');
			
			$spd->SetFont('Arial', 'B', 11); 
			$spd->SetMargins(100, 88.5, 10);
			$spd->SetXY(107, 241.5); 
			$spd->Cell(90,5,$kpa->nama,0,1,'C');
			
			$spd->SetFont('Arial', '', 11); 
			$spd->SetXY(107, 246.5); 
			$spd->Cell(90,5,$kpa->pangkat.', '.$kpa->golongan,0,1,'C');

			$spd->SetXY(107, 251.5); 
			$spd->Cell(90,5,'NIP. '.$kpa->nip,0,1,'C');
			
		}

		
		$tgl=date('dmY');
		$spd->Output('SPD_'.$perjalanan->id_perjalanan.'_'.$tgl.'.pdf', 'D');
	}


	function genPdfSp($id, $kop){

		require_once APPPATH.'third_party/pdf/fpdf.php';
		require_once APPPATH.'third_party/pdf/fpdi.php';
		$no = "17";
		$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id'
			");

		$hitungPelaksana = $p->num_rows();
		$pjl = $p->result();

		$sp = new FPDI(); 
		$sp->SetMargins(77.9, 88.5, 10);
		$sp->setAutoPageBreak(true,0.5);
		
		$sp->AddPage();
		
		if ($kop == 0) $kop = "N"; else $kop = "";
		$sp->setSourceFile('files/template_SP_'.($hitungPelaksana).$kop.'.pdf'); 

		$tplIdx = $sp->importPage(1); 
		$sp->useTemplate($tplIdx, 0, 0);

		$pt = $this->db->query("SELECT * FROM perjalanan WHERE id_perjalanan = '$id'")->row();
		$kpa = $this->db->query("SELECT * FROM pegawai WHERE NIP = '$pt->kpa'")->row();
		
		$sp->SetFont('Arial', '', 11); 
		$sp->SetXY(65.5, 63); 
		$sp->Cell(90,5,'Nomor : '.$pt->no_surat,0,1,'C');
		
		$pj = $p->row();

		$sp->SetFont('Arial', 'B', 11); 
		$sp->SetXY(78, 132.5); 
		$sp->Write(5, $pj->nama);
		
		$sp->SetFont('Arial', '', 11); 
		$sp->SetXY(78, 138); 
		$sp->Write(5, $pj->nip);

		$sp->SetXY(78, 143.5); 
		$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

		$sp->SetXY(78, 149); 
		$sp->Write(5, ucwords(strtolower($pj->jabatan)));
		
		if ($hitungPelaksana == 1){
			$selisih = date_diff(date_create($pj->tgl_berangkat), date_create($pj->tgl_kembali))->d+1;
			$sp->SetMargins(32, 88.5, 10);
			$sp->SetXY(32, 159.5); 
			$sp->Write(5,'Melaksanakan tugas dalam rangka "'.$pt->maksud_perjalanan.'"  selama '.$selisih.' ('.rtrim(strtolower($this->terbilang($selisih)), " ").') hari yang akan dilaksanakan :');
			
			$waktu = "";
			if ($selisih > 1){
				$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat))). ' s.d ';
			}
			$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat)));	
			
			$sp->SetXY(78, 179); 
			$sp->Write(5, $waktu);

			$sp->SetXY(78, 184.7); 
			$sp->Write(5, '07.30 WIB s.d selesai');
		 
			$sp->SetXY(78, 190.4); 
			$sp->Write(5, $pj->tempat_tujuan);

			$sp->SetXY(142, 235); 
			$sp->Write(5, 'Bandung');

			$sp->SetXY(142, 240.4); 
			$sp->Write(5, $this->bulanID(date("j M Y", strtotime($pj->tgl_input))));
			
			$sp->SetMargins(5, 88.5, 10);
			$sp->SetXY(70, 248.5); 
			$sp->MultiCell(110,5,$kpa->jabatan,0,'C');
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(70, 270.5); 
			$sp->Cell(110,5,$kpa->nama,0,1,'C');
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(70, 275.5); 
			$sp->Cell(110,5,$kpa->pangkat.', '. $kpa->golongan,0,1,'C');

			$sp->SetXY(70, 280.5); 
			$sp->Cell(110,5,'NIP. '.$kpa->nip,0,1,'C');

			$sp->Output('SuratPerintah_'.str_replace('/', '_', $pt->maksud_perjalanan).'.pdf' , 'D');
		} else if ($hitungPelaksana == 2){
			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 1,1
			");
			$pj = $p->row();

			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 160.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 166); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 171.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 177); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));
		
			$selisih = date_diff(date_create($pj->tgl_berangkat), date_create($pj->tgl_kembali))->d+1;
			$sp->SetMargins(32, 88.5, 10);
			$sp->SetXY(32, 187.7); 
			$sp->Write(5,'Melaksanakan tugas dalam rangka "'.$pj->maksud_perjalanan.'"  selama '.$selisih.' ('.rtrim(strtolower($this->terbilang($selisih)), " ").') hari yang akan dilaksanakan :');
			
			$waktu = "";
			if ($selisih > 1){
				$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat))). ' s.d ';
			}
			$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat)));	
			
			$sp->SetXY(78, 207); 
			$sp->Write(5, $waktu);

			$sp->SetXY(78, 212.7); 
			$sp->Write(5, '07.30 WIB s.d selesai');
		 
			$sp->SetXY(78, 218.4); 
			$sp->Write(5, $pj->tempat_tujuan);

			$sp->AddPage(); 
			$sp->setSourceFile('files/template_SP_'.$hitungPelaksana.$kop.'.pdf'); 
			$tplIdx = $sp->importPage(2); 
			$sp->useTemplate($tplIdx, 0, 0);
			
			$sp->SetMargins(5, 10, 10);
			
			$sp->SetXY(142, 59.3); 
			$sp->Write(5, 'Bandung');

			$sp->SetXY(142, 64.7); 
			$sp->Write(5, $this->bulanID(date("j M Y", strtotime($pj->tgl_input))));
			
			$sp->SetMargins(5, 88.5, 10);
			$sp->SetXY(70, 72.8); 
			$sp->MultiCell(110,5,$kpa->jabatan,0,'C');
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(70, 94.8); 
			$sp->Cell(110,5,$kpa->nama,0,1,'C');
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(70, 99.8); 
			$sp->Cell(110,5,$kpa->pangkat.', '. $kpa->golongan,0,1,'C');

			$sp->SetXY(70, 104.8); 
			$sp->Cell(110,5,'NIP. '.$kpa->nip,0,1,'C');

			$sp->Output('SuratPerintah_'.str_replace('/', '_', $pj->maksud_perjalanan).'.pdf' , 'D');
		} else if ($hitungPelaksana == 3){
			
			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 1,1
			");
			$pj = $p->row();

			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 160.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 166); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 171.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 177); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 2,1
			");
			$pj = $p->row();
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 188.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 194); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 199.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 205); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));
		
			$selisih = date_diff(date_create($pj->tgl_berangkat), date_create($pj->tgl_kembali))->d+1;
			$sp->SetMargins(32, 88.5, 10);
			$sp->SetXY(32, 215.9); 
			$sp->Write(5,'Melaksanakan tugas dalam rangka "'.$pj->maksud_perjalanan.'"  selama '.$selisih.' ('.rtrim(strtolower($this->terbilang($selisih)), " ").') hari yang akan dilaksanakan :');
			
			$waktu = "";
			if ($selisih > 1){
				$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat))). ' s.d ';
			}
			$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat)));
			
			$sp->SetXY(78, 235); 
			$sp->Write(5, $waktu);

			$sp->SetXY(78, 240.7); 
			$sp->Write(5, '07.30 WIB s.d selesai');
		 
			$sp->SetXY(78, 246.4); 
			$sp->Write(5, $pj->tempat_tujuan);

			$sp->AddPage(); 
			$sp->setSourceFile('files/template_SP_'.$hitungPelaksana.$kop.'.pdf'); 
			$tplIdx = $sp->importPage(2); 
			$sp->useTemplate($tplIdx, 0, 0);
			
			$sp->SetMargins(5, 10, 10);
			
			$sp->SetXY(142, 59.3); 
			$sp->Write(5, 'Bandung');

			$sp->SetXY(142, 64.7); 
			$sp->Write(5, $this->bulanID(date("j M Y", strtotime($pj->tgl_input))));
			
			$sp->SetMargins(5, 88.5, 10);
			$sp->SetXY(70, 72.8); 
			$sp->MultiCell(110,5,$kpa->jabatan,0,'C');
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(70, 94.8); 
			$sp->Cell(110,5,$kpa->nama,0,1,'C');
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(70, 99.8); 
			$sp->Cell(110,5,$kpa->pangkat.', '. $kpa->golongan,0,1,'C');

			$sp->SetXY(70, 104.8); 
			$sp->Cell(110,5,'NIP. '.$kpa->nip,0,1,'C');

			$sp->Output('SuratPerintah_'.str_replace('/', '_', $pj->maksud_perjalanan).'.pdf' , 'D');
		}else if ($hitungPelaksana == 4){
			
			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 1,1
			");
			$pj = $p->row();

			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 160.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 166); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 171.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 177); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 2,1
			");
			$pj = $p->row();
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 188.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 194); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 199.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 205); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 3,1
			");
			$pj = $p->row();
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 216.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 222); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 227.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 233); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));
		
			$selisih = date_diff(date_create($pj->tgl_berangkat), date_create($pj->tgl_kembali))->d+1;
			$sp->SetMargins(32, 88.5, 10);
			$sp->SetXY(32, 244.1); 
			$sp->Write(5,'Melaksanakan tugas dalam rangka "'.$pj->maksud_perjalanan.'"  selama '.$selisih.' ('.rtrim(strtolower($this->terbilang($selisih)), " ").') hari yang akan dilaksanakan :');
			
			$waktu = "";
			if ($selisih > 1){
				$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat))). ' s.d ';
			}
			$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat)));	
			
			$sp->SetXY(78, 263); 
			$sp->Write(5, $waktu);

			$sp->SetXY(78, 268.7); 
			$sp->Write(5, '07.30 WIB s.d selesai');
		 
			$sp->SetXY(78, 274.4); 
			$sp->Write(5, $pj->tempat_tujuan);

			$sp->AddPage(); 
			$sp->setSourceFile('files/template_SP_'.($hitungPelaksana).$kop.'.pdf'); 
			$tplIdx = $sp->importPage(2); 
			$sp->useTemplate($tplIdx, 0, 0);
			
			$sp->SetMargins(5, 10, 10);
			
			$sp->SetXY(142, 59.3); 
			$sp->Write(5, 'Bandung');

			$sp->SetXY(142, 64.7); 
			$sp->Write(5, $this->bulanID(date("j M Y", strtotime($pj->tgl_input))));
			
			$sp->SetMargins(5, 88.5, 10);
			$sp->SetXY(70, 72.8); 
			$sp->MultiCell(110,5,$kpa->jabatan,0,'C');
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(70, 94.8); 
			$sp->Cell(110,5,$kpa->nama,0,1,'C');
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(70, 99.8); 
			$sp->Cell(110,5,$kpa->pangkat.', '. $kpa->golongan,0,1,'C');

			$sp->SetXY(70, 104.8); 
			$sp->Cell(110,5,'NIP. '.$kpa->nip,0,1,'C');

			$sp->Output('SuratPerintah_'.str_replace('/', '_', $pj->maksud_perjalanan).'.pdf' , 'D');
		}else if (($hitungPelaksana) == 5){
		
			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 1,1
			");
			$pj = $p->row();

			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 160.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 166); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 171.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 177); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 2,1
			");
			$pj = $p->row();
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 188.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 194); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 199.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 205); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 3,1
			");
			$pj = $p->row();
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 216.5); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 222); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 227.5); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 233); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$p = $this->db->query("SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' LIMIT 4,1
			");
			$pj = $p->row();
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(78, 244.7); 
			$sp->Write(5, $pj->nama);
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(78, 250.2); 
			$sp->Write(5, $pj->nip);

			$sp->SetXY(78, 255.7); 
			$sp->Write(5, $pj->pangkat.', '.$pj->golongan);

			$sp->SetXY(78, 261.4); 
			$sp->Write(5, ucwords(strtolower($pj->jabatan)));

			$sp->AddPage(); 
			$sp->setSourceFile('files/template_SP_'.($hitungPelaksana).$kop.'.pdf'); 
			$tplIdx = $sp->importPage(2); 
			$sp->useTemplate($tplIdx, 0, 0);
			
			$sp->SetMargins(5, 10, 10);
			
			$selisih = date_diff(date_create($pj->tgl_berangkat), date_create($pj->tgl_kembali))->d+1;
			$sp->SetMargins(32, 88.5, 10);
			$sp->SetXY(32, 26.1); 
			$sp->Write(5,'Melaksanakan tugas dalam rangka "'.$pj->maksud_perjalanan.'"  selama '.$selisih.' ('.rtrim(strtolower($this->terbilang($selisih)), " ").') hari yang akan dilaksanakan :');
			
			$waktu = "";
			if ($selisih > 1){
				$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat))). ' s.d ';
			}
			$waktu = $waktu.$this->bulanID(date("j M Y", strtotime($pj->tgl_berangkat)));
			
			$sp->SetXY(78, 45); 
			$sp->Write(5, $waktu);

			$sp->SetXY(78, 50.7); 
			$sp->Write(5, '07.30 WIB s.d selesai');
		 
			$sp->SetXY(78, 56.4); 
			$sp->Write(5, $pj->tempat_tujuan);
			
			$sp->SetXY(142, 101.3); 
			$sp->Write(5, 'Bandung');

			$sp->SetXY(142, 106.7); 
			$sp->Write(5, $this->bulanID(date("j M Y", strtotime($pj->tgl_input))));
			
			$sp->SetMargins(5, 88.5, 10);
			$sp->SetXY(70, 114.8); 
			$sp->MultiCell(110,5,$kpa->jabatan,0,'C');
			
			$sp->SetFont('Arial', 'B', 11); 
			$sp->SetXY(70, 136.8); 
			$sp->Cell(110,5,$kpa->nama,0,1,'C');
			
			$sp->SetFont('Arial', '', 11); 
			$sp->SetXY(70, 141.8); 
			$sp->Cell(110,5,$kpa->pangkat.', '. $kpa->golongan,0,1,'C');

			$sp->SetXY(70, 146.8); 
			$sp->Cell(110,5,'NIP. '.$kpa->nip,0,1,'C');

			$sp->Output('SuratPerintah_'.str_replace('/', '_', $pj->maksud_perjalanan).'.pdf' , 'D');
		}
		
	}
	
	function getSpPerjalanan($id){
		return $this->db->query("SELECT * FROM perjalanan WHERE id_perjalanan = '$id'")->result();
	}

	function getSpPelaksana($id){
		return $this->db->query("
			SELECT *,pegawai.nip, pegawai.pangkat, pegawai.golongan, pegawai.jabatan, pegawai.bidang, pegawai.tingkatan FROM perjalanan
			INNER JOIN pelaksana on pelaksana.id_perjalanan = perjalanan.id_perjalanan
			INNER JOIN pegawai on pelaksana.nip = pegawai.nip
			WHERE perjalanan.id_perjalanan = '$id' ORDER BY pegawai.golongan DESC
			")->result();
	}

	function getSpKpa($id){
		return $this->db->query("SELECT * FROM pegawai WHERE nip = '$id'")->result();
	}

}