<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pendataan Kelas</h1>
        </div>
    </div>
    <!-- notif crud-->
    <div class="msg alert ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <center>
                <div id="notif"></div>
            </center>
    </div>
    <!-- end notif-->
    
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row" style="margin:1% 0">
                <div class="col-lg-4">
                    <select id="sel_thn" class="selectpicker form-group" title="Pilih Tahun Ajaran">
                        <?php foreach ($tahun as $tahun_item) { ?>
                            <option value="<?php echo $tahun_item['TahunAjaran']; ?>"><?php echo $tahun_item['TahunAjaran']; ?></option>
                          <?php } ?>
                    </select>
                </div>    
                <div class="col-lg-4">
                    <select id="sel_kat" class="selectpicker form-group" title="Pilih Kategori Kelas">
                        <?php foreach ($kategori as $kategori_item) { ?>
                            <option value="<?php echo $kategori_item['ID_Kategori']; ?>"><?php echo $kategori_item['NamaKategori']; ?></option>
                          <?php } ?>
                    </select>
                </div>    
                <div class="col-lg-4">
                    <select id="sel_kls" class=" form-group">
                        <option class="form-control" value="">-- Pilih Kelas --</option>
                    </select>
                    <img id="loading" src="<?=base_url();?>assets/images/load.gif" width="30">
                </div>    
            </div> 
        </div>
        <div class="panel-body">
            
            <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                </tbody>        	
            </table>
            
            <center>
             <button id="btsub" class="btn btn-lg btn-primary" style="width:180px">Submit</button>
            </center>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
<script>
    $(document).ready(function (){
        $('.msg').hide();
        $('#loading').hide();
        var table = $('#mytable').DataTable({
            "ajax": {
                "url": "<?php echo base_url('pendataanSiswa/getJsonKelas')?>",
                "type": "POST"
            }
        });
                   
        
        $('#sel_kat').change(function (){
            var thn = $('#sel_thn').val();
            var kat = $('#sel_kat').val();
            $.ajax({
                url : "<?php echo base_url('pendataanSiswa/getKelas')?>",
                type: "POST",
                data: {
                    thn : thn,
                    kat : kat
                },
                datatype: 'json',
                beforeSend: function() {
                    $('#loading').show();
                },
                success: function(data)
                {
                   //alert(data);
                   $('#sel_kls').html(data);
                   $('#loading').hide();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error Data');
                }
            });
        });
                    
        $('#btsub').click(function (){
            var id = $('#sel_kls').val();
            var array = [];
            var x = table.rows().count();
            for(i=1;i<=x;i++){
                var chx = $('#cx-'+i).is(':checked');
                if(chx == true){
                    var chxval = $('#cx-'+i).val();
                    array.push(chxval);
                }
            }
            $.ajax({
                url : "<?php echo base_url('pendataanSiswa/updateKelas')?>",
                type: "POST",
                data: {
                    array: array,
                    id : id
                },
                datatype : 'json',
                befoforeSend: function(){
                    $('#loading').show();
                },
                success: function(data)
                    {
                       //alert(data);
                       table.ajax.reload();
                       $('.msg').show();
                       $('.msg').addClass('alert-success');
                       $('#notif').html("Berhasil Update");
                       $('#loading').hide();
                    },
                error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error Data');
                    }
            });
         });

    });
        
       function masukKelas(){
        }
    
</script>