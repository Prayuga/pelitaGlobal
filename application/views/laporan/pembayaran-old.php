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
                    <?php echo form_open('laporan/pembayaran'); ?>
                	<div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>
                                <select id="sel_thn" class="form-control selectpicker" data-live-search="true" name="tahunAjaran" title="Pilih Jenis Pembayaran">
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
                                        <option value="<?php echo $ta_item['TahunAjaran']; ?>"><?php echo $ta_item['TahunAjaran']; ?></option>
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
                                <input type="submit" class="form-control btn btn-primary cariSubmit" name="Cari" value="Cari">
                            </div>
                        </div>
                	</div>
                    <?php 
                        echo form_close(); 
                        if($laporan != null){
                            echo form_open('pendataanSiswa/trx_seragam');
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Nomor Induk Siswa</td>
                                        <?php foreach ($header as $header_item) { ?>
                                            <td><?php $header_item['DetailPembayaran']; ?></td>
                                        <?php } ?>
                                        <td>Diskon</td>
                                        <td>Saldo</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($seragam_h as $s_item) { 
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="" value="" id="cek_<?=$s_item['Id_seragam']?>"></td>
                                        <td><?php echo $s_item['Nama_seragam']; ?></td>
                                        <td>
                                            <select class="selectpicker" title="Pilih Ukuran" name="detail_s[]" id="select_<?=$s_item['Id_seragam']?>" disabled>
                                                <?php 
                                                    $sql = "SELECT ID_detailseragam, ukuran FROM `msdetailseragam` WHERE flagactive = 'Y' AND stok != 0 AND Id_seragam = '".$s_item['Id_seragam']."' ";
                                                    $query = $this->db->query($sql);
                                                    if($query->num_rows() > 0){
                                                        foreach ($query->result() as $row) {
                                                            $sqls = "SELECT ID_detailseragam FROM `trseragam` WHERE NomorIndukSiswa = '".$idsiswa."' AND ID_detailseragam = '".$row->ID_detailseragam."' ";
                                                            $querys = $this->db->query($sqls);
                                                            if($querys->num_rows() > 0){
                                                                foreach ($querys->result() as $rows) {
                                                                    if($rows->ID_detailseragam==$row->ID_detailseragam){
                                                ?>
                                                <option value="<?php echo $row->ID_detailseragam; ?>" selected><?php echo $row->ukuran; ?></option>
                                                <?php
                                                                    }
                                                                }
                                                            }
                                                ?>
                                                <option value="<?php echo $row->ID_detailseragam; ?>"><?php echo $row->ukuran; ?></option>
                                                <?php 
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-4">
                            <input type="submit" class="btn btn-primary form-control" name="" value="Submit">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>