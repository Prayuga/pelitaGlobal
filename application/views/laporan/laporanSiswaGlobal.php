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
                                        <select class="form-control">
                                            <option>2017/2018</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="opacity: 0;">Button</label>
                                        <input type="submit" class="btn btn-primary form-control" value="Search"> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="opacity: 0;">Button</label>
                                        <button type="submit" class="btn btn-success form-control">Export to Excel</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Umur</th>
                                            <th>Diterima di Kelas</th>
                                            <th>Agama</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1658</td>
                                            <td>Trident</td>
                                            <td>Perempuan</td>
                                            <td>Jakarta, 18 Agustus 2010</td>
                                            <td>8 tahun</td>
                                            <td>A</td>
                                            <td>Hindu</td>
                                            <td>Prayuga</td>
                                            <td>Jalan Gereja No.14</td>
                                            <td class="center">08973520211</td>
                                            <td align="center">-</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
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
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        </script>