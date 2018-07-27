<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap select CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap-select.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-size: 62.5%;
            font-family: Helvetica, sans-serif;
            background: url(<?=base_url();?>assets/images/stripe.png) repeat;
        }

        p {
            font-size: 1.3em;
            margin-bottom: 15px;
        }

        #page-wrap {
            width: 660px;
            background: white;
            padding: 20px 50px 20px 50px;
            margin: 70px auto;
            min-height: 500px;
            height: auto !important;
            height: 500px;
            border-radius: 20px;
        }

        #contact-area {
            width: 600px;
            margin-top: 25px;
        }

        #contact-area input, #contact-area textarea {
            padding: 5px;
            width: 471px;
            font-family: Helvetica, sans-serif;
            font-size: 1.4em;
            margin: 0px 0px 10px 0px;
            border: 2px solid #ccc;
        }

        #contact-area textarea {
            height: 90px;
        }

        #contact-area textarea:focus, #contact-area input:focus {
            border: 2px solid #900;
        }

        #contact-area input.submit-button {
            width: 100px;
            float: right;
        }

        label {
            float: left;
            text-align: right;
            margin-right: 15px;
            width: 100px;
            padding-top: 5px;
            font-size: 1.4em;
        }
    </style>
    <script type="text/javascript">
        $('.selectpicker').selectpicker({
            style: 'btn-default',
            size: 500
        });
    </script>

</head>

<body>

    <div id="page-wrap" style="opacity: 1; background-color: white;">
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <img src="<?=base_url();?>assets/images/logo.png" style="width: 78.5px; height:101.1px;">
            </div>
        </div>
        <br>
        <div class="row">
            <h4 style="font-weight: bold; text-align: center;"><i>Mohon Isi Form Saat Mengambil ATK</i></h4>
            <br>
        </div>
        <?php echo form_open('frontend/entry/'); ?>
        <div class="row">
            <div class="col-md-4" align="right">
                <h5 style="font-weight: bold;">Nama Anda :</h5>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="nama" required>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4" align="right">
                <h5 style="font-weight: bold;">Stationary :</h5>
            </div>
            <div class="col-md-6">
                <select class="selectpicker form-control" name="stationary" data-live-search="true" title="Choose Stationary" id="before">
                    <?php foreach ($stationary as $stationary_item) { ?>
                       <option value="<?php echo $stationary_item['ID_Stationary']; ?>">
                            <?php echo $stationary_item['NamaStationary']; ?>
                        </option> 
                    <?php } ?>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4" align="right">
                <h5 style="font-weight: bold;">Jumlah :</h5>
            </div>
            <div class="col-md-3">
                <input type="number" name="jumlah" class="form-control" id="jumlah">
            </div>
            <div class="col-md-2">
                <h5><b><?php echo $stationary_item['Satuan']; ?></b></h5>
            </div>
            <div class="col-md-2">
                <h5 style="color: #BD1515; text-align: right;">Stok :</h5>
            </div>
            <div class="col-md-1">
                <h5 style="color: #BD1515; text-align: left;" id="sebelum"> - </h5>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4" align="right">
                <h5 style="font-weight: bold;">Keterangan :</h5>
            </div>
            <div class="col-md-6">
                <textarea class="form-control" name="keterangan"></textarea>
                <input type="hidden" name="sisaStok" value="" id="sesudah">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-md-offset-8">
                <input type="submit" class="btn btn-primary alerts form-control" name="submit" value="Submit">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap-select.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript" src="<?=base_url();?>assets/js/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.alerts').click(function(){
            swal({
              title: "Success!",
              text: "Successfully updated",
              icon: "success",
              button: "return to page",
            });
        });
    </script>

    <script type="text/javascript">
        $('#before').change(function(){
            var before_id = $('#before').val();

            $.ajax({
                url: "<?=base_url();?>frontend/stok/"+before_id,
                type: "POST",
                success:function(data){
                    $('#sebelum').html(data);
                },
                error:function(jqXHR,textStatus, errorThrown){
                    alert('error');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('#jumlah').blur(function(){
            var sebelum = $('#sebelum').text();
            var jumlah = $('#jumlah').val();
            var sesudah = sebelum-jumlah;
            $('#sesudah').val(sesudah);
        });
    </script>

</body>

</html>
