<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Laporan Kas Rumah Tangga</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            	<div class="panel-heading">
					<div class="row">
						<div class="col-md-10 col-md-offset-3">
							<label class="pull-left" style="margin-right: 10px; margin-top: 5px;">Lihat Berdasarkan:</label> &nbsp;
							<input type="radio" name="option" value="Tanggal" class="pull-left klik" style="margin-top: 5px;" id="tgl"> 
							<label class="pull-left klik" style="margin-right: 10px; margin-top: 5px;" for="tgl">Tanggal</label> &nbsp;
							<input type="radio" name="option" value="Pengeluaran" class="pull-left klik" style="margin-top: 5px;" id="pengeluarans"> 
							<label class="pull-left klik" style="margin-top: 5px;" for="pengeluarans">Pengeluaran</label> 
							<input type="submit" name="submit" value="Cari" class="btn btn-primary col-md-2" style="margin-left: 10px;" id="cari">
						</div>
					</div>
				</div>
                <div class="panel-body">
                	<?php echo form_open('Laporan/get_Rpengeluaran/'); ?>
                	<div class="row" id="pengeluaran">
                		<div class="col-md-3 col-md-offset-2">
                            <div class="form-group">
                                <label>Bulan, Tahun</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Pilih Bulan, Tahun">
                                	<?php foreach ($bulanTahun as $bulanTahun_item) { ?>
                                    <option value="<?php echo $bulanTahun_item['ID_HeaderPengeluaran']; ?>"><?php echo $bulanTahun_item['Bulan'].", ".$bulanTahun_item['Tahun']; ?></option>
                                	<?php } ?>
                                </select>
                            </div>
                		</div>
                		<div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Pilih Jenis">
                                	<?php foreach ($jenis as $jenis_item) { ?>
                                    <option value="<?php echo $jenis_item['ID_JenisPengeluaran']; ?>"><?php echo $jenis_item['JenisPengeluaran']; ?></option>
                                	<?php } ?>
                                </select>
                            </div>
                		</div>
                		<div class="col-md-2">
                            <div class="form-group">
                                <label style="opacity: 0;">Tombol</label>
                            	<input type="submit" class="form-control btn btn-primary" name="Cari" value="Cari">
                            </div>
                		</div>
                	</div>
                	<?php
                		echo form_close();
                		echo form_open('Laporan/get_Rtanggal/');;
                	?>
                	<div class="row" id="tanggal">
                		<div class="col-md-3 col-md-offset-2">
                            <div class="form-group">
                                <label>Dari</label>
                                <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_2" name="tgl_2">
                            </div>
                		</div>
                		<div class="col-md-3">
                            <div class="form-group">
                                <label>Sampai</label>
                                <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_l" name="tgl_l">
                            </div>
                		</div>
                		<div class="col-md-2">
                            <div class="form-group">
                                <label style="opacity: 0;">Tombol</label>
                            	<input type="submit" class="form-control btn btn-primary" name="Cari" value="Cari">
                            </div>
                		</div>
                	</div>
                	<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
         $(document).ready(function () {
           $('#tgl_l').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            }); 
           $('#tgl_2').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            });
           $('#tgl_3').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            });
        });
    </script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('#pengeluaran').hide();
			$('#tanggal').hide();

			$('#inputs').attr("disabled", "disabled");	
			$('.klik').click(function(){
				$('#pengeluaran').hide();
				$('#tanggal').hide();
				$('#inputs').removeAttr("disabled");
					if($('#pengeluarans').is(':checked')) {
						$('#pengeluaran').show();
					}
					else if($('#tgl').is(':checked')) {
						$('#tanggal').show();
					}
			});
		});
	</script>
</div>
