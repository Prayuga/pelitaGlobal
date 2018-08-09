<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Edit Data Siswa</h3> 
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-10 col-md-offset-2">
									<label class="pull-left" style="margin-right: 10px; margin-top: 5px;">Search By :</label> &nbsp;
									<input type="radio" name="option" value="NomorIndukSiswa" class="pull-left klik" style="margin-top: 5px;" id="nis"> 
									<label class="pull-left klik" style="margin-right: 10px; margin-top: 5px;" for="nis">Nomor Induk Siswa</label> &nbsp;
									<input type="radio" name="option" value="NamaSiswa" class="pull-left klik" style="margin-top: 5px;" id="nama"> 
									<label class="pull-left klik" style="margin-top: 5px;" for="nama">Nama Siswa</label> &nbsp;
									<div class="col-md-3">
										<input type="text" name="input" class="form-control" id="inputs">
									</div>
									<input type="hidden" name="jenis" id="jenis">
									<input type="submit" name="submit" value="Search" class="btn btn-primary" id="cari">
								</div>
							</div>
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div id="listSiswa"></div>
<div id="isiEdit">
<!-- Nav tabs -->
<?php if($siswa!=null){ ?>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
    	<a href="#datasiswa" aria-controls="datasiswa" role="tab" data-toggle="tab">Data Siswa</a>
    </li>
    <li role="presentation">
    	<a href="#dataortu" aria-controls="dataortu" role="tab" data-toggle="tab">Data Orang Tua</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="datasiswa">
<!-- tab content datasiswa -->
<?php 
	foreach ($siswa as $siswa_item) {
		$idsiswa = str_ireplace("/","&",$siswa_item['NomorIndukSiswa']);
		echo form_open('pendataanSiswa/updateSiswa/'.$idsiswa);
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel-body">
            <div class="row">
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-4" for="nama_s">Nama Siswa :</label>
	              <div class="col-sm-8">
	                <!-- nama_s -->
	                <input type="text" class="form-control" id="nama_s" name="nama_s" value="<?php echo $siswa_item['NamaSiswa']; ?>">
	              </div>
	            </div>
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-4" for="jk">Jenis Kelamin:</label>
	              <div class="col-sm-8">
	                <!-- jk-->
	                  <select name="jk" class="selectpicker form-control" id="jk" title="Select Gender">
	                  	<?php if($siswa_item['JenisKelamin']=="L") {?>
	                      <option value="L" selected="selected">Laki-Laki</option>
	                      <option value="P">Perempuan</option>
	                    <?php }else if($siswa_item['JenisKelamin']=="P"){ ?>
	                      <option value="L">Laki-Laki</option>
	                      <option value="P" selected="selected">Perempuan</option>
	                    <?php } ?>
	                  </select>
	              </div>
	            </div>
	        </div>
	        <div class="row">
	          <div class="form-group col-lg-6">
	            <label class="control-label col-sm-4" for="nama_p">Nama Panggilan :</label>
	            <div class="col-sm-8">
	              <!-- nama_p-->
	              <input type="text" class="form-control" id="nama_p" name="nama_p" value="<?php echo $siswa_item['NamaPanggilan']; ?>">
	            </div>
	          </div>
	          <div class="form-group col-lg-6">
	            <label class="control-label col-sm-4" for="tempat_l">Tempat Lahir :</label>
	            <div class="col-sm-8">
	              <!-- tempat_l-->
	              <input type="text" class="form-control" id="tempat_l" name="tempat_l" value="<?php echo $siswa_item['TempatLahir']; ?>">
	            </div>
	          </div>
	        </div>
	        <!--
	        <div class="row">
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-4" for="tahun_ajaran">Thn Ajaran Masuk :</label>
	              <div class="col-sm-8">
	                <!-- tahun_ajaran
	                  <select name="tahun_ajaran" class="selectpicker form-control" id="tahun_ajaran" title="Select Tahun Ajaran">
	                    <?php 
	                    	foreach ($tahun_ajaran as $ta_item) { 
	                    		if($siswa_item['TahunAjaranMasuk']==$ta_item['ID_TahunAjaran']){
	                    ?>
	                      <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>" selected="selected"><?php echo $ta_item['TahunAjaran']; ?></option>
	                    <?php }else{?>
	                      <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
	                    <?php }} ?>
	                  </select>
	              </div>
	            </div>
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-4" for="kategori">Kategori Masuk :</label>
	              <div class="col-sm-8">
	                <!-- kategori
	                  <select name="kategori" class="selectpicker form-control" id="kategori" title="Select Kategori">
	                    <?php 
	                    	foreach ($kategori as $kategori_item) { 
	                    		if($siswa_item['ID_Kategori']==$kategori_item['ID_Kategori']){
	                    ?>
	                      <option value="<?php echo $kategori_item['ID_Kategori']; ?>" selected="selected"><?php echo $kategori_item['NamaKategori']; ?></option>		
	                    <?php }else{ ?>
	                      <option value="<?php echo $kategori_item['ID_Kategori']; ?>"><?php echo $kategori_item['NamaKategori']; ?></option>
	                    <?php }} ?>
	                  </select>
	              </div>
	            </div>
	        </div>
	    	-->
	        <div class="row">
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-4" for="tgl_l">Tanggal Lahir :</label>
	              <div class="col-sm-8">
	                <!-- tgl_l-->
	                <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_l" name="tgl_l" value="<?php echo $siswa_item['TanggalLahir']; ?>">
	              </div>
	            </div>
	            <!--
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-12" style="font-weight: normal; font-size: 9pt; color: red;" id="alertss"></label>
	            </div>
	        	-->
	        </div>
	        <div class="row">
	          <div class="form-group col-lg-6">
	            <label class="control-label col-sm-4" for="anak_k">Anak ke :</label>
	            <div class="col-sm-3">
	              <!-- anak_k-->
	              <input type="number" class="form-control" id="anak_k" name="anak_k" value="<?php echo $siswa_item['AnakKe']; ?>">
	            </div>
	            <label class="control-label col-sm-2" for="dari">Dari :</label>
	            <div class="col-sm-3">
	              <!-- dari-->
	              <input type="number" class="form-control" id="dari" name="dari" value="<?php echo $siswa_item['Dari']; ?>">
	            </div>
	          </div>
	            <div class="form-group col-lg-6">
	              <label class="control-label col-sm-4" for="agama">Agama :</label>
	              <div class="col-sm-8">
	                <!-- agama-->
	                  <select name="agama" class="selectpicker form-control" id="agama" title="Select Agama">
	                    <?php 
	                    	foreach ($agama as $agama_item) { 
	                    		if($siswa_item['ID_Agama']==$agama_item['ID_Agama']){
	                    ?>
	                      <option value="<?php echo $agama_item['ID_Agama']; ?>" ><?php echo $agama_item['Agama']; ?></option>
	                    <?php }else{?>
	                      <option value="<?php echo $agama_item['ID_Agama']; ?>"><?php echo $agama_item['Agama']; ?></option>
	                    <?php }} ?>
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
	                <input type="number" class="form-control" id="kandung" name="kandung" value="<?php echo $siswa_item['JumlahSaudaraKandung']; ?>">
	              </div>
	              <br/><br>
	              <label class="control-label col-sm-3 col-sm-offset-4" for="angkat">Angkat :</label>
	              <div class="col-sm-3">
	                <!-- angkat-->
	                <input type="number" class="form-control" id="angkat" name="angkat" value="<?php echo $siswa_item['JumlahSaudaraAngkat']; ?>">
	              </div>
	              <br><br>
	              <label class="control-label col-sm-3 col-sm-offset-4" for="tiri">Tiri :</label>
	              <div class="col-sm-3">
	                <!-- tiri-->
	                <input type="number" class="form-control" id="tiri" name="tiri" value="<?php echo $siswa_item['JumlahSaudaraTiri']; ?>">
	              </div>
	            </div>
	            <div class="form-group col-lg-6">   
	              <label class="control-label col-sm-4" for="anak_k" align="left" style="font-size: 10pt;">Keadaan Jasmani</label>
	              <label class="control-label col-sm-3" for="kandung" style="font-size: 9pt;">Berat Badan :</label>
	              <div class="col-sm-3">
	                <!-- berat-->
                	<input type="number" class="form-control" id="berat" name="berat" value="<?php echo $siswa_item['BeratBadan']; ?>">
	              </div>
                  <label class="control-label col-sm-1" for="kandung">Kg</label>
	              <br/><br>
	              <label class="control-label col-sm-3 col-sm-offset-4" for="angkat" style="font-size: 9pt;">Tinggi Badan :</label>
	              <div class="col-sm-3">
	                <!-- tinggi-->
                	<input type="number" class="form-control" id="tinggi" name="tinggi" value="<?php echo $siswa_item['TinggiBadan']; ?>">
	              </div>
                  <label class="control-label col-sm-1" for="kandung">Cm</label>
	              <br><br>
	              <label class="control-label col-sm-3 col-sm-offset-4" for="tiri" style="font-size: 9pt;">Golongan Darah :</label>
	              <div class="col-sm-3">
	                <!-- golDar-->
	                  <select name="golDar" class="selectpicker form-control" id="golDar" title="Select">
	                  	<?php if($siswa_item['GolonganDarah']=="A"){ ?>
		                    <option value="A" selected="selected">A</option>
		                    <option value="AB">AB</option>
		                    <option value="O">O</option>
		                    <option value="B">B</option>
	                	<?php }else if($siswa_item['GolonganDarah']=="B"){ ?>
		                    <option value="A">A</option>
		                    <option value="AB" selected="selected">AB</option>
		                    <option value="O">O</option>
		                    <option value="B">B</option>
	                	<?php }else if($siswa_item['GolonganDarah']=="O"){ ?>
		                    <option value="A">A</option>
		                    <option value="AB">AB</option>
		                    <option value="O" selected="selected">O</option>
		                    <option value="B">B</option>
	                	<?php }else if($siswa_item['GolonganDarah']=="AB"){ ?>
		                    <option value="A">A</option>
		                    <option value="AB">AB</option>
		                    <option value="O">O</option>
		                    <option value="B" selected="selected">B</option>
	                	<?php } ?>
	                  </select>
              	   </div>
	            </div>
	          	<div class="row">
		            <div class="form-group col-lg-6">
		              <label class="control-label col-sm-4" for="pendidikan_sebelum">Pendidikan Sebelumnya :</label>
		              <div class="col-sm-8">
		                <!-- pendidikan_sebelum -->
		                <textarea type="text" class="form-control" id="pendidikan_sebelum" name="pendidikan_sebelum" rows="2"><?php echo $siswa_item['PendidikanSebelumnya']; ?></textarea>
		              </div>
		            </div>
		            <div class="form-group col-lg-6">
		              <label class="control-label col-sm-4" for="bahasa">Bahasa Sehari :</label>
		              <div class="col-sm-8">
		                <!-- bahasa-->
		                <input type="text" class="form-control" id="bahasa" name="bahasa" value="<?php echo $siswa_item['BahasaSehariHari']; ?>">
		              </div>
		            </div>
	          	</div>
		        <div class="row">
		            <div class="form-group col-lg-6">
		              <label class="control-label col-sm-4" for="riwayat">Riwayat Penyakit :</label>
		              <div class="col-sm-8">
		                <!-- riwayat-->
		                <textarea type="text" class="form-control" id="riwayat" name="riwayat" rows="2"> <?php echo $siswa_item['RiwayatPenyakit']; ?></textarea>
		              </div>
		            </div>
		            <div class="form-group col-lg-6">
		              <label class="control-label col-sm-4" for="alergi">Alergi :</label>
		              <div class="col-sm-8">
		                <!-- alergi-->
		                <textarea type="text" class="form-control" id="alergi" name="alergi" rows="2"><?php echo $siswa_item['Alergi']; ?></textarea>
		              </div>
		            </div>
		        </div>
		        <hr>
				<div class="row">
				    <div class="col-lg-12">
				    <!-- /.panel-heading -->
				        <div class="panel-body">
					        <div class="row">
					            <div class="form-group col-lg-6">
					              <label class="control-label col-sm-4" for="tinggalPada">Tinggal Pada :</label>
					              <div class="col-sm-8">
					                <!-- tinggalPada-->
					                <input type="text" class="form-control" id="tinggalPada" name="tinggalPada" value="<?php echo $siswa_item['TinggalPada']; ?>">
					              </div>
					            </div>
					            <div class="form-group col-lg-6">
					              <label class="control-label col-sm-4" for="telp">Nomor Telp :</label>
					              <div class="col-sm-8">
					                <!-- telp-->
					                <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $siswa_item['NoTelp']; ?>">
					              </div>
					            </div>
					        </div>
					        <div class="row">
					            <div class="form-group col-lg-6">
					              <label class="control-label col-sm-4" for="alamat">Alamat :</label>
					              <div class="col-sm-8">
					                <!-- alamat-->
					                <textarea type="text" class="form-control" id="alamat" name="alamat" rows="2"><?php echo $siswa_item['Alamat']; ?></textarea>
					              </div>
					            </div>
					            <div class="form-group col-lg-6">
					              <label class="control-label col-sm-4" for="jarakRumah">Jarak rumah ke sekolah :</label>
					              <div class="col-sm-3">
					                <!-- jarakRumah-->
					                <input type="number" class="form-control" id="jarakRumah" name="jarakRumah" value="<?php echo $siswa_item['JarakRumah']; ?>">
					              </div>
					              <label class="control-label col-sm-1">Km</label>
					            </div>
					        </div>
					        <div class="row">
					        	<div class="col-md-12">
					        		<input type="submit" name="submit" class="btn btn-primary form-control" value="Ubah Data">
					        	</div>
					        </div>
				        </div>  
				    </div>
				</div>
      		</div>
		</div>
	</div>
</div>
<?php 
		echo form_close();
	}
?>
<!-- /tab content datasiswa -->
    </div>
    <div role="tabpanel" class="tab-pane" id="dataortu">
<!-- tab content dataortu -->
<?php 
	foreach ($ortu as $ortu_item) {
		$idsiswa = str_ireplace("/","&",$ortu_item['ID_Siswa']);
		echo form_open('pendataanSiswa/updateOrtu/'.$idsiswa);
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel-body">
			<div class="row">
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="namaAyah">Nama Ayah :</label>
		          <div class="col-sm-8">
		            <!-- namaAyah-->
		            <input type="text" class="form-control" id="namaAyah" name="namaAyah" value="<?php echo $ortu_item['NamaAyah']; ?>">
		          </div>
		        </div>
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="namaIbu">Nama Ibu :</label>
		          <div class="col-sm-8">
		            <!-- namaIbu-->
		            <input type="text" class="form-control" id="namaIbu" name="namaIbu" value="<?php echo $ortu_item['NamaIbu']; ?>">
		          </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="tempat_lAyah">Tempat Lahir Ayah :</label>
		          <div class="col-sm-8">
		            <!-- tempat_lAyah-->
		            <input type="text" class="form-control" id="tempat_lAyah" name="tempat_lAyah" value="<?php echo $ortu_item['TempatLahirAyah']; ?>">
		          </div>
		        </div>
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="tempat_lIbu">Tempat Lahir Ibu :</label>
		          <div class="col-sm-8">
		            <!-- tempat_lIbu-->
		            <input type="text" class="form-control" id="tempat_lIbu" name="tempat_lIbu" value="<?php echo $ortu_item['TempatLahirIbu']; ?>">
		          </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="tgl_lAyah">Tanggal Lahir Ayah:</label>
		          <div class="col-sm-8">
		            <!-- tgl_lAyah-->
		            <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_2" name="tgl_lAyah" value="<?php echo $ortu_item['TanggalLahirAyah']; ?>">
		          </div>
		        </div>
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="tgl_lIbu">Tanggal Lahir Ibu:</label>
		          <div class="col-sm-8">
		            <!-- tgl_lIbu-->
		            <input type="text" class="form-control" placeholder="MM-DD-YYYY" id="tgl_3" name="tgl_lIbu" value="<?php echo $ortu_item['TanggalLahirIbu']; ?>">
		          </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="pekerjaanAyah">Pekerjaan Ayah :</label>
		          <div class="col-sm-8">
		            <!-- pekerjaanAyah-->
		            <input type="text" class="form-control" id="pekerjaanAyah" name="pekerjaanAyah" value="<?php echo $ortu_item['PekerjaanAyah']; ?>">
		          </div>
		        </div>
		        
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="pekerjaanIbu">Pekerjaan Ibu :</label>
		          <div class="col-sm-8">
		            <!-- pekerjaanIbu-->
		            <input type="text" class="form-control" id="pekerjaanIbu" name="pekerjaanIbu" value="<?php echo $ortu_item['PekerjaanIbu']; ?>">
		          </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="pendidikanAyah">Pendidikan Terakhir Ayah :</label>
		          <div class="col-sm-8">
		            <!-- pendidikanAyah-->
		              <select name="pendidikanAyah" class="selectpicker form-control" id="pendidikanAyah" title="Select Pendidikan">
		                 <option value="SD" <?php if($ortu_item['PendidikanAyah']=="SD"){echo "selected='selected'";} ?>>SD</option>
		                 <option value="SMP" <?php if($ortu_item['PendidikanAyah']=="SMP"){echo "selected='selected'";} ?>>SMP</option>
		                 <option value="SMA" <?php if($ortu_item['PendidikanAyah']=="SMA"){echo "selected='selected'";} ?>>SMA</option>
		                 <option value="D1" <?php if($ortu_item['PendidikanAyah']=="D1"){echo "selected='selected'";} ?>>D1</option>
		                 <option value="D2" <?php if($ortu_item['PendidikanAyah']=="D2"){echo "selected='selected'";} ?>>D2</option>
		                 <option value="D3" <?php if($ortu_item['PendidikanAyah']=="D3"){echo "selected='selected'";} ?>>D3</option>
		                 <option value="D4" <?php if($ortu_item['PendidikanAyah']=="D4"){echo "selected='selected'";} ?>>D4</option>
		                 <option value="S1" <?php if($ortu_item['PendidikanAyah']=="S1"){echo "selected='selected'";} ?>>S1</option>
		                 <option value="S2" <?php if($ortu_item['PendidikanAyah']=="S2"){echo "selected='selected'";} ?>>S2</option>
		                 <option value="S3" <?php if($ortu_item['PendidikanAyah']=="S3"){echo "selected='selected'";} ?>>S3</option>
		                 <option value="0" <?php if($ortu_item['PendidikanAyah']=="0"){echo "selected='selected'";} ?>>Lainnya</option>
		              </select>
		          </div>
		        </div>
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="pendidikanIbu">Pendidikan Terakhir Ibu :</label>
		          <div class="col-sm-8">
		            <!-- pendidikanIbu-->
		              <select name="pendidikanIbu" class="selectpicker form-control" id="pendidikanIbu" title="Select Pendidikan">
		                 <option value="SD" <?php if($ortu_item['PendidikanIbu']=="SD"){echo "selected='selected'";} ?>>SD</option>
		                 <option value="SMP" <?php if($ortu_item['PendidikanIbu']=="SMP"){echo "selected='selected'";} ?>>SMP</option>
		                 <option value="SMA" <?php if($ortu_item['PendidikanIbu']=="SMA"){echo "selected='selected'";} ?>>SMA</option>
		                 <option value="D1" <?php if($ortu_item['PendidikanIbu']=="D1"){echo "selected='selected'";} ?>>D1</option>
		                 <option value="D2" <?php if($ortu_item['PendidikanIbu']=="D2"){echo "selected='selected'";} ?>>D2</option>
		                 <option value="D3" <?php if($ortu_item['PendidikanIbu']=="D3"){echo "selected='selected'";} ?>>D3</option>
		                 <option value="D4" <?php if($ortu_item['PendidikanIbu']=="D4"){echo "selected='selected'";} ?>>D4</option>
		                 <option value="S1" <?php if($ortu_item['PendidikanIbu']=="S1"){echo "selected='selected'";} ?>>S1</option>
		                 <option value="S2" <?php if($ortu_item['PendidikanIbu']=="S2"){echo "selected='selected'";} ?>>S2</option>
		                 <option value="S3" <?php if($ortu_item['PendidikanIbu']=="S3"){echo "selected='selected'";} ?>>S3</option>
		                 <option value="0" <?php if($ortu_item['PendidikanIbu']=="0"){echo "selected='selected'";} ?>>Lainnya</option>
		              </select>
		          </div>
		        </div>
		    </div>
		    <div class="row">
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="alamatOrtu">Alamat :</label>
		          <div class="col-sm-8">
		            <!-- alamatOrtu-->
		            <textarea type="text" class="form-control" id="alamatOrtu" name="alamatOrtu" rows="2"><?php echo $ortu_item['Alamat']; ?></textarea>
		          </div>
		        </div>
		        <div class="form-group col-lg-6">
		          <label class="control-label col-sm-4" for="telpOrtu">Nomor Telp :</label>
		          <div class="col-sm-8">
		            <!-- telp-->
		            <input type="text" class="form-control" id="telpOrtu" name="telpOrtu" value="<?php echo $ortu_item['NoTelp']; ?>">
		          </div>  
		        </div>
		    </div>
		    <div class="row">
		    	<div class="col-md-12">
		    		<input type="submit" name="submit" class="btn btn-primary form-control" value="Ubah Data">
		    	</div>
		    </div>
		</div>
	</div>
</div>
<?php 
		echo form_close();
	} 
?>
<!-- /tab content dataortu -->
    </div>
  </div>
<?php } ?>
</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#inputs').attr("disabled", "disabled");	
			$('.klik').click(function(){
				$('#listSiswa').hide();
				$('#isiEdit').hide();
				$('#inputs').removeAttr("disabled");
					if($('#nis').is(':checked')) {
						$('#jenis').val($('#nis').val());
					}
					else if($('#nama').is(':checked')) {
						$('#jenis').val($('#nama').val());
					}
			});

			$('#cari').click(function(){
				var jenis = $('#jenis').val();
				var isi = $('#inputs').val();

				$.ajax({
                  url: "<?=base_url();?>pendataanSiswa/cariSiswa",
                  data:{
                    jenis: jenis,
                    isi: isi
                  },
                  type: "POST",
                  success:function(data){
					  $('#listSiswa').show();
                      $('#listSiswa').html(data);
                  },
                  error:function(jqXHR,textStatus, errorThrown){
                      alert('error');
                  }
	            });
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myTabs a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			});

			$('#myTabs a[href="#dataortu"]').tab('show'); // Select tab by name
			$('#myTabs a:first').tab('show'); // Select first tab
			$('#myTabs a:last').tab('show'); // Select last tab
			//$('#myTabs li:eq(2) a').tab('show'); // Select third tab (0-indexed)
		});
	</script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</div>