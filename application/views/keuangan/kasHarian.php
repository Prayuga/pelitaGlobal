<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Kas Harian</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<?php echo form_open('keuangan/entriKasHarian'); ?>
                	<div class="row">
                		<div class="col-md-2 col-md-offset-1" style="text-align: right;">
                			<label for="nama_s" style="margin-top: 5px;">Bulan, Tahun</label>
                		</div>
                		<?php foreach ($bulanTahun as $bulanTahun_item) { ?>
                		<div class="col-md-4">
                			<input type="hidden" name="idHeader" value="<?php echo $bulanTahun_item['ID_HeaderPengeluaran']; ?>">
                			<input type="text" name="headerPengeluaran" class="form-control" disabled="disabled" value="<?php echo $bulanTahun_item['Bulan'].', '.$bulanTahun_item['Tahun']; ?>">
                		</div>
                		<div class="col-md-4">
                			<h5 style="color: red;"><?php echo $bulanTahun_item['mulai']." - ".$bulanTahun_item['selesai']; ?></h5>
                		</div>
                		<?php } ?>
                	</div><br/>
                	<div class="row">
                		<div class="col-md-2 col-md-offset-2" style="text-align: right;">
                			<label for="nama_s" style="margin-top: 5px;">Jenis Pengeluaran</label>
                		</div>
                		<div class="col-md-4">
                			<select class="form-control selectpicker" name="jenis" title="Pilih Jenis Pengeluaran" data-live-search="true" required>
                				<?php foreach ($jenis as $jenis_item) { ?>
                					<option value="<?php echo $jenis_item['ID_JenisPengeluaran']; ?>"><?php echo $jenis_item['JenisPengeluaran']; ?></option>
                				<?php } ?>
                			</select>
                		</div>
                	</div><br/>
                	<div class="row">
                		<div class="col-md-2 col-md-offset-2" style="text-align: right;">
                			<label for="nama_s" style="margin-top: 5px;">Keterangan</label>
                		</div>
                		<div class="col-md-4">
                			<textarea name="keterangan" class="form-control" required></textarea>
                		</div>
                	</div><br>
                	<div class="row">
                		<div class="col-md-2 col-md-offset-2" style="text-align: right;">
                			<label for="nama_s" style="margin-top: 5px;">Tipe</label>
                		</div>
                		<div class="col-md-4">
                			<select class="form-control selectpicker" name="tipe" title="Pilih Tipe" required>
                				<option value="debit">Debit (Pemasukan)</option>
                				<option value="kredit">Kredit (Pengeluaran)</option>
                			</select>
                		</div>
                	</div><br>
                	<div class="row">
                		<div class="col-md-2 col-md-offset-2" style="text-align: right;">
                			<label for="nama_s" style="margin-top: 5px;">Jumlah</label>
                		</div>
                		<div class="col-md-4">
                			<input type="text" name="jumlah" class="form-control selectpicker" required>
                		</div>
                	</div><br>
                    <center>
                    	<input type="submit" class="btn btn-md btn-primary" style="width:180px" value="Submit">
                    </center>
                	<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>