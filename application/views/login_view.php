<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Pelita Global</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/dist/css/style-login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="loginbox">
        <img src="<?=base_url();?>assets/images/logo.png" class="logo">
        <br><br><br>
            <h1>Login Here</h1>
            <form action="<?php echo site_url('login/ceklogin'); ?>" method="POST">
                <p>Username</p>
                <input type="text" name="userId" placeholder="Enter User ID">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" name="" value="Login">
            </form>
            <!--<center style="color: #d34141;"><?php  
                $info = $this->session->flashdata('info');
                if(!empty($info)){
                    //echo $info;
                }
            ?></center>-->
    </div>

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <!--swal-->
    <script src="<?=base_url();?>assets/js/sweetalert.min.js"></script>
    <script type="text/javascript">
        
        <?php if( $this->session->flashdata('info') != null){ ?>
            swal({
              title: "Gagal!",
              text: "<?php echo $this->session->flashdata('info'); ?>",
              icon: "error",
              button: "Ok",
            });
        <?php } ?>
    </script>

</body>

</html>
