<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Entri Data Kas Bulan Baru</h3>
    </div>
        
        <!-- notif crud
       <div class="msg alert <?php //echo $this->session->flashdata('alert');?>">
            <center>
                <?php //echo $this->session->flashdata('msg'); ?>
            </center>
       	</div>
        <script>
            $(".alert-success").delay(4000).fadeOut(1000, function () { $(this).remove(); });
        </script>  -->
        <!-- end notif crud --> 
        <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                  
                <form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/addKasBulan')?>">
                  
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                          <label class="control-label col-sm-3">Bulan :</label>
                          <div class="col-sm-9">
                            <!-- tahun -->
                              <select name="bln" class="selectpicker form-control" id="bln" title="Select Bulan" required>
                                  <option value="Januari">Januari</option>
                                  <option value="Februari">Februari</option>
                                  <option value="Maret">Maret</option>
                                  <option value="April">April</option>
                                  <option value="Mei">Mei</option>
                                  <option value="Juni">Juni</option>
                                  <option value="Juli">Juli</option>
                                  <option value="Agustus">Agustus</option>
                                  <option value="September">September</option>
                                  <option value="Oktober">Oktober</option>
                                  <option value="November">November</option>
                                  <option value="Desember">Desember</option>
                              </select>
                          </div>
                        </div>
                        <div class="form-group col-lg-6">
                          <label class="control-label col-sm-3">Tahun :</label>
                          <div class="col-sm-9">
                               <input type="text" class="form-control" placeholder="YYYY" id="thn" name="thn" required>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                          <label class="control-label col-sm-3">Start Date :</label>
                          <div class="col-sm-9">
                               <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="start" name="start" required>
                          </div>
                        </div>
                        <div class="form-group col-lg-6">
                          <label class="control-label col-sm-3">End Date :</label>
                          <div class="col-sm-9">
                               <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="end" name="end" required>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="control-label col-sm-3">Keterangan :</label>
                            <div class="col-sm-9">
                                <textarea name="ket" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <center>
                    <input type="submit" class="btn btn-md btn-primary" style="width:180px" value="Submit">
                    </center>
                </div>
                    
                </form>
              </div>
          </div>
        </div>
    </div>
               
</div>

<!--swal-->
<script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
   <?php if( $this->session->flashdata('alert') != null){ ?>
   swal({
      title: "Berhasil!",
      text: "<?php echo $this->session->flashdata('msg'); ?>",
      icon: "<?php echo $this->session->flashdata('alert'); ?>",
      button: "Ok",
    });
   <?php } ?>
</script>
<script>
    $(document).ready(function (){
       $('#thn').datetimepicker({
                format: 'YYYY',
                maxDate: $.now()
            }); 
       $('#start').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            }); 
       $('#end').datetimepicker({
                format: 'YYYY-MM-DD'
            });
    });
</script>
