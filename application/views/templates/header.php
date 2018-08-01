<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- jquery-->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url();?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- datepicker css-->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    <!-- bootstrap tabel css-->
    <link href="<?=base_url();?>assets/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Bootstrap select CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap-select.css" rel="stylesheet">

    <!-- select2 css-->
    <link href="<?=base_url();?>assets/vendor/select2/select2.min.css" rel="stylesheet">



    <style>
    body{
        overflow-x: hidden;
    }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php 
            $sql = 'SELECT * FROM `msmenu`';
            $query = $this->db->query($sql);
            if($query->num_rows() > 0){
                foreach ($query->result() as $row) {
                    echo $row ->Menu;
                    echo "test";
                }
            }
        ?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">  
                <li>
                    <a href="#"><i class="fa fa-bell fa-fw "></i> Ultah Siswa</a>
                    <!--fa-spin color:red-->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

           <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Pendataan Siswa<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('pendataanSiswa/baru'); ?>">Pendataan Siswa Baru</a>
                                </li>
                                <li>
                                    <a href="forms.html">Registrasi Ulang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money fa-fw"></i> Keuangan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('keuangan'); ?>">Entri Data & Cetak Kwitansi</a>
                                </li>
                                <li>
                                    <a href="#">Entri Data Kas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i> Inventory<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Update Stok Seragam</a>
                                </li>
                                <li>
                                    <a href="#">Update Stok ATK</a>
                                </li>
                                <li>
                                    <a href="#">Transaksi Seragam Siswa</a>
                                </li>
                                <li>
                                    <a href="#">Transaksi ATK</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-files-o fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('laporan/siswaglobal');?>">Data Keseluruhan Siswa</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('laporan/siswakelas');?>">Data Siswa per-kelas</a>
                                </li>
                                <li>
                                    <a href="#">Pelunasan Biaya Sekolah</a>
                                </li>
                                <li>
                                    <a href="#">Kas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('master/tahunAjaran');?>">Tahun Ajaran</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('master/kelas');?>">Kelas</a>
                                </li>
                                <li>
                                    <a href="#">Jenis Pembayaran</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('master/seragam');?>">Seragam</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('master/stationary');?>">Stationary</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        
