<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tahun Ajaran</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd">Add Tahun Ajaran&nbsp; <i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" align="center">
                                <thead>
                                    <tr>
                                        <th width="20%" style="text-align: center;">Tahun Ajaran Berjalan</th>
                                        <th width="20%" style="text-align: center;">Tanggal Mulai</th>
                                        <th width="50%" style="text-align: center;">Keterangan</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tahunAjaran as $tahunAjaran_item) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $tahunAjaran_item['TahunAjaran']; ?></td>
                                        <td style="text-align: center;"><?php echo $tahunAjaran_item['Start']; ?></td>
                                        <td style="text-align: center;"><?php echo $tahunAjaran_item['Keterangan']; ?></td>
                                        <td align="center">
                                            <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdate"><i class="fa fa-edit fa-fw"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="">Kategori Kelas</h1>
            <hr>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAddKategori">Add Kategori Kelas&nbsp; <i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" align="center">
                                <thead>
                                    <tr>
                                        <th width="20%" style="text-align: center;">ID Kategori</th>
                                        <th width="20%" style="text-align: center;">Nama Kategori</th>
                                        <th width="20%" style="text-align: center;">Minimal Umur</th>
                                        <th width="30%" style="text-align: center;">Keterangan</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kategorikelas as $kategorikelas_item) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $kategorikelas_item['SingkatanKategori']; ?></td>
                                        <td style="text-align: center;"><?php echo $kategorikelas_item['NamaKategori']; ?></td>
                                        <td style="text-align: center;"><?php echo $kategorikelas_item['MinUmur']; ?> tahun</td>
                                        <td style="text-align: center;"><?php echo $kategorikelas_item['Keterangan']; ?></td>
                                        <td align="center">
                                            <a href="#" style="font-style: none; font-size: 15pt; color: red;"><i class="fa fa-trash fa-fw" data-toggle="modal" data-target="#modalDelete<?php echo $kategorikelas_item['ID_Kategori']; ?>"></i></a>
                                            &nbsp;
                                            <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdateKategori<?php echo $kategorikelas_item['ID_Kategori']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="">Kelas</h1>
            <hr>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modalAddKelas">Add Kelas&nbsp; <i class="fa fa-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-2" align="center">
                                <thead>
                                    <tr>
                                        <th width="20%" style="text-align: center;">Tahun Ajaran</th>
                                        <th width="20%" style="text-align: center;">Kategori</th>
                                        <th width="20%" style="text-align: center;">Nama Kelas</th>
                                        <th width="30%" style="text-align: center;">Keterangan</th>
                                        <th width="10%" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kelas as $kelas_item) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $kelas_item['TahunAjaran']; ?></td>
                                        <td style="text-align: center;"><?php echo $kelas_item['NamaKategori']; ?></td>
                                        <td style="text-align: center;"><?php echo $kelas_item['NamaKelas']; ?></td>
                                        <td style="text-align: center;"><?php echo $kelas_item['Keterangan']; ?></td>
                                        <td align="center">
                                            <a href="#" style="font-style: none; font-size: 15pt; color: red;"><i class="fa fa-trash fa-fw" data-toggle="modal" data-target="#modalDeleteKelas<?php echo $kelas_item['ID_Kelas']; ?>"></i></a>
                                            &nbsp;
                                            <a href="#" style="font-style: none; font-size: 15pt; color: blue;" data-toggle="modal" data-target="#modalUpdateKelas<?php echo $kelas_item['ID_Kelas']; ?>"><i class="fa fa-edit fa-fw"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
            <h4 class="modal-title" id="myModalLabel">Add Tahun Ajaran</h4>
          </div>
          <?php echo form_open('master/add_tahunAjaran'); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Tahun Ajaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tahunAjaran" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Tanggal Mulai :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_l" name="start">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" id="pendidikan_sebelum" name="keterangan" rows="2"></textarea>
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
    <!--//INI KAN AKUUU-->
<?php foreach ($tahunAjaran as $tahunAjaran_item) { ?>
    <!-- Modal update-->
    <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Tahun Ajaran Berjalan</h4>
          </div>
          <?php echo form_open('master/update_tahunAjaran/'.$tahunAjaran_item['ID_TahunAjaran']); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Tahun Ajaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tahunAjaran" value="<?php echo $tahunAjaran_item['TahunAjaran']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Tanggal Mulai :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_l" name="start" value="<?php echo $tahunAjaran_item['Start']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" id="pendidikan_sebelum" name="keterangan" rows="2" ><?php echo $tahunAjaran_item['Keterangan']; ?></textarea>
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
    <!-- Modal add kategori-->
    <div class="modal fade" id="modalAddKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Kategori Kelas</h4>
          </div>
          <?php echo form_open('master/add_kategorikelas'); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">ID Kategori :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="singkatanKategori" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Nama Kategori :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="namaKategori" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" id="pendidikan_sebelum" name="keterangan" rows="2"></textarea>
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

    <!-- Modal add kelas-->
    <div class="modal fade" id="modalAddKelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Kelas</h4>
          </div>
          <?php echo form_open('master/add_kelas'); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Tahun Ajaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <!-- tahun_ajaran-->
                          <select name="tahun_ajaran" class="selectpicker form-control" id="tahun_ajaran" title="Select Tahun Ajaran">
                            <?php foreach ($tahunAjaran as $ta_item) { ?>
                              <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
                            <?php } ?>
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Kategori Kelas :</h5>
                    </div>
                    <div class="col-md-6">
                        <!-- kategori-->
                          <select name="kategori" class="selectpicker form-control" id="kategori" title="Select Kategori">
                            <?php foreach ($kategorikelas as $kategori_item) { ?>
                              <option value="<?php echo $kategori_item['ID_Kategori']; ?>"><?php echo $kategori_item['NamaKategori']; ?></option>
                            <?php } ?>
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Nama Kelas :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="namakelas" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" id="" name="keterangan" rows="2"></textarea>
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
<?php foreach ($kategorikelas as $kategorikelas_item) { ?>
    <!-- Modal delete-->
        <div class="modal fade" id="modalDelete<?php echo $kategorikelas_item['ID_Kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Stationary</h4>
              </div>
              <?php echo form_open('master/delete_kategorikelas/'.$kategorikelas_item['ID_Kategori']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="ID_Stationary" value="<?php echo $kategorikelas_item['ID_Kategori']; ?>">
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

    <!-- Modal update kategori-->
    <div class="modal fade" id="modalUpdateKategori<?php echo $kategorikelas_item['ID_Kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Kategori Kelas</h4>
          </div>
          <?php echo form_open('master/update_kategorikelas/'.$kategorikelas_item['ID_Kategori']); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">ID Kategori :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control"  name="singkatanKategori" value="<?php echo $kategorikelas_item['SingkatanKategori']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Nama Kategori :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="namaKategori" value="<?php echo $kategorikelas_item['NamaKategori']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Minimal Umur :</h5>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="minUmur" value="<?php echo $kategorikelas_item['MinUmur']; ?>" required>
                    </div>
                    <div class="col-md-1" align="right">
                        <h5 style="font-weight: bold;">Tahun</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" id="pendidikan_sebelum" name="keterangan" rows="2"><?php echo $kategorikelas_item['Keterangan']; ?></textarea>
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
    }
    foreach ($kelas as $kelas_item) { 
?>
    <!-- Modal delete-->
        <div class="modal fade" id="modalDeleteKelas<?php echo $kelas_item['ID_Kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Stationary</h4>
              </div>
              <?php echo form_open('master/delete_kelas/'.$kelas_item['ID_Kelas']); ?>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="hidden" name="ID_Stationary" value="<?php echo $kelas_item['ID_Kelas']; ?>">
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

    <!-- Modal update kategori-->
    <div class="modal fade" id="modalUpdateKelas<?php echo $kelas_item['ID_Kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Kategori Kelas</h4>
          </div>
          <?php echo form_open('master/update_kelas/'.$kelas_item['ID_Kelas']); ?>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Tahun Ajaran :</h5>
                    </div>
                    <div class="col-md-6">
                        <!-- tahun_ajaran-->
                          <select name="tahun_ajaran" class="selectpicker form-control" id="tahun_ajaran" title="Select Tahun Ajaran">
                            <?php foreach ($tahunAjaran as $ta_item) { ?>
                              <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>" <?php if($kelas_item['ID_TahunAjaran']==$ta_item['ID_TahunAjaran']){echo "selected='selected'";} ?>><?php echo $ta_item['TahunAjaran']; ?></option>
                            <?php } ?>
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Kategori Kelas :</h5>
                    </div>
                    <div class="col-md-6">
                        <!-- kategori-->
                          <select name="kategori" class="selectpicker form-control" id="kategori" title="Select Kategori">
                            <?php foreach ($kategorikelas as $kategori_item) { ?>
                              <option value="<?php echo $kategori_item['ID_Kategori']; ?>" <?php if($kelas_item['ID_Kategori']==$kategori_item['ID_Kategori']){echo "selected='selected'";} ?>><?php echo $kategori_item['NamaKategori']; ?></option>
                            <?php } ?>
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Nama Kelas :</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="namakelas" value="<?php echo $kelas_item['NamaKelas']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" align="right">
                        <h5 style="font-weight: bold;">Keterangan :</h5>
                    </div>
                    <div class="col-md-6">
                        <textarea type="text" class="form-control" id="" name="keterangan" rows="2"><?php echo $kelas_item['Keterangan']; ?></textarea>
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
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
        $('#dataTables-example-2').DataTable({
            responsive: true
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $('#tgl_l').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            });
        });
    </script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
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
<!-- /#page-wrapper -->