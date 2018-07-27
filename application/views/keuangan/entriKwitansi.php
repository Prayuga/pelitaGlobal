<div id="page-wrapper">
<!-- ini isi halamannya -->
        <div class="col-lg-12">
            <h3 class="page-header" align="center">Entri Kwitansi</h3> 
				
             <form class="form-horizontal" method="post" action="">

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="no_k">No Kwitansi :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="no_k" name="no_k" value="C-001" readonly disabled>
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="tgl">Tanggal :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tgl" placeholder="YYYY-MM-DD" name="tgl">
                    </div>
                  </div>
              </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="dari">Terima dari :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="dari" name="dari">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <label class="control-label col-sm-4" for="jml">Sejumlah (Rp) :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" onkeyup="terbilang();" id="jml" name="jml">
                    </div>
                  </div>
              </div>

                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="untuk">Untuk :</label>
                      <div class="col-sm-8">
                          <select name="untuk" class="form-control" id="untuk">
                            <option value="0">-- Choose One --</option>
                            <option value="1">Pembayaran SPP</option>
                            <option value="2">Pembayaran Native</option>
                            <option value="3">Pembayaran Les</option>
                            <option value="4">Pembayaran Mobile Jemputan</option>
                            <option value="5">Pembayaran Cathering</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="diskon">Diskon :</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="diskon" name="diskon">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="k_diskon">Ket Diskon :</label>
                      <div class="col-sm-8">
                          <textarea type="text" class="form-control" name="k_diskon" id="k_diskon" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <label class="control-label col-sm-4" for="jml_u">Jumlah Uang :</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="jml_u" name="jml_u">
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-11">
                      <label class="control-label col-sm-3" for="jml_u_t" >Jumlah Uang terbilang :</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="jml_u_t" id="jml_u_t" readonly disabled>
                      </div>
                    </div>
                </div>

              <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10" style="margin-top: 70px">
                  <button class="btn btn-primary btn-lg" onclick="cok()">Submit</button>
                </div>
              </div>

            </form>     
        </div>

        <script>
             $(document).ready(function () {
               $('#tgl').datetimepicker({
                    format: 'YYYY-MM-DD',
                    maxDate: $.now()
                });
            });
             function cok(){
              alert('Fitur ini masih dalam proses');
             }
             function terbilang(){
              var bilangan=document.getElementById("jml").value;
              var kalimat="";
              var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
              var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
              var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
              var panjang_bilangan = bilangan.length;
              
              /* pengujian panjang bilangan */
              if(panjang_bilangan > 15){
                  kalimat = "Diluar Batas";
              }else{
                  /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
                  for(i = 1; i <= panjang_bilangan; i++) {
                      angka[i] = bilangan.substr(-(i),1);
                  }
                  
                  var i = 1;
                  var j = 0;
                  
                  /* mulai proses iterasi terhadap array angka */
                  while(i <= panjang_bilangan){
                      subkalimat = "";
                      kata1 = "";
                      kata2 = "";
                      kata3 = "";
                      
                      /* untuk Ratusan */
                      if(angka[i+2] != "0"){
                          if(angka[i+2] == "1"){
                              kata1 = "Seratus";
                          }else{
                              kata1 = kata[angka[i+2]] + " Ratus";
                          }
                      }
                      
                      /* untuk Puluhan atau Belasan */
                      if(angka[i+1] != "0"){
                          if(angka[i+1] == "1"){
                              if(angka[i] == "0"){
                                  kata2 = "Sepuluh";
                              }else if(angka[i] == "1"){
                                  kata2 = "Sebelas";
                              }else{
                                  kata2 = kata[angka[i]] + " Belas";
                              }
                          }else{
                              kata2 = kata[angka[i+1]] + " Puluh";
                          }
                      }
                      
                      /* untuk Satuan */
                      if (angka[i] != "0"){
                          if (angka[i+1] != "1"){
                              kata3 = kata[angka[i]];
                          }
                      }
                      
                      /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
                      if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
                          subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
                      }
                      
                      /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
                      kalimat = subkalimat + kalimat;
                      i = i + 3;
                      j = j + 1;
                  }
                  
                  /* mengganti Satu Ribu jadi Seribu jika diperlukan */
                  if ((angka[5] == "0") && (angka[6] == "0")){
                      kalimat = kalimat.replace("Satu Ribu","Seribu");
                  }
              }
               $('#jml_u_t').val(kalimat);
             }
        </script>
</div>
<!-- /#page-wrapper -->