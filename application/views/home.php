<div id="page-wrapper">

<!-- ini isi halamannya -->
    <div class="row">
        <div class="col-lg-12 page-header">
            <h2 class="" style="text-align:center; font-weight: bold;">Welcome <?php echo $this->session->userdata('NamaUser'); ?></h2> 
            <br>

            <div id="item">
             <div class="clock">
              <div id="Date" class="row" style="font-size: 13pt;text-align:center; font-weight: bold;"></div>
              <div class="row">
                <br>
                  <table align="center" id="jam" style="font-size: 13pt;text-align:center; font-weight: bold;">
                   <tr>
                    <td id="jamnya"></td>
                    <td id="point">:</td>
                    <td id="menitnya"></td>
                    <td id="point">:</td>
                    <td id="detiknya"></td>
                   </tr>
                  </table><!-- /#jam -->
              </div>
             </div><!-- /#clock -->
            </div><!-- /#item -->

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar siswa yang <b>berulang tahun</b> hari ini :<!-- 10 Siswa <i class='fa fa-user fa-fw'></i>-->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                        if($ultah==null) {
                    ?>
                        <center>Tidak ada siswa yang berulang tahun hari ini.</center>
                    <?php
                        }else{
                            foreach ($ultah as $ultah_item) {
                                $nis = str_ireplace("/","&",$ultah_item['NomorIndukSiswa']); 
                    ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <b><?php echo $ultah_item['NamaSiswa']." | ".$ultah_item['TanggalLahir']." | Kelas ".$ultah_item['NamaKelas']." (".$ultah_item['SingkatanKategori'].")"; ?> |</b> &nbsp;  <a href="<?=base_url();?>pendataanSiswa/editSiswa/<?php echo $nis; ?>" class="btn btn-success" style="font-style: none; text-align: right;" data-toggle='tooltip' data-placement='bottom' title='Lihat Data Siswa'><i class="fa fa-clipboard fa-fw"></i></a>
                        </div>
                    <?php 
                            }
                        } 
                    ?>                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar siswa yang <b>belum menyerahkan surat pernyataan</b> :
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php
                        if($surat==null) {
                    ?>
                        <center>Tidak ada siswa yang belum menyerahkan surat pernyataan.</center>
                    <?php
                        }else{
                            foreach ($surat as $surat_item) {
                                $nis = str_ireplace("/","&",$surat_item['NomorIndukSiswa']); 
                    ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <b><?php echo $surat_item['NamaSiswa']." | ".$surat_item['NomorIndukSiswa']; ?> |</b> &nbsp;  <a href="<?=base_url();?>pendataanSiswa/editSiswa/<?php echo $nis; ?>" class="btn btn-success" style="font-style: none; text-align: right;" data-toggle='tooltip' data-placement='bottom' title='Lihat Data Siswa'><i class="fa fa-clipboard fa-fw"></i></a>
                        </div>
                    <?php 
                            }
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->