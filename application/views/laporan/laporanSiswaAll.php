<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Siswa Perkelas</h1>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tahun Ajaran</label>
                                        <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Select Tahun Ajaran">
                                            <?php foreach ($tahun_ajaran as $ta_item) { ?>
                                                <option value="<?php echo $ta_item['TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select id="sel_kat" class="form-control selectpicker" data-live-search="true" name="kategori" title="Select Kategori">
                                            <?php foreach ($kategori as $kategori_item) { ?>
                                                <option value="<?php echo $kategori_item['ID_Kategori']; ?>"><?php echo $kategori_item['NamaKategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select id="sel_kls" class="form-control selectpicker" data-live-search="true" name="kelas" title="Select Kelas">
                                            <?php foreach ($kelas as $kelas_item) { ?>
                                            <option value="<?php echo $kelas_item['ID_Kelas']; ?>"><?php echo $kelas_item['NamaKelas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button class="btn btn-primary form-control">
                                            <i class="fa fa-print fa-fw"></i> Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12" style="overflow-x: scroll;">
                                    <table width="1450px" class="table table-striped table-bordered table-hover table-responsive" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="20px">NIS</th>
                                                <th width="100px">Nama Siswa</th>
                                                <th width="40px">Gender</th>
                                                <th width="100px">Tempat Lahir</th>
                                                <th width="100px">Tanggal Lahir</th>
                                                <th width="40px">Umur</th>
                                                <th width="150px">Diterima di Kelas</th>
                                                <th width="100px">Agama</th>
                                                <th width="200px">Nama Ayah</th>
                                                <th width="200px">Nama Ibu</th>
                                                <th width="200px">Alamat</th>
                                                <th width="200px">Nomor Telepon</th>
                                                <!--<th width="200px">Keterangan</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
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

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Informasi</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row" align="center">
                        <table>
                            <tr>
                                <td class="col-md-4">Tanggal Lahir</td>
                                <td class="col-md-2">:</td>
                                <td class="col-md-6">18 Agustus 2010</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Agama</td>
                                <td class="col-md-2">:</td>
                                <td class="col-md-6">Hindu</td>
                            </tr>
                            <tr>
                                <td class="col-md-4">Keadaan Jasmani</td>
                                <td class="col-md-2">:</td>
                                <td class="col-md-6">Sehat</td>
                            </tr>
                        </table>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        <!-- /#page-wrapper -->
        <script>
        $(document).ready(function() {
            var table = $('#mytable').DataTable({
                "ajax": {
                    "url": "<?php echo base_url('laporan/getJsonSiswa')?>",
                    "type": "POST"
                }
            });
            
            $('#sel_thn').change(function (){
                var thn = $('#sel_thn').val();
                var newUrl = "<?php echo base_url('laporan/getSiswaByTahun')?>";
                newUrl += "/"+thn;
                table.ajax.url( newUrl ).load();
            });
            
            $('#sel_kat').change(function (){
                var kat = $('#sel_kat').val();
                var newUrl = "<?php echo base_url('laporan/getSiswaByKat')?>";
                newUrl += "/"+kat;
                table.ajax.url( newUrl ).load();
            });
            
            $('#sel_kls').change(function (){
                var kls = $('#sel_kls').val();
                var newUrl = "<?php echo base_url('laporan/getSiswaByKls')?>";
                newUrl += "/"+kls;
                table.ajax.url( newUrl ).load();
            });
            
        });
        </script>