<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kas Rumah Tangga</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Tambah Jenis Pengeluaran &nbsp; <i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <br><br>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 1;
                                foreach ($jeniskas as $jeniskas_item) { 
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $jeniskas_item['JenisPengeluaran']; ?></td>
                                <td><?php echo $jeniskas_item['Keterangan']; ?></td>
                                <td class="center" align="center">
                                    <a href="#" style="font-style: none; font-size: 15pt; color: red;"><i class="fa fa-trash fa-fw" data-toggle="modal" data-target="#modalDelete<?php echo $jeniskas_item['ID_JenisPengeluaran']; ?>"></i></a>
                                    &nbsp;
                                    <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdate<?php echo $jeniskas_item['ID_JenisPengeluaran']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                </td>
                            </tr>
                            <?php $count++; } ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- Modal add-->
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Jenis Pengeluaran</h4>
          </div>
          <?php echo form_open('master/add_jenisKas'); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Jenis Pengeluaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="jenis" required>
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
                <input type="submit" name="submit" class="btn btn-primary alerts" value="Submit">
              </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </div>
<?php 
    foreach ($jeniskas as $jeniskas_item) { 
?>
        <!-- Modal delete-->
        <div class="modal fade" id="modalDelete<?php echo $jeniskas_item['ID_JenisPengeluaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Jenis Pengeluaran</h4>
              </div>
              <?php echo form_open('master/delete_jenisKas/'.$jeniskas_item['ID_JenisPengeluaran']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="ID_JenisPengeluaran" value="<?php echo $jeniskas_item['ID_JenisPengeluaran']; ?>">
                            <h4 style="font-weight: bold;">Are you sure want to delete?</h4>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-danger alerts" value="Hapus">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <!-- Modal Update-->
        <div class="modal fade" id="modalUpdate<?php echo $jeniskas_item['ID_JenisPengeluaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Jenis Pengeluaran</h4>
              </div>
              <?php echo form_open('master/update_jenisKas/'.$jeniskas_item['ID_JenisPengeluaran']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Jenis Pengeluaran :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="jenis" value="<?php echo $jeniskas_item['JenisPengeluaran']; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Keterangan :</h5>
                        </div>
                        <div class="col-md-6">
                            <textarea name="keterangan" class="form-control"><?php echo $jeniskas_item['Keterangan']; ?></textarea>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary alerts" value="Submit">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
<?php } ?>
</div>
    <!-- /#page-wrapper -->
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
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>