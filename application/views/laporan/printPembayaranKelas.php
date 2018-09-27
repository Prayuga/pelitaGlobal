<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan Pembayaran Per-kelas</title>

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/dist/css/legalStyle.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap tabel css-->
    <link href="<?=base_url();?>assets/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
    	@page { 
			size: 330mm 215mm; /* LANDSCAPE */
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
	<page size="legalLandscape">
		<div class="row">
			<div class="col-md-12" style="padding:40px;">
				<?php foreach ($tahun_ajaran as $ta_item) {
					if($ta==$ta_item['ID_TahunAjaran']){
                        foreach ($kategoris as $k_item) {
                            if($kategori==$k_item['ID_Kategori']){
                                echo "<h1>Laporan Pembayaran Kelas ".$k_item['NamaKategori']." Tahun Ajaran ".$ta_item['TahunAjaran']."</h1>";
                            }
                        }
					}
				} ?>
				<hr>
				<?php  
                    if($laporan != null || $laporan!= ""){
                        echo form_open('pendataanSiswa/trx_seragam');
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover table-responsive" border="1">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Nama Siswa</td>
                                    <?php foreach ($header as $header_item) { ?>
                                        <td><?php echo $header_item['DetailPembayaran']; ?></td>
                                    <?php } ?>
                                    <td>Diskon</td>
                                    <td>Saldo</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count=1; 
                                    foreach ($laporan as $laporan_item) { 
                                        if($laporan_item['NomorIndukSiswa']=='TOTAL'){
                                            $siswa = "Total";
                                        }else{
                                            $siswa = $laporan_item['NamaSiswa']." (".$laporan_item['NomorIndukSiswa'].")";
                                        }
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><?=$siswa?></td>
                                    <?php foreach ($header as $header_item) { ?>
                                        <td><?php echo $laporan_item[$header_item['ID_DetailJenisPembayaran']]; ?></td>
                                    <?php } ?>
                                    <td><?=$laporan_item['diskon']?></td>
                                    <td><?=$laporan_item['saldo']?></td>
                                </tr>
                                <?php
                                        $count++;
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
			</div>
		</div>
	</page>
</body>
</html>