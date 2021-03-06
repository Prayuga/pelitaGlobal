<div id="page-wrapper">
    
        <div class="col-lg-12">
            <h3 class="page-header">Ganti Password</h1>
        </div>
        
        <!-- notif crud
       <div class="msg alert <?php //echo $this->session->flashdata('alert');?>">
   			<center>
       			<?php //echo $this->session->flashdata('msg'); ?>
       		</center>
       	</div>
        <script>
            $(".alert-success").delay(4000).fadeOut(1000, function () { $(this).remove(); });
            $(".alert-danger").delay(4000).fadeOut(1000, function () { $(this).remove(); });
        </script>  
        <!-- end notif crud -->   
        
        <form class="form-horizontal" method="post" id="formInput" action="doChangePassword">
           <div class="form-group">
             <label class="control-label col-sm-2" for="email">Password Lama :</label>
             <div class="col-sm-6">
               <input type="password" class="form-control" id="oldPass" placeholder="Old Password" name="oldPass">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-2" for="pwd">Password Baru :</label>
             <div class="col-sm-6">
               <input type="password" class="form-control" id="newPass" placeholder="(Max : 20 Character)" name="newPass">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-2" for="pwd">Konfirmasi Password :</label>
             <div class="col-sm-6">
               <input type="password" class="form-control" id="newPass2" placeholder="(Max : 20 Character)" name="newPass">
             </div>
           </div>
         </form> 
        
            <div class="col-sm-offset-2 col-sm-10">
              <button onclick="cekPass()" type="submit" class="btn btn-primary">Submit</button>
            </div>
        
        <script>
            function cekPass(){
                var pw1 = $('#newPass').val();
                var pw2 = $('#newPass2').val();
                if(pw1==pw2){
                    $('#formInput').submit();
                }else{
                    alert('Password Baru anda tidak sama');
                    $('#newPass2').val(null).focus();
                }
            }
        </script>
        
        <!--swal-->
        <script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
        <script type="text/javascript">
           <?php if($this->session->flashdata('alert') != null){ ?>
            swal({
              title: "Berhasil!",
              text: "<?php echo $this->session->flashdata('msg'); ?>",
              icon: "<?php echo $this->session->flashdata('alert'); ?>",
              button: "Ok",
            });
           <?php } ?>
        </script>
</div>