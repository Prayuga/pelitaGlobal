<!DOCTYPE html>
<html>
<head>
	<title>Print Kwitansi</title>
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
		window.location("<?=base_url();?>Keuangan/kwitansi");
	</script>
</head>
<body>
	<page size="legal">
		<div class="row">
			<div class="col-md-12" style="padding:40px;">
				<h1>Print Kwitansi</h1>
				<hr>
				<h3>Nomor Kwitansi : <?php echo $NoKwitansi; ?></h3>
				<?php foreach ($siswa as $siswa_item) {
					echo "<h3>Nomor Induk Siswa : ".$siswa_item['NomorIndukSiswa']."</h3>";
					echo "<h3>Nama Siswa : ".$siswa_item['NamaSiswa']."</h3>";
				} ?>
				<table style="margin:20px; font-size: 11pt" border="1" class="table">
					<thead>
						<tr>
							<td>Untuk Pembayaran</td>
							<td>Sejumlah</td>
							<td>Keterangan</td>
						</tr>
					</thead>
					<tbody>
						
				<?php foreach ($kwitansi as $kwitansi_item) { ?>
				<tr>
					<td><?php echo $kwitansi_item['DetailPembayaran']; ?></td>
					<td><?php echo $kwitansi_item['Jumlah']; ?></td>
					<td><?php echo $kwitansi_item['Keterangan']; ?></td>
				</tr>
				<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</page>
</body>
</html>