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
						<div class="col-md-10 col-md-offset-4">
							<label class="pull-left" style="margin-right: 10px; margin-top: 5px;">Lihat Berdasarkan:</label> &nbsp;
							<input type="radio" name="option" value="Tanggal" class="pull-left klik" style="margin-top: 5px;" id="tgl">&nbsp; 
							<label class="pull-left klik" style="margin-right: 10px; margin-top: 5px;" for="tgl">Tanggal</label> &nbsp;
							<input type="radio" name="option" value="Pengeluaran" class="pull-left klik" style="margin-top: 5px;" id="pengeluarans"> 
							<label class="pull-left klik" style="margin-top: 5px;" for="pengeluarans">Pengeluaran</label> 
						</div>
					</div>
				</div>
                <div class="panel-body">
                	<div class="row" id="pengeluaran">
                		<div class="col-md-3 col-md-offset-2">
                            <div class="form-group">
                                <label>Bulan, Tahun</label>
                                <select class="form-control selectpicker" data-live-search="true" name="bulanTahun" id="bulanTahun" title="Pilih Bulan, Tahun">
                                	<?php foreach ($bulanTahun as $bulanTahun_item) { ?>
                                    <option value="<?php echo $bulanTahun_item['ID_HeaderPengeluaran']; ?>"><?php echo $bulanTahun_item['Bulan'].", ".$bulanTahun_item['Tahun']; ?></option>
                                	<?php } ?>
                                </select>
                            </div>
                		</div>
                		<div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis</label>
                                <select class="form-control selectpicker" data-live-search="true" name="jenis" id="jenis" title="Pilih Jenis">
                                	<?php foreach ($jenis as $jenis_item) { ?>
                                    <option value="<?php echo $jenis_item['ID_JenisPengeluaran']; ?>"><?php echo $jenis_item['JenisPengeluaran']; ?></option>
                                	<?php } ?>
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
                	<div class="row" id="tanggal">
                		<div class="col-md-3 col-md-offset-2">
                            <div class="form-group">
                                <label>Dari</label>
                                <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_dari" name="tgl_dari">
                            </div>
                		</div>
                		<div class="col-md-3">
                            <div class="form-group">
                                <label>Sampai</label>
                                <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_sampai" name="tgl_sampai">
                            </div>
                		</div>
                		<div class="col-md-2">
                            <div class="form-group">
                                <label style="opacity: 0;">Tombol</label>
                            	<input type="submit" class="form-control btn btn-primary cariSubmit" name="Cari" value="Cari">
                            </div>
                		</div>
                	</div>
                    <div class="row">
                        <div class="col-md-12" id="isiTabel">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
         $(document).ready(function () {
           $('#tgl_dari').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            }); 
           $('#tgl_sampai').datetimepicker({
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

			$('.klik').click(function(){
                $('#isiTabel').hide();
				$('#pengeluaran').hide();
				$('#tanggal').hide();
				if($('#pengeluarans').is(':checked')) {
					$('#pengeluaran').show();
				}
				else if($('#tgl').is(':checked')) {
					$('#tanggal').show();
				}
			});

            $('.cariSubmit').click(function(){
                if($('#pengeluarans').is(':checked')) {
                    var bulanTahun = $('#bulanTahun').val();
                    var jenis = $('#jenis').val();
                    if(bulanTahun==undefined || jenis==undefined){
                        alert('Input tidak boleh kosong!')
                    }else{

                        $.ajax({
                          url: "<?=base_url();?>laporan/get_kasByJenis",
                          data:{
                            bulanTahun: bulanTahun,
                            jenis: jenis
                          },
                          type: "POST",
                          success:function(data){
                              $('#isiTabel').show();
                              $('#isiTabel').html(data);
                          },
                          error:function(jqXHR,textStatus, errorThrown){
                              alert('error');
                          }
                        });
                    }
                }
                else if($('#tgl').is(':checked')) {
                    var dari = $('#tgl_dari').val();
                    var sampai = $('#tgl_sampai').val();
                    if(dari=="" || sampai==""){
                        alert('Input tidak boleh kosong!')
                    }else{
                        $.ajax({
                          url: "<?=base_url();?>laporan/get_kasByTanggal",
                          data:{
                            dari: dari,
                            sampai: sampai
                          },
                          type: "POST",
                          success:function(data){
                              $('#isiTabel').show();
                              $('#isiTabel').html(data);
                          },
                          error:function(jqXHR,textStatus, errorThrown){
                              alert('error');
                          }
                        });
                    }
                }
            });
		});
	</script>
</div>
