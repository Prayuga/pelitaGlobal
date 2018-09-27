<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Laporan Pembayaran Per-kelas</h1>
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
                    <?php echo form_open('laporan/pembayaranKelas'); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="jenis" title="Pilih Jenis Pembayaran">
                                    <?php foreach ($jenis as $jenis_item) { ?>
                                        <option value="<?php echo $jenis_item['ID_HeaderJenisPembayaran']; ?>"><?php echo $jenis_item['JenisPembayaran']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Pilih Tahun Ajaran">
                                    <?php foreach ($tahun_ajaran as $ta_item) { ?>
                                        <option value="<?php echo $ta_item['ID_TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kategori Kelas</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="kategori" title="Pilih Tahun Ajaran">
                                    <?php foreach ($kategori as $kategori_item) { ?>
                                        <option value="<?php echo $kategori_item['ID_Kategori']; ?>"><?php echo $kategori_item['NamaKategori']; ?></option>
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
                                <!--<label style="opacity: 0;">Tombol</label>-->
                                <input type="submit" class="form-control btn btn-primary cariSubmit" name="Cari" value="Cari">
                            </div>
                        </div>
                    </div>
                    <?php 
                        echo form_close(); 
                        if($laporan != null || $laporan!= ""){
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            <a class="btn btn-success form-control" target="_blank" href="<?=base_url()?>laporan/printPembayaranKelas/<?=$this->input->post('jenis')?>/<?=$this->input->post('tahunAjaran')?>/<?=$this->input->post('lunas')?>/<?=$this->input->post('kategori')?>"><i class="fa fa-print fa-fw"> </i> Print</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nama Siswa</td>
                                        <?php foreach ($header as $header_item) { ?>
                                            <td><?php echo $header_item['DetailPembayaran']; ?></td>
                                        <?php } ?>
                                        <td>Diskon</td>
                                        <td>Saldo</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count=1; 
                                        foreach ($laporan as $laporan_item) { 
                                            if($laporan_item['NomorIndukSiswa']=='TOTAL'){
                                                $siswa = "Total";
                                            }else{
                                                $siswa = $laporan_item['NamaSiswa']." (".$laporan_item['NomorIndukSiswa'].")";
                                            }
                                    ?>
                                    <tr>
                                        <td><?=$count?></td>
                                        <td><?=$siswa?></td>
                                        <?php foreach ($header as $header_item) { ?>
                                            <td><?php echo $laporan_item[$header_item['ID_DetailJenisPembayaran']]; ?></td>
                                        <?php } ?>
                                        <td><?=$laporan_item['diskon']?></td>
                                        <td><?=$laporan_item['saldo']?></td>
                                    </tr>
                                    <?php
                                            $count++;
                                        } 
                                    ?>
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