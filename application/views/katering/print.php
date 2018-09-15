<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        	<h3 class="page-header">Print Data Katering</h3>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label style="margin-top: 5px;">Untuk Tanggal</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tanggal" name="tanggal">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label style="margin-top: 5px; opacity: 0;">tombol</label>
                            <input type="submit" class="btn btn-primary form-control" name="" value="Submit" id="cari">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <td>No. </td>
                                        <td>Kelas</td>
                                        <td>Nama Siswa</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tanggal').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var  table = $('#mytable').DataTable({
            ajax: {
                "url": "<?php echo base_url('katering/get_Laporan')?>/"+0,
                type: "POST"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: '<i class="fa fa-print fa-fw"> </i> Print',
                    className: 'btn btn-success',
                    title: 'Data Katering',
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
            var tgl = $('#tanggal').val();
            if(tgl==""){
                alert('Input tidak boleh kosong!')
            }else{
                var newUrl = "<?php echo base_url('katering/get_Laporan')?>/"+tgl;
                table.ajax.url( newUrl ).load();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
