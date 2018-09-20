<div id="page-wrapper">

<!-- ini isi halamannya -->
    <div class="row">
        <div class="col-lg-12">
        	<h3 class="page-header">Entri Data Katering</h3>
        </div>
    </div>
    <div class="row">
    	<?php echo form_open('katering/add_kat'); ?>
    	<div class="row">
			<div class="col-md-3 col-md-offset-2" align="right">
                <label style="margin-top: 5px;">Kategori Kelas</label>
			</div>
			<div class="col-md-3">
                <div class="form-group">
                    <select class="selectpicker form-control" name="kategori" id="katkat" data-live-search="true" title="Pilih Kategori Kelas">
                    	<?php foreach ($kategori as $k_item) { ?>
                    		<option value="<?php echo $k_item['ID_Kategori']; ?>"><?php echo $k_item['NamaKategori']; ?></option>
                    	<?php } ?>
                    </select>
                </div>
            </div>
        </div>
    	<div class="row">
			<div class="col-md-3 col-md-offset-2" align="right">
                <label style="margin-top: 5px;">Siswa</label>
			</div>
			<div class="col-md-3">
                <div class="form-group">
                    <select class="selectpicker form-control" name="siswa" data-live-search="true" title="Pilih Siswa" id="siswa">
                    	
                    </select>
                </div>
            </div>
        </div>
    	<div class="row">
			<div class="col-md-3 col-md-offset-2" align="right">
                <label style="margin-top: 5px;">Untuk Tanggal</label>
			</div>
			<div class="col-md-3">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tanggal" name="tanggal">
                </div>
            </div>
        </div>
    	<div class="row">
			<div class="col-md-3 col-md-offset-2" align="right">
                <label style="margin-top: 5px;">Keterangan</label>
			</div>
			<div class="col-md-3">
                <div class="form-group">
                    <textarea class="form-control" name="keterangan"></textarea>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-3 col-md-offset-5">
				<input type="submit" class="btn btn-primary form-control" name="" value="Submit">
			</div>
		</div>
		<?php echo form_close(); ?>
    </div>
</div>
    <!--swal-->
    <script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD'
        });

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

		<?php if( $this->session->flashdata('msg') != null){ ?>
	       	swal({
	          title: "Success!",
	          text: "<?php echo $this->session->flashdata('msg'); ?>",
	          icon: "success",
	          button: "Ok",
	        });
        <?php } ?>
	});
</script>