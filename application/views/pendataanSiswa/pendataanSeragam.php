<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Pendataan Seragam</h3> 
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<?php echo form_open('pendataanSiswa/Seragam'); ?>
							<div class="row">
								<div class="col-md-3">
	                                <div class="form-group">
	                                    <label>Kategori Kelas</label>
	                                    <select class="selectpicker" name="kategori" id="katkat" data-live-search="true" title="Pilih Kategori Kelas">
	                                    	<?php foreach ($kategori as $k_item) { ?>
	                                    		<option value="<?php echo $k_item['ID_Kategori']; ?>"><?php echo $k_item['NamaKategori']; ?></option>
	                                    	<?php } ?>
	                                    </select>
	                                </div>
	                            </div>
	                            <div class="col-md-3">
	                                <div class="form-group">
	                                    <label>Siswa</label>
	                                    <select class="selectpicker" name="siswa" data-live-search="true" title="Pilih Siswa" id="siswa">
	                                    	
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
								if($siswa != null){
									echo form_open('pendataanSiswa/trx_seragam');
							?>
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<?php
										foreach ($siswa as $siswa_item) {
											$idsiswa = $siswa_item['NomorIndukSiswa'] ;
									?>
										<table style="font-weight: bold;">
											<tr>
												<td>Nomor Induk Siswa</td>
												<td width="30px" align="center">:</td>
												<td><?php echo $siswa_item['NomorIndukSiswa'] ; ?></td>
											</tr>
											<tr>
												<td>Nama Siswa</td>
												<td width="30px" align="center">:</td>
												<td><?php echo $siswa_item['NamaSiswa'] ; ?></td>
											</tr>
										</table>
										<input type="hidden" name="idSiswa" value="<?php echo $siswa_item['NomorIndukSiswa'] ; ?>">
									<?php } ?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<table class="table table-striped table-bordered table-hover table-responsive">
										<thead>
											<tr>
												<td>Check</td>
												<td>Seragam</td>
												<td>Ukuran</td>
											</tr>
										</thead>
										<tbody>
											<?php 
												foreach ($seragam_h as $s_item) { 
											?>
											<tr>
												<td><input type="checkbox" name="" value="" id="cek_<?=$s_item['Id_seragam']?>"></td>
												<td><?php echo $s_item['Nama_seragam']; ?></td>
												<td>
													<select class="selectpicker" title="Pilih Ukuran" name="detail_s[]" id="select_<?=$s_item['Id_seragam']?>" disabled>
														<?php 
								                            $sql = "SELECT ID_detailseragam, ukuran FROM `msdetailseragam` WHERE flagactive = 'Y' AND stok != 0 AND Id_seragam = '".$s_item['Id_seragam']."' ";
								                            $query = $this->db->query($sql);
								                            if($query->num_rows() > 0){
								                                foreach ($query->result() as $row) {
										                            $sqls = "SELECT ID_detailseragam FROM `trseragam` WHERE NomorIndukSiswa = '".$idsiswa."' AND ID_detailseragam = '".$row->ID_detailseragam."' ";
										                            $querys = $this->db->query($sqls);
										                            if($querys->num_rows() > 0){
										                                foreach ($querys->result() as $rows) {
										                                	if($rows->ID_detailseragam==$row->ID_detailseragam){
										                ?>
														<option value="<?php echo $row->ID_detailseragam; ?>" selected><?php echo $row->ukuran; ?></option>
										                <?php
										                					}
										                                }
										                            }
								                        ?>
														<option value="<?php echo $row->ID_detailseragam; ?>"><?php echo $row->ukuran; ?></option>
														<?php 
																}
															}
														?>
													</select>
												</td>
											</tr>
											<?php
												} 
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-md-offset-4">
									<input type="submit" class="btn btn-primary form-control" name="" value="Submit">
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){


			$('#katkat').change(function(){
				var kat = $('#katkat').val();

				$.ajax({
	              url: "<?=base_url();?>pendataanSiswa/getSiswa_seragam/"+kat,
	              type: "POST",
	              success:function(data){
	                  $('#siswa').html(data);
	                  $('#siswa').selectpicker('refresh');
	              },
	              error:function(jqXHR,textStatus, errorThrown){
	                  alert('error');
	              }
	            });
			});

			<?php foreach ($seragam_h as $s_item) { ?>
				$('#cek_<?=$s_item['Id_seragam']?>').click(function(){
					if($('#cek_<?=$s_item['Id_seragam']?>').is(':checked')){
						$('#select_<?=$s_item['Id_seragam']?>').removeAttr('disabled');
	                    $('#select_<?=$s_item['Id_seragam']?>').selectpicker('refresh');
					}else if($('#cek_<?=$s_item['Id_seragam']?>').not(':checked')){
						$('#select_<?=$s_item['Id_seragam']?>').prop( 'disabled', true );
	                    $('#select_<?=$s_item['Id_seragam']?>').selectpicker('refresh');
					}
				});

				if($('#select_<?=$s_item['Id_seragam']?>').val()!=""){
					// alert($('#select_<?=$s_item['Id_seragam']?>').val());
					$('#select_<?=$s_item['Id_seragam']?>').removeAttr('disabled');
                    $('#select_<?=$s_item['Id_seragam']?>').selectpicker('refresh');
                    $('#cek_<?=$s_item['Id_seragam']?>').prop( 'checked', true );
				}
			<?php } ?>
		});
	</script>
</div>
