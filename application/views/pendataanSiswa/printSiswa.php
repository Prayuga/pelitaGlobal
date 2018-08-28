<!DOCTYPE html>
<html>
<head>
	<title>Print Data Siswa</title>
    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/dist/css/legalStyle.css" rel="stylesheet">
    <style type="text/css">
    	@page { 
			size: 215mm 330mm; /* LANDSCAPE */
			margin: 0;
			/*width: 3508px;
  			height: 2480px;*/
  		}
    </style>
	<script>
		window.print();
		window.close();
	</script>
</head>
<body>
	<page size="legal">
		<div class="row">
			<div class="col-md-12" style="padding:40px;">
				<h1>Data Siswa</h1>
				<hr>
				<?php foreach ($siswa as $siswa_item) { ?>
				<table style="margin:20px; font-size: 11pt">
					<tr>
						<td>Nomor Induk Siswa</td>
						<td>:</td>
						<td><?php echo $siswa_item['NomorIndukSiswa']; ?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td><?php echo $siswa_item['NamaSiswa']; ?></td>
					</tr>
					<tr>
						<td>Nama Panggilan</td>
						<td>:</td>
						<td><?php echo $siswa_item['NamaPanggilan']; ?></td>
					</tr>
					<tr>
						<td>Tempat, Tanggal Lahir</td>
						<td>:</td>
						<td><?php echo $siswa_item['TempatLahir'].", ".$siswa_item['TanggalLahir']; ?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<?php 
		                    	foreach ($agama as $agama_item) { 
		                    		if($siswa_item['ID_Agama']==$agama_item['ID_Agama']){
		                    			echo $agama_item['Agama'];
		                    		}
		                    	}
		                    ?>
						</td>
					</tr>
					<tr>
						<td>Bahasa sehari-hari</td>
						<td>:</td>
						<td><?php echo $siswa_item['BahasaSehariHari']; ?></td>
					</tr>
					<tr>
						<td>Riwayat Penyakit</td>
						<td>:</td>
						<td><?php echo $siswa_item['RiwayatPenyakit']; ?></td>
					</tr>
					<tr>
						<td>Alergi</td>
						<td>:</td>
						<td><?php echo $siswa_item['Alergi']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $siswa_item['Alamat']; ?></td>
					</tr>
					<tr>
						<td>Nomor Telepon</td>
						<td>:</td>
						<td><?php echo $siswa_item['NoTelp']; ?></td>
					</tr>
					<tr>
						<td>Tinggal Pada</td>
						<td>:</td>
						<td><?php echo $siswa_item['TinggalPada']; ?></td>
					</tr>
				</table>
				<?php } ?>
			</div>
		</div>
	</page>
</body>
</html>