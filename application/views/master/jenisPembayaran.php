<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Jenis Pembayaran</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                	<div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Tambah Jenis Pembayaran &nbsp; <i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <br><br>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pembayaran</th>
                                <th>Nama Pembayaran</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            	$count=1;
                            	foreach ($detail as $detail_item) { 
                            ?>
                            	<tr>
                            		<td><?php echo $count; ?></td>
                            		<td><?php echo $detail_item['JenisPembayaran']; ?></td>
                            		<td><?php echo $detail_item['DetailPembayaran']; ?></td>
                            		<td><?php echo $detail_item['Keterangan']; ?></td>
                            		<td><?php echo $detail_item['harga']; ?></td>
                            		<td><?php echo $detail_item['tanggal']; ?></td>
                            		<td class="center" align="center">
                                        <a href="#" style="font-style: none; font-size: 15pt; color: red;"><i class="fa fa-trash fa-fw" data-toggle="modal" data-target="#modalDelete<?php echo $detail_item['ID_DetailJenisPembayaran']; ?>"></i></a>
                                        &nbsp;
                                        <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdate<?php echo $detail_item['ID_DetailJenisPembayaran']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                    </td>
                            	</tr>
                            <?php 
	                            	$count++;
	                            } 
                            ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Jenis Pembayaran</h4>
          </div>
          <?php echo form_open('master/add_jenisPembayaran'); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Jenis Pembayaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <select name="jenis" class="selectpicker form-control" title="Pilih Jenis Pembayaran" required>
                        	<?php foreach ($jenis as $jenis_item) { ?>
                        		<option value="<?php echo $jenis_item['ID_HeaderJenisPembayaran']; ?>"><?php echo $jenis_item['JenisPembayaran']; ?></option>
                        	<?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Nama Pembayaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Harga :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="harga" id="harga" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>

<?php 
    foreach ($detail as $detail_item) { 
?>
        <!-- Modal delete-->
        <div class="modal fade" id="modalDelete<?php echo $detail_item['ID_DetailJenisPembayaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Stationary</h4>
              </div>
              <?php echo form_open('master/delete_jenisPembayaran/'.$detail_item['ID_DetailJenisPembayaran']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="ID_Stationary" value="<?php echo $detail_item['ID_DetailJenisPembayaran']; ?>">
                            <h4 style="font-weight: bold;">Are you sure want to delete?</h4>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-danger alerts" value="Delete">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <!-- Modal Update-->
        <div class="modal fade" id="modalUpdate<?php echo $detail_item['ID_DetailJenisPembayaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Stationary</h4>
              </div>
              <?php echo form_open('master/update_jenisPembayaran/'.$detail_item['ID_DetailJenisPembayaran']); ?>
                  <div class="modal-body">
	                <div class="row">
	                    <div class="col-md-4" align="right">
	                        <h5 style="font-weight: bold;">Jenis Pembayaran :</h5>
	                    </div>
	                    <div class="col-md-6">
	                        <select name="jenis" class="selectpicker form-control" title="Pilih Jenis Pembayaran" required>
	                        	<?php 
	                        		foreach ($jenis as $jenis_item) { 
	                        			if($detail_item['ID_HeaderJenisPembayaran']==$jenis_item['ID_HeaderJenisPembayaran']){
	                        	?>
	                        		<option value="<?php echo $jenis_item['ID_HeaderJenisPembayaran']; ?>" selected="selected"><?php echo $jenis_item['JenisPembayaran']; ?></option>
	                        	<?php
	                        			}else{
	                        	?>
	                        		<option value="<?php echo $jenis_item['ID_HeaderJenisPembayaran']; ?>"><?php echo $jenis_item['JenisPembayaran']; ?></option>
	                        	<?php
	                        			}
	                        		} 
	                        	?>
	                        </select>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4" align="right">
	                        <h5 style="font-weight: bold;">Nama Pembayaran :</h5>
	                    </div>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" name="nama" value="<?php echo $detail_item['DetailPembayaran']; ?>" required>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4" align="right">
	                        <h5 style="font-weight: bold;">Harga :</h5>
	                    </div>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" name="harga" value="<?php echo $detail_item['harga_def']; ?>" required>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-md-4" align="right">
	                        <h5 style="font-weight: bold;">Keterangan :</h5>
	                    </div>
	                    <div class="col-md-6">
	                        <textarea name="keterangan" class="form-control"><?php echo $detail_item['Keterangan']; ?></textarea>
	                    </div>
	                </div>
	              </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary alerts" value="Update">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
<?php } ?>

    <!-- /#wrapper -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true
        });  
        <?php if( $this->session->flashdata('alert') != null){ ?>
       swal({
          title: "Success!",
          text: "<?php echo $this->session->flashdata('alert'); ?>",
          icon: "success",
          button: "return to page",
        });
       <?php } ?>
    });
    </script>
    <script type="text/javascript">
        $('.alerts').click(function(){
            swal({
              title: "Success!",
              text: "Successfully updated",
              icon: "success",
              button: "return to page",
            });
        });
    </script>
</div>