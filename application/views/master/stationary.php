<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Stationary</h1>
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
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Add Stationary &nbsp; <i class="fa fa-plus fa-fw"></i></button>
                                </div>
                            </div>
                            <br><br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Stationary</th>
                                        <th>Stok</th>
                                        <th>Last Update</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $count = 1;
                                        foreach ($stationary as $stationary_item) { 
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $stationary_item['NamaStationary']; ?></td>
                                        <td><?php echo $stationary_item['Stok']." ".$stationary_item['Satuan']; ?> </td>
                                        <td><?php echo $stationary_item['LastUpdate']; ?></td>
                                        <td class="center" align="center">
                                            <a href="#" style="font-style: none; font-size: 15pt; color: red;"><i class="fa fa-trash fa-fw" data-toggle="modal" data-target="#modalDelete<?php echo $stationary_item['ID_Stationary']; ?>"></i></a>
                                            &nbsp;
                                            <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdate<?php echo $stationary_item['ID_Stationary']; ?>"><i class="fa fa-edit fa-fw"></i></a>
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
        </div>
        <!-- /#page-wrapper -->

        <!-- Modal add-->
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Stationary</h4>
              </div>
              <?php echo form_open('master/add_stationary'); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Nama Stationary :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Jumlah Stok :</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="stok" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Satuan :</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="satuan" required>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary alert" value="Submit">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
<?php 
    foreach ($stationary as $stationary_item) { 
?>
        <!-- Modal delete-->
        <div class="modal fade" id="modalDelete<?php echo $stationary_item['ID_Stationary']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Stationary</h4>
              </div>
              <?php echo form_open('master/delete_stationary/'.$stationary_item['ID_Stationary']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="ID_Stationary" value="<?php echo $stationary_item['ID_Stationary']; ?>">
                            <h4 style="font-weight: bold;">Are you sure want to delete?</h4>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-danger alert" value="Delete">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>

        <!-- Modal Update-->
        <div class="modal fade" id="modalUpdate<?php echo $stationary_item['ID_Stationary']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Stationary</h4>
              </div>
              <?php echo form_open('master/update_stationary/'.$stationary_item['ID_Stationary']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <input type="hidden" name="ID_Stationary" value="<?php echo $stationary_item['ID_Stationary']; ?>">
                            <h5 style="font-weight: bold;">Nama Stationary :</h5>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nama" value="<?php echo $stationary_item['NamaStationary']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Jumlah Stok :</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="number" class="form-control" name="stok" value="<?php echo $stationary_item['Stok']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" align="right">
                            <h5 style="font-weight: bold;">Satuan :</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="satuan" value="<?php echo $stationary_item['Satuan']; ?>">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary alert" value="Update">
                  </div>
                <?php echo form_close(); ?>
            </div>
          </div>
        </div>
<?php } ?>

    </div>
    <!-- /#wrapper -->
    <script type="text/javascript" src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script type="text/javascript">
        $('.alert').click(function(){
            swal({
              title: "Success!",
              text: "Successfully updated",
              icon: "success",
              button: "return to page",
            });
        });
    </script>