<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-family: Arial;">

	<div style="text-align: center; margin-top: 4px;">
		<span><strong style="font-size: 14px;">LAPORAN</strong></span>
		<br>
		<span><strong style="font-size: 14px;">TENTANG</strong></span>
		<br/>
		<br/>
		<span style="margin-top: -18px; font-size: 14px;"><strong><?=$judul;?></strong></span>
	</div>

	<div style="font-size: 12px;">
		<?=$isi?>
	</div>

	<div style="clear: both; margin-bottom: 10px;"></div>
	<div style="margin-left: 60%;">
		<table style="font-size: 12px;">
			<tr>
				<td>Dibuat di</td>
				<td style="padding-left: 20px;padding-right: 2px;">:</td>
				<td>BANDUNG</td>
			</tr>

			<tr>
				<td>Pada tanggal</td>
				<td style="padding-left: 20px;padding-right: 2px;">:</td>
				<td><?=$tgl;?></td>
			</tr>

		</table>
	</div>
	<br/>
	<div style="clear: both; margin-bottom: 20px;"></div>
	
	<div style="width: 80%; margin-left: 10%;">
		<span style="font-size: 12px;">Yang membuat laporan</span>
		<table style="width: 100%; font-size: 12px;">
			<?php foreach ($pelaksana as $k) {?>
			<tr>
				<td width="50%"><?=$k->nama;?><br/><?=$k->nip;?></td>
				<td width="30%" style="border-bottom: 0.5px solid black;"></td>
			</tr>
			<?php } ?>
		</table>

	</div>
</body>
</html>




