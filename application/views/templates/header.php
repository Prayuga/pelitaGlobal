<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Pelita Global</title>

    <!--<link rel="shortcut icon" href="../Images/icons/Kalbis.ico" />-->

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

    <!-- rupiah js -->
    <link href="<?=base_url();?>assets/dist/js/rupiah.js" rel="stylesheet">

    <!--jam js-->
    <script type="text/javascript" src="<?=base_url();?>assets/dist/js/jam.js"></script>

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
                <a class="navbar-brand" href="#">Pelita Global Mandiri</a>
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
                        <li><a href="<?php echo site_url('user/changePassword'); ?>"><i class="fa fa-gear fa-fw"></i> Change Password</a>
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
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div> 
                        </li>-->
                        <li>
                            <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <?php 
                            $sql = "SELECT a.ID_Menu, a.Menu, a.URL, a.Icon FROM msmenu as a, trauthorizemenu as b WHERE a.ID_Menu = b.ID_Menu AND b.ID_User = '".$this->session->userdata('ID_User')."' ";
                            $query = $this->db->query($sql);
                            if($query->num_rows() > 0){
                                foreach ($query->result() as $row) {
                        ?>
                        <li>
                            <a href="<?php echo $row->URL; ?>"><?php echo $row->Icon; ?> <?php echo $row->Menu; ?><span class="fa arrow"></span></a>
                            <?php 
                                $sqls = "SELECT a.ID_Submenu, a.SubMenu, a.URL FROM mssubmenu as a, trauthorizesubmenu as b WHERE a.ID_Submenu = b.ID_Submenu  AND b.ID_User = '".$this->session->userdata('ID_User')."' AND a.ID_Menu = '".$row->ID_Menu."' ";
                                $querys = $this->db->query($sqls);
                                if($querys->num_rows() > 0){
                            ?>
                                <ul class="nav nav-second-level">
                                <?php
                                        foreach ($querys->result() as $rows) {
                                ?>
                                    <li>
                                        <a href="<?php echo base_url($rows->URL); ?>"><?php echo $rows->SubMenu; ?></a>
                                    </li>
                                <?php
                                        }
                                ?>
                                </ul>
                            <?php
                                }
                            ?>
                        </li>
                        <?php 
                                }
                            }
                            if($this->session->userdata('ID_User')=='0000'){ //HANYA UNTUK ADMINISTRATOR 
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Hak Akses Pengguna <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('user/masterUser');?>">Master Pengguna</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('user/hakAkses');?>">Pengaturan Hak Akses</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        
