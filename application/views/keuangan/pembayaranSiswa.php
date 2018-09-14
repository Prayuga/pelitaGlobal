<div id="page-wrapper">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Pembayaran Siswa</h1>
		</div>
	</div>
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body row">
                    <div class="col-lg-6">
                        <label>Nomor Induk : PGM-01</label><br>
                        <label>Nama Siswa : Prayuga</label><br><br><br>
                        <button id="btTambah" class="col-sm-5 btn btn-success" data-toggle="modal" data-target="#tambah_i">Tambah Item</button>
                    </div>
                    <div class="col-lg-6">
                        <form method="post" action="#" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Siswa :</label>
                                <div class="col-sm-8">
                                    <select name="siswa" class="selectpicker form-control" data-live-search="true" id="siswa" title="Pilih Siswa" required>
                                        <?php foreach ($siswa as $siswaitem) { ?>
                                        <option value="<?php echo $siswaitem['NomorIndukSiswa'];?>"><?php echo $siswaitem['NomorIndukSiswa'];?> - <?php echo $siswaitem['NamaSiswa'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Jenis Pembayaran :</label>
                                <div class="col-sm-8">
                                    <select name="jenis" class="selectpicker form-control" data-live-search="true" id="jenis" title="Pilih jenis pembayaran" required>
                                        <?php foreach ($jenis as $jenisitem) { ?>
                                        <option value="<?php echo $jenisitem['ID_HeaderJenisPembayaran'];?>"><?php echo $jenisitem['JenisPembayaran'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                          
                        </form>
                          <button class="pull-right col-sm-8 btn btn-primary" id="btSub"> Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nama Pembayaran</th>
                <th>Harga</th>
                <th>Sisa Tagihan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>            
    </table>
</div>

<script>
    $(document).ready(function(){
        $('#btTambah').addClass('disabled');
        var myTab = $('#mytable').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('keuangan/getPembayaranSiswa')?>",
                    "type": "POST"
                }
             });
        $('#btSub').click(function(){
            $id = $('#jenis').val();
            // ajax get data 
            $.ajax({
                url : "<?php echo base_url('keuangan/getItemPembayaran')?>/"+$id,
                type: "POST",
                success: function(data)
                {
                   //alert(data);
                   $('#itemnya').html(data);
                    $('#btTambah').removeClass('disabled');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error Data');
                }
            });
            /*
            $idx = $('#siswa').val();
            var myTab = $('#mytable').DataTable({
                    "ajax": {
                        "url": "<?php echo base_url('keuangan/getPembayaranSiswaById')?>?id="+$idx,
                        "type": "POST"
                    }
                 });*/

            $idx = $('#siswa').val();
            var newUrl = "<?php echo base_url('keuangan/getPembayaranSiswaById')?>?id="+$idx;
            myTab.ajax.url( newUrl ).load();
        });
    });

</script>


        <!-- Modal Tambah seragam -->
        <div id="tambah_i" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Item Pembayaran</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="post" action="<?php echo site_url('master/addseragam')?>">
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-4" for="jk">Pilih item pembayaran:</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="itemnya" name="itemnya">
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