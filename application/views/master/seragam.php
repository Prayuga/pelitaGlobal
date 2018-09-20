<div id="page-wrapper">
        <div class="col-lg-12">
            <h3 class="page-header" align="center">Master Seragam</h3> 
        </div>
        
        <!-- notif crud
       <div class="msg alert <?php //echo $this->session->flashdata('alert');?>">
   			<center>
       			<?php// echo $this->session->flashdata('msg'); ?>
       		</center>
       	</div>
        <script>
            $(".alert-success").delay(4000).fadeOut(1000, function () { $(this).remove(); });
        </script>  
         end notif crud -->
        <center>
	        <div class="btn-group btn-group-lg">
	        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah_s">
	        	<i class="fa fa-user" aria-hidden="true"> </i> Tambah Seragam
	        </button>
	        <button class="btn btn-success btnTambah_u" data-toggle="modal" data-target="#tambah_u">
	     	   <i class="fa fa-bar-chart" aria-hidden="true"> </i> Tambah Ukuran
	    	</button>
	       </div>
       </center>
       <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        	<thead>
        		<tr>
        			<th>Nama Seragam</th>
        			<th>Jenis</th>
        			<th>Ukuran</th>
        			<th>Stok</th>
        			<th>Action</th>
        		</tr>
        	</thead>
			<tbody>
			</tbody>        	
        </table>

        <!-- Modal Tambah seragam -->
		<div id="tambah_s" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah Seragam</h4>
		      </div>
		      <div class="modal-body">

		      	<form class="form-horizontal" method="post" action="<?php echo site_url('master/addseragam')?>">
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="nama_s">Nama seragam :</label>
	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" id="nama_s" name="nama_s" required>
	                    </div>
	                  </div>
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="jk">Jenis kelamin :</label>
	                    <div class="col-sm-8">
	                      <select class="form-control" id="jk" name="jk">
	                      		<option value="0">-- Pilih satu --</option>
	                      		<option value="1">Laki-laki</option>
	                      		<option value="2">Perempuan</option>
	                      		<option value="3">Campur</option>
	                      </select>
	                    </div>
	                  </div>
	              <button type="submit" class="form-control btn btn-info">Submit</button>
		      	</form>

		      </div>
		    </div>

		  </div>
		</div>
		<!-- end modal tambah seragam -->


        <!-- Modal Tambah Ukuran -->
		<div id="tambah_u" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah Ukuran</h4>
		      </div>
		      <div class="modal-body">

		      	<form class="form-horizontal" method="post" action="<?php echo site_url('master/addukuran')?>">
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="nama_s">Nama seragam :</label>
	                    <div class="col-sm-8">
	                      <select class="form-control" id="nama_ser" name="nama_ser" style="width:100%;">
	                      		<option value="0">-- Pilih satu --</option>
	                      		<option value="1">Dress</option>
	                      </select>
	                    </div>
	                  </div>
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="jk">Pilih Ukuran :</label>
	                    <div class="col-sm-8"> 
	                    	<input type="checkbox" name="cb[]" value="S"> S<br>
							<input type="checkbox" name="cb[]" value="M"> M<br>
							<input type="checkbox" name="cb[]" value="L"> L<br> 
							<input type="checkbox" name="cb[]" value="Besar"> Besar<br> 
							<input type="checkbox" name="cb[]" value="Kecil"> Kecil<br> 
	                    </div>
	                  </div>
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="jk">Stok :</label>
	                    <div class="col-sm-8"> 
	                    	<input type="text" class="form-control" name="Stok" onkeypress="return isNumber(event)">
	                    </div>
	                  </div>
	              <button type="submit" class="form-control btn btn-info">Submit</button>
		      	</form>

		      </div>
		    </div>

		  </div>
		</div>
		<!-- end modal tambah ukuran -->


		    <!-- Modal Update Stok -->
		<div id="update_s" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Ubah Stok Seragam</h4>
		      </div>
		      <div class="modal-body">

		      	<form class="form-horizontal" method="post" action="<?php echo site_url('master/updatestok')?>">
		      			<div class="hidden" >
		      				<input type="text" id="up_id" name="id">
		      			</div>
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="nama_s">Nama seragam :</label>
	                    <div class="col-sm-8">
	                      <input type="text" id="up_nama" name="nama_s" class="form-control" readonly="true" disabled="true">
	                    </div>
	                  </div>
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="jk">Ukuran :</label>
	                    <div class="col-sm-8"> 
	                    	<input type="text" id="up_uk" name="Ukuran" class="form-control" readonly="true" disabled="true">
	                    </div>
	                  </div>
	                  <div class="form-group col-lg-12">
	                    <label class="control-label col-sm-4" for="jk">Stok :</label>
	                    <div class="col-sm-8"> 
	                    	<input type="number" id="up_Stok" name="Stok" class="form-control" onkeypress="return isNumber(event)">
	                    </div>
	                  </div>
	              <button type="submit" class="form-control btn btn-info">Submit</button>
		      	</form>

		      </div>
		    </div>

		  </div>
		</div>
		<!-- end modal tambah seragam -->
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
		<script type="text/javascript">
			var myTab;

			$(document).ready(function(){  
				//select2 picker  
				$("#nama_ser").select2();


				myTab = $('#mytable').DataTable({
				 	"ajax": {
			            "url": "<?php echo base_url('master/getJsonSeragam')?>",
			            "type": "POST"
			        }
				 });

			});

			//INSERT
			$('.btnTambah_u').click(function(){

		        // ajax get data 
		        $.ajax({
		            url : "<?php echo base_url('master/getSeragam')?>",
		            type: "GET",
		            success: function(data)
		            {
		               //alert(data);
		               $('#nama_ser').html(data);
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                alert('Error Data');
		            }
		        });
				
			});
			// end insert

			//UPDATE stok
			function Update_sera(id){
				//alert(id);
				$('#update_s').modal('show');
				$.ajax({
					url : "<?php echo base_url('master/getStok/')?>/"+ id,
		            type: "POST",
			        dataType: "JSON",
			        success: function(data)
		            {
		               //alert(data);
		               $('#up_id').val(data.Id_detailseragam);
		               $('#up_nama').val(data.Nama_seragam);
		               $('#up_uk').val(data.ukuran);
		               $('#up_Stok').val(data.stok);
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
		                alert('Error Data');
		            }
				});

			}
			//end update

			function Delete_sera(id){
				if(confirm('Apakah anda yakin ingin menghapus?'))
				    {
				    	 $.ajax({
				            url :  "<?php echo base_url('master/delSeragam')?>/"+ id,
				            type: "POST",
				            dataType: "JSON",
				            success: function(data)
				            {	
				                reload_table();
				            },
				            error: function (jqXHR, textStatus, errorThrown)
				            {
				                alert('Error deleting data');
				            }
				        });
				    }
			}

	        function isNumber(evt) {
	            evt = (evt) ? evt : window.event;
	            var charCode = (evt.which) ? evt.which : evt.keyCode;
	            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	                return false;
	            }
	            return true;
	        }

	        function reload_table(){
               myTab.ajax.reload(null,false);
	        }
		</script>

</div>
<!-- /#page-wrapper -->