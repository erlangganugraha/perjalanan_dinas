<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-family: Arial;">

	<div style="border: 2px solid black;"></div>
	<div style="border: 1px solid black;margin-top: 1px;"></div>
	<div style="text-align: center; margin-top: 4px;">
		<span><strong>SURAT PERINTAH</strong></span>
		<br>
		<span style="margin-top: -18px; font-size: 12px;">NOMOR : 800/ <?=$no_surat;?> /Aptika-Diskominfo</span>
	</div>
	<br>
	<br>
	<div style="float: left;width:100px; font-size: 12px;">
		Dasar 
	</div>
	<style type="text/css">
		.dasar ol{
			margin-top: -18px;
		}

	</style>
	<div style="float: left;font-size: 12px;" class="dasar">
	<span>:</span>
		<?=$dasar;?>
	</div>

	<div style="text-align: center; margin-top: 5px; margin-bottom: 5px;">
		<span><strong>MEMERINTAHKAN :</strong></span>
	</div>

	<div style="float: left;width:100px; font-size: 12px;">
		Kepada 
	</div>
	<div style="float: left; font-size: 12px;">
		<span>:</span>
		<table style="font-size: 12px; margin-top: -18px; padding-left: 22px;">
			<?php
				$no = 0;
				foreach ($pelaksana as $v) {
				$no++;
			 ?>

			<tr>
				<td><?=$no;?>.</td>
				<td style="padding-left: 4px;">Nama</td>
				<td>:</td>
				<td><b><?=$v->nama;?></b></td>
			</tr>
			<tr>
				<td></td>
				<td style="padding-left: 4px;">Pangkat/Golongan</td>
				<td>:</td>
				<td><?=$v->pangkat;?>, <?=$v->golongan;?></td>
			</tr>	
			<tr>
				<td></td>
				<td style="padding-left: 4px;">NIP</td>
				<td>:</td>
				<td><?=$v->nip;?></td>
			</tr>	
			<tr>
				<td></td>
				<td style="padding-left: 4px;">Jabatan</td>
				<td>:</td>
				<td><?=$v->jabatan;?></td>
			</tr>

			<?php } ?>

		</table>
	</div>

	<div style="clear: both; margin-bottom: 4px;"></div>
	<div style="float: left;width:100px; font-size: 12px;">
		Untuk 
	</div>
	<style type="text/css">
		.untuk ol{
			margin-top: -15px;
		}
	</style>

	<div style="float: left; font-size: 12px;" class="untuk">
	<span>:</span>
		<?=$untuk;?>
	</div>


	<div style="clear: both; margin-bottom: 10px;"></div>
	<div style="margin-left: 60%;">
		<table style="font-size: 12px;">
			<tr>
				<td>Ditetapkan di</td>
				<td style="padding-left: 20px;padding-right: 2px;">:</td>
				<td>BANDUNG</td>
			</tr>

			<tr>
				<td>Pada tanggal</td>
				<td style="padding-left: 20px;padding-right: 2px;">:</td>
				<td><?=$tgl_ayena;?></td>
			</tr>

		</table>
		<div style="border: 1.5px solid black; margin-bottom: 2px;"></div>
		<div style="border: 0.8px solid black;"></div>

		<div style="text-align: center; font-size: 12px;">
			a.n <?=$jabatanKpa;?><br>
			<?=$bidangKpa;?>,
			<br>
			<br>
			<br>
			<br>
			<br>
			<b><?=$namaKpa;?></b>
			<br>
			<?=$pangkatKpa;?>
			<br>
			NIP. <?=$nipKpa;?>
		</div>
	</div>
	
	

</body>
</html>




