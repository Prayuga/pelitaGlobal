<div id="page-wrapper">
<!-- ini isi halamannya -->
    <div class="row">
        <div class="col-lg-12">
			<h3 class="page-header">Hak Akses Pengguna</h3> 
				
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-3">
                            <label class="pull-left" style="margin-right: 10px; margin-top: 5px;">ID User : </label> &nbsp;
                            <div class="col-md-3">
                                <input type="text" name="idUser" class="form-control" id="idUser">
                            </div>
                            <input type="submit" name="submit" value="Cari" class="btn btn-primary col-md-2" id="cari">
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12" id="isi">
                            
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#isi').hide();
            $('#cari').click(function(){
                var idUser = $('#idUser').val();

                $.ajax({
                  url: "<?=base_url();?>user/get_userID/"+idUser,
                  type: "POST",
                  success:function(data){
                      $('#isi').show();
                      $('#isi').html(data);
                  },
                  error:function(jqXHR,textStatus, errorThrown){
                      alert('error');
                  }
                });
            });
        });
    </script>
</div>
<!-- /#page-wrapper -->
