<div id="page-wrapper">
<!-- ini isi halamannya -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Tambah User &nbsp; <i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <br><br>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Nama User</th>
                                <th>Perubahan Terakhir</th>
                                <th>Diubah Oleh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($user as $user_item) { 
                            ?>
                            <tr>
                                <td><?php echo $user_item['ID_User']; ?></td>
                                <td><?php echo $user_item['NamaUser']; ?> </td>
                                <td><?php echo $user_item['LastUpdate']; ?></td>
                                <td><?php echo $user_item['UpdatedBy']; ?></td>
                                <td class="center" align="center">
                                    <a href="#" style="font-style: none; font-size: 15pt; color: red;"><i class="fa fa-trash fa-fw" data-toggle="modal" data-target="#modalDelete<?php echo $user_item['ID_User']; ?>"></i></a>
                                    &nbsp;
                                    <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdate<?php echo $user_item['ID_User']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                    &nbsp;
                                    <a href="#" style="font-style: none; font-size: 15pt; color: orange;" data-toggle="modal" data-target="#modalReset<?php echo $user_item['ID_User']; ?>"><i class="fa fa-undo fa-fw"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
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
            <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
          </div>
          <?php 
                echo form_open('user/add_user'); 
                foreach ($jumlah as $row) {
                    $x = $row['jumlah'];
                    $numlength = strlen((string)$x);
                    if($numlength==1){
                        $Jumlah_new="000".$row['jumlah'];
                    }else if($numlength==2){
                        $Jumlah_new="00".$row['jumlah'];
                    }else if($numlength==3){
                        $Jumlah_new="0".$row['jumlah'];
                    }else if($numlength==4){
                        $Jumlah_new=$row['jumlah'];
                    }
                }
          ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">ID User :</h5>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="idUser" value="<?php echo $Jumlah_new; ?>" readonly>
                    </div>
                    <div class="col-md-5" style="font-size: 9pt; color: red;">
                        *ID User otomatis sesuai urutan
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Password :</h5>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="password" value="1234" readonly>
                    </div>
                    <div class="col-md-5" style="font-size: 9pt; color: red;">
                        *Password awal otomatis
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Nama User :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nama" required>
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
    foreach ($user as $user_item) { 
?>
        <!-- Modal delete-->
        <div class="modal fade" id="modalDelete<?php echo $user_item['ID_User']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus User</h4>
              </div>
              <?php echo form_open('user/delete_user/'.$user_item['ID_User']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="idUser" value="<?php echo $user_item['ID_User']; ?>">
                            <h4 style="font-weight: bold;">Anda yakin ingin menghapus user?</h4>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <input type="submit" name="submit" class="btn btn-danger alerts" value="Hapus">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <!-- Modal Update-->
        <div class="modal fade" id="modalUpdate<?php echo $user_item['ID_User']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Data User</h4>
              </div>
              <?php echo form_open('user/update_user/'.$user_item['ID_User']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <input type="hidden" name="idUser" value="<?php echo $user_item['ID_User']; ?>">
                            <h5 style="font-weight: bold;">Nama User :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nama" value="<?php echo $user_item['NamaUser']; ?>">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary alerts" value="Ubah">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <!-- Modal Update-->
        <div class="modal fade" id="modalReset<?php echo $user_item['ID_User']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reset Password User</h4>
              </div>
              <?php echo form_open('user/reset_passUser/'.$user_item['ID_User']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="idUser" value="<?php echo $user_item['ID_User']; ?>">
                            <input type="hidden" name="password" value="1234">
                            <h4 style="font-weight: bold;">Anda yakin ingin mengubah password user menjadi password awal?</h4>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <input type="submit" name="submit" class="btn btn-primary alerts" value="Ya">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
<?php } ?>

    
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
</div>
<!-- /#page-wrapper -->