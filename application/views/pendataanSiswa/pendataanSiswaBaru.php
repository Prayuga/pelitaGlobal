<div id="page-wrapper">

<script type="text/javascript">
    $('.selectpicker').selectpicker({
        style: 'btn-default',
        size: 500
    });
</script>

<!-- ini isi halamannya -->
<?php echo form_open('pendataanSiswa/add_siswa');?>
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Pendataan Siswa Baru</h3> 
        <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    Data Siswa
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="nama_s">Nama Siswa :</label>
                      <div class="col-sm-8">
                        <!-- nama_s -->
                        <input type="text" class="form-control" id="nama_s" name="nama_s">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="jk">Jenis Kelamin:</label>
                      <div class="col-sm-8">
                        <!-- jk-->
                          <select name="jk" class="selectpicker form-control" id="jk" title="Select Gender">
                              <option value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                          </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="nama_p">Nama Panggilan :</label>
                    <div class="col-sm-8">
                      <!-- nama_p-->
                      <input type="text" class="form-control" id="nama_p" name="nama_p">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="tempat_l">Tempat Lahir :</label>
                    <div class="col-sm-8">
                      <!-- tempat_l-->
                      <input type="text" class="form-control" id="tempat_l" name="tempat_l">
                    </div>
                  </div>
                </div><div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tahun_ajaran">Thn Ajaran Masuk :</label>
                      <div class="col-sm-8">
                        <!-- tahun_ajaran-->
                          <select name="tahun_ajaran" class="selectpicker form-control" id="tahun_ajaran" title="Select Tahun Ajaran">
                            <?php foreach ($tahun_ajaran as $ta_item) { ?>
                              <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="kategori">Kategori Masuk :</label>
                      <div class="col-sm-8">
                        <!-- kategori-->
                          <select name="kategori" class="selectpicker form-control" id="kategori" title="Select Kategori">
                            <?php foreach ($kategori as $kategori_item) { ?>
                              <option value="<?php echo $kategori_item['ID_Kategori']; ?>"><?php echo $kategori_item['NamaKategori']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tgl_l">Tanggal Lahir :</label>
                      <div class="col-sm-8">
                        <!-- tgl_l-->
                        <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_l" name="tgl_l">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-12" style="font-weight: normal; font-size: 9pt; color: red;" id="alertss"></label>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="anak_k">Anak ke :</label>
                    <div class="col-sm-3">
                      <!-- anak_k-->
                      <input type="number" class="form-control" id="anak_k" name="anak_k">
                    </div>
                    <label class="control-label col-sm-2" for="dari">Dari :</label>
                    <div class="col-sm-3">
                      <!-- dari-->
                      <input type="number" class="form-control" id="dari" name="dari">
                    </div>
                  </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="agama">Agama :</label>
                      <div class="col-sm-8">
                        <!-- agama-->
                          <select name="agama" class="selectpicker form-control" id="agama" title="Select Agama">
                            <?php foreach ($agama as $agama_item) { ?>
                              <option value="<?php echo $agama_item['ID_Agama']; ?>"><?php echo $agama_item['Agama']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                </div>
                  <div class="row">
                    <div class="form-group col-lg-6">   
                      <label class="control-label col-sm-4" for="anak_k" align="left">Jumlah Saudara</label>
                      <label class="control-label col-sm-3" for="kandung">Kandung :</label>
                      <div class="col-sm-3">
                        <!-- kandung-->
                        <input type="number" class="form-control" id="kandung" name="kandung">
                      </div>
                      <br/><br>
                      <label class="control-label col-sm-3 col-sm-offset-4" for="angkat">Angkat :</label>
                      <div class="col-sm-3">
                        <!-- angkat-->
                        <input type="number" class="form-control" id="angkat" name="angkat">
                      </div>
                      <br><br>
                      <label class="control-label col-sm-3 col-sm-offset-4" for="tiri">Tiri :</label>
                      <div class="col-sm-3">
                        <!-- tiri-->
                        <input type="number" class="form-control" id="tiri" name="tiri">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">   
                      <label class="control-label col-sm-4" align="left">Keadaan Jasmani</label>
                      <label class="control-label col-sm-4" for="berat">Berat Badan :</label>
                      <div class="col-sm-3">
                        <!-- berat-->
                        <input type="number" class="form-control" id="berat" name="berat">
                      </div>
                      <label class="control-label col-sm-1" for="kandung">Kg</label>
                      <br/><br>
                      <label class="control-label col-sm-4 col-sm-offset-4" for="tinggi">Tinggi Badan :</label>
                      <div class="col-sm-3">
                        <!-- tinggi-->
                        <input type="number" class="form-control" id="tinggi" name="tinggi">
                      </div>
                      <label class="control-label col-sm-1" for="kandung">Kg</label>
                      <br><br>
                      <label class="control-label col-sm-4 col-sm-offset-4" for="golDar">Golongan Darah :</label>
                      <div class="col-sm-3">
                        <!-- golDar-->
                          <select name="golDar" class="selectpicker form-control" id="golDar" title="Select">
                            <option value="A">A</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                            <option value="B">B</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="pendidikan_sebelum">Pendidikan Sebelumnya :</label>
                      <div class="col-sm-8">
                        <!-- pendidikan_sebelum -->
                        <textarea type="text" class="form-control" id="pendidikan_sebelum" name="pendidikan_sebelum" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="bahasa">Bahasa Sehari :</label>
                      <div class="col-sm-8">
                        <!-- bahasa-->
                        <input type="text" class="form-control" id="bahasa" name="bahasa">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="riwayat">Riwayat Penyakit :</label>
                      <div class="col-sm-8">
                        <!-- riwayat-->
                        <textarea type="text" class="form-control" id="riwayat" name="riwayat" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="alergi">Alergi :</label>
                      <div class="col-sm-8">
                        <!-- alergi-->
                        <textarea type="text" class="form-control" id="alergi" name="alergi" rows="2"></textarea>
                      </div>
                    </div>
                  </div>
              </div>    
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    Keterangan Tempat Tinggal
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tinggalPada">Tinggal Pada :</label>
                      <div class="col-sm-8">
                        <!-- tinggalPada-->
                        <input type="text" class="form-control" id="tinggalPada" name="tinggalPada">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="telp">Nomor Telp :</label>
                      <div class="col-sm-8">
                        <!-- telp-->
                        <input type="text" class="form-control" id="telp" name="telp">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="alamat">Alamat :</label>
                      <div class="col-sm-8">
                        <!-- alamat-->
                        <textarea type="text" class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="jarakRumah">Jarak rumah ke sekolah :</label>
                      <div class="col-sm-3">
                        <!-- jarakRumah-->
                        <input type="number" class="form-control" id="jarakRumah" name="jarakRumah">
                      </div>
                      <label class="control-label col-sm-1">Km</label>
                    </div>
                </div>
              </form> 
              </div>    
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                    Keterangan Orang Tua / Wali
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <form class="form-horizontal" method="post" action="">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="namaAyah">Nama Ayah :</label>
                      <div class="col-sm-8">
                        <!-- namaAyah-->
                        <input type="text" class="form-control" id="namaAyah" name="namaAyah">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="namaIbu">Nama Ibu :</label>
                      <div class="col-sm-8">
                        <!-- namaIbu-->
                        <input type="text" class="form-control" id="namaIbu" name="namaIbu">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tempat_lAyah">Tempat Lahir Ayah :</label>
                      <div class="col-sm-8">
                        <!-- tempat_lAyah-->
                        <input type="text" class="form-control" id="tempat_lAyah" name="tempat_lAyah">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tempat_lIbu">Tempat Lahir Ibu :</label>
                      <div class="col-sm-8">
                        <!-- tempat_lIbu-->
                        <input type="text" class="form-control" id="tempat_lIbu" name="tempat_lIbu">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tgl_lAyah">Tanggal Lahir Ayah:</label>
                      <div class="col-sm-8">
                        <!-- tgl_lAyah-->
                        <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_lAyah" name="tgl_lAyah">
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="tgl_lIbu">Tanggal Lahir Ibu:</label>
                      <div class="col-sm-8">
                        <!-- tgl_lIbu-->
                        <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_lIbu" name="tgl_lIbu">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="pekerjaanAyah">Pekerjaan Ayah :</label>
                      <div class="col-sm-8">
                        <!-- pekerjaanAyah-->
                        <input type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah">
                      </div>
                    </div>
                    
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="pekerjaanIbu">Pekerjaan Ibu :</label>
                      <div class="col-sm-8">
                        <!-- pekerjaanIbu-->
                        <input type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="pendidikanAyah">Pendidikan Terakhir Ayah :</label>
                      <div class="col-sm-8">
                        <!-- pendidikanAyah-->
                          <select name="pendidikanAyah" class="selectpicker form-control" id="pendidikanAyah" title="Select Pendidikan">
                                 <option value="SD">SD</option>
                                 <option value="SMP">SMP</option>
                                 <option value="SMA">SMA</option>
                                 <option value="D1">D1</option>
                                 <option value="D2">D2</option>
                                 <option value="D3">D3</option>
                                 <option value="D4">D4</option>
                                 <option value="S1">S1</option>
                                 <option value="S2">S2</option>
                                 <option value="S3">S3</option>
                                 <option value="0">Lainnya</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="pendidikanIbu">Pendidikan Terakhir Ibu :</label>
                      <div class="col-sm-8">
                        <!-- pendidikanIbu-->
                          <select name="pendidikanIbu" class="selectpicker form-control" id="pendidikanIbu" title="Select Pendidikan">
                                 <option value="SD">SD</option>
                                 <option value="SMP">SMP</option>
                                 <option value="SMA">SMA</option>
                                 <option value="D1">D1</option>
                                 <option value="D2">D2</option>
                                 <option value="D3">D3</option>
                                 <option value="D4">D4</option>
                                 <option value="S1">S1</option>
                                 <option value="S2">S2</option>
                                 <option value="S3">S3</option>
                                 <option value="0">Lainnya</option>
                          </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="alamatOrtu">Alamat :</label>
                      <div class="col-sm-8">
                        <!-- alamatOrtu-->
                        <textarea type="text" class="form-control" id="alamatOrtu" name="alamatOrtu" rows="2"></textarea>
                      </div>
                    </div>
                </div>
              </form> 
              </div> 
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button  class="btn btn-primary pull-right btn-lg" style="margin-bottom: 10px;" onclick="cok()">Submit</button>
                    </div>
                  </div>  
                </div>
              </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
<?php echo form_close(); ?>

    <script>
         $(document).ready(function () {
           $('#tgl_l').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            }); 
           $('#tgl_2').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            });
           $('#tgl_3').datetimepicker({
                format: 'YYYY-MM-DD',
                maxDate: $.now()
            });
        });

           function cok(){
            alert('Fitur ini masih dalam proses');
           }
    </script>
    <script>
        $('#tgl_l').blur(function(){
            var tgl = $('#tgl_l').val();
            var kategori = $('#kategori').val();
            if(tgl=="" || kategori==""){
              alert("Tanggal lahir dan Umur tidak boleh kosong");
            }else{
              $.ajax({
                  url: "<?=base_url();?>pendataanSiswa/get_umur",
                  //data: $("#a").serialize(),
                  data:{
                    tgl: tgl,
                    kategori:kategori
                  },
                  type: "POST",
                  success:function(data){
                      $('#alertss').html(data);
                  },
                  error:function(jqXHR,textStatus, errorThrown){
                      alert('error');
                  }
              });
            }
        });
    </script>
</div>
<!-- /#page-wrapper -->