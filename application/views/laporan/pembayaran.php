<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Laporan Pembayaran Global</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            	<div class="panel-heading">
					<div class="row">
						
					</div>
				</div>
                <div class="panel-body">
                    <?php echo form_open('laporan/pembayaran'); ?>
                	<div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="jenis" title="Pilih Jenis Pembayaran">
                                    <?php foreach ($jenis as $jenis_item) { ?>
                                        <option value="<?php echo $jenis_item['ID_HeaderJenisPembayaran']; ?>"><?php echo $jenis_item['JenisPembayaran']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                		<div class="col-md-3">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Pilih Tahun Ajaran">
                                    <?php foreach ($tahun_ajaran as $ta_item) { ?>
                                        <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Lunas</label>
                                <select id="lunas" class="form-control selectpicker" data-live-search="true" name="lunas" title="Pilih Status Lunas ">
                                        <option value="Y">Lunas</option>
                                        <option value="N">Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="opacity: 0;">Tombol</label>
                                <input type="submit" class="form-control btn btn-primary cariSubmit" name="Cari" value="Cari">
                            </div>
                        </div>
                	</div>
                    <?php 
                        echo form_close(); 
                        if($laporan != null){
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Siswa</td>
                                        <td>Jenis Pembayaran</td>
                                        <td>Jumlah Pembayaran</td>
                                        <td>Diskon</td>
                                        <td>Status Lunas</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    	$count = 1;
                                        foreach ($laporan as $laporan_item) { 
                                    ?>
                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $laporan_item['NamaSiswa']; ?></td>
                                        <td><?php echo $laporan_item['DetailPembayaran']; ?></td>
                                        <td><?php echo $laporan_item['Saldo']; ?></td>
                                        <td><?php echo $laporan_item['Jumlah']; ?></td>
                                        <td><?php echo $laporan_item['StatusLunas']; ?></td>
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
        </div>
    </div>
</div>