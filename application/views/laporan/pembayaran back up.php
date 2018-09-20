<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Laporan Pembayaran Global</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        
                    </div>
                </div>
                <div class="panel-body">
                    <!--<form action="<?php echo base_url('laporan/pembayaran');?>" method="POST" id="target">-->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jenis Pembayaran</label>
                                    <select id="jenis" class="form-control selectpicker" data-live-search="true" name="jenis" title="Pilih Jenis Pembayaran">
                                        <?php foreach ($jenis as $jenis_item) { ?>
                                            <option value="<?php echo $jenis_item['ID_HeaderJenisPembayaran']; ?>"><?php echo $jenis_item['JenisPembayaran']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <select id="tahunAjaran" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Pilih Tahun Ajaran">
                                        <?php foreach ($tahun_ajaran as $ta_item) { ?>
                                            <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status Lunas</label>
                                    <select id="lunas" class="form-control selectpicker" data-live-search="true" name="lunas" title="Pilih Status Lunas ">
                                            <option value="Y">Lunas</option>
                                            <option value="N">Belum Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label style="opacity: 0;">Tombol</label>
                                    <input type="submit" class="form-control btn btn-primary cariSubmit" name="Cari" value="Cari" id="cari">
                                </div>
                            </div>
                        </div>
                    <!--</form>-->
                    <?php 
                        if($laporan != null || $laporan!= ""){
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped table-bordered table-hover table-responsive" id="mytable">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Siswa</td>
                                        <?php foreach ($header as $header_item) { ?>
                                            <td><?php echo $header_item['DetailPembayaran']; ?></td>
                                        <?php } ?>
                                        <td>Diskon</td>
                                        <td>Keterangan</td>
                                        <td>Saldo</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var jenis = $('#jenis').val();
        var tahunAjaran = $('#tahunAjaran').val();
        var lunas = $('#lunas').val();

        var table = $('#mytable').DataTable({
            ajax: {
                "url": "<?php echo base_url('laporan/getPembayaran');?>",
                data:{
                    jenis: jenis,
                    tahunAjaran: tahunAjaran,
                    lunas: lunas
                },
                type: "POST"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print fa-fw"> </i> Print',
                    className: 'btn btn-success',
                    title: 'Laporan Pembayaran Global',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .prepend(
                                '<img src="<?php echo base_url('assets/images')?>/logo.png" style="position:absolute; top:20%; left:45%; width:170px; opacity:0.1" />'
                            );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }
            ]
        });

        $('#cari').click(function(){
            var jenis = $('#jenis').val();
            var tahunAjaran = $('#tahunAjaran').val();
            var lunas = $('#lunas').val();

            if(jenis=="" && tahunAjaran=="" && lunas==""){
                alert('Pilihan tidak boleh kosong!');
            }else{
                var newUrl = "<?php echo base_url('laporan/getPembayaran')?>";
                table.ajax.url( newUrl ).load();
            }
        });
    });
</script>