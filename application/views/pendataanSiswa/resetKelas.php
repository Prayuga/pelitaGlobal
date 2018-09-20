<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Reset Status Kelas</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-12" align="center">
                			<h5>
	                			<b>*Note:</b>
	                			Reset kelas dilakukan, sebelum mendaftarkan siswa ke kelas barunya. Reset kelas akan me-reset status kelas untuk siswa yang masih aktif.
	                		</h5>
                		</div>
                	</div>
                	<br>
                	<div class="row">
                		<div class="col-md-4 col-md-offset-4">
                			<button type="submit" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#confirm">Reset Status Kelas &nbsp;<i class='fa fa-undo fa-fw'></i></button>
                		</div>
                		
                	</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal delete-->
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Reset Status Kelas</h4>
          </div>
          <?php echo form_open('pendataanSiswa/do_resetKelas/'); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" align="center">
                        <h4 style="font-weight: bold;">Anda yakin ingin me-reset status kelas siswa aktif?</h4>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" name="submit" class="btn btn-warning" value="Reset">
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
</div>

<!--swal-->
<script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
   <?php if($this->session->flashdata('alert') != null){ ?>
    swal({
      title: "Berhasil!",
      text: "<?php echo $this->session->flashdata('msg'); ?>",
      icon: "<?php echo $this->session->flashdata('alert'); ?>",
      button: "Ok",
    });
   <?php } ?>
</script>