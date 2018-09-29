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
                        <div class="row" style="margin-top:5px">
                            <b>
                                <div class="col-md-4 text-right">Nomor Induk Siswa   : </div>
                                <div class="col-md-5 text-primary" id="lblnis"></div>
                            </b>
                        </div><br><br><br><br>
                        <div class="row hidden" style="margin-top:5px">
                            <b>
                                <div class="col-md-4 text-right">Nama Siswa       : </div>
                                <div class="col-md-5 text-primary" id="lblnama"></div>
                            </b>
                        </div>
                        
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
                <th>No</th>
                <th>Nama Pembayaran</th>
                <th>Harga</th>
                <th>Diskon</th>
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
             });
        $('#btSub').click(function(){
            $id = $('#jenis').val();
            $nis = $('#siswa').val();
            // ajax get data 
            $.ajax({
                url : "<?php echo base_url('keuangan/getItemPembayaran')?>/"+$id,
                type: "POST",
                success: function(data)
                {
                   //alert(data);
                   $('#lblnis').html($nis);
                   $('#nis_hidden').val($nis);
                   $('#itemnya').html(data);
                    $('#btTambah').removeClass('disabled');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error Data');
                }
            });

            $idx = $('#siswa').val();
            var newUrl = "<?php echo base_url('keuangan/getPembayaranSiswaById')?>?id="+$idx+"&jenis="+$id;
            myTab.ajax.url( newUrl ).load();
        });
        
        $('#diskon').click(function(){
            if($('#diskon').is(':checked')){
               $('#jmldiskon').removeAttr('disabled');
               $('#dis_hidden').val('Y');
            }else{
                $('#jmldiskon').prop( 'disabled', true );
               $('#dis_hidden').val('N');
            }
        });

    });
    
    function Update($id,$nama,$namaPem,$id_det){
        $('#modal_header').val($id);
        $('#modal_detail').val($id_det);
        $('#modal_nama').val($nama);
        $('#modal_pem').val($namaPem);
        $('#modal_bayar').modal('show');
        
    }

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

                <form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/addHeaderPembayaranSiswa')?>">
                      <div class="form-group col-lg-12">
                          <input type="text" id="nis_hidden" name="nis" class="hidden">
                          <input type="text" id="dis_hidden" name="diskonStat" class="hidden">
                        <label class="control-label col-sm-5" >Pilih item pembayaran:</label>
                        <div class="col-sm-7">
                          <select class="form-control" id="itemnya" name="jenis">
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-5" >Diskon :</label>
                        <div class="col-sm-7">
                            <input id="diskon" name="diskon" type="checkbox" >
                        </div>
                      </div>
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-5" >Jumlah Diskon :</label>
                        <div class="col-sm-7">
                            <input id="jmldiskon" name="jmldiskon" type="text" class="form-control" disabled>
                        </div>
                      </div>
                  <button type="submit" class="form-control btn btn-info">Submit</button>
                </form>

              </div>
            </div>

          </div>
        </div>
        <!-- end modal tambah seragam -->
        <!-- Modal Tambah seragam -->
        <div id="modal_bayar" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Konfirmasi Pembayaran</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/addDetailPembayaranSiswa')?>">
                      <div class="form-group col-lg-12">
                          <input type="text" id="modal_header" name="id_head" class="hidden">
                          <input type="text" id="modal_detail" name="id_det" class="hidden">
                      </div>
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-5" >Nama Siswa :</label>
                        <div class="col-sm-7">
                          <input type="text" id="modal_nama" name="nama" disabled="true" class="form-control">
                        </div>
                    </div>
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-5" >Pembayaran :</label>
                        <div class="col-sm-7">
                          <input type="text" id="modal_pem" name="pembayaran" disabled="true" class="form-control">
                        </div>
                      </div>
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-5" >Jumlah :</label>
                        <div class="col-sm-7">
                            <input id="modal_jml" name="jml" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group col-lg-12">
                        <label class="control-label col-sm-5" >Keterangan :</label>
                        <div class="col-sm-7">
                            <textarea id="modal_ket" name="ket" class="form-control"></textarea>
                        </div>
                      </div>
                  <button type="submit" class="form-control btn btn-info">Submit</button>
                </form>

              </div>
            </div>

          </div>
        </div>
        <!-- end modal tambah seragam -->