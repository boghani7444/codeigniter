<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Tables - Ace Admin</title>

        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->

        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <!--ace styles-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace-ie.min.css" />
        <![endif]-->
        <!--[if !IE]>-->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/admin/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
        window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo base_url(); ?>assets/admin/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
        <!--page specific plugin scripts-->

        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.bootstrap.js"></script>

        <!--ace scripts-->
        <script src="<?php echo base_url(); ?>assets/admin/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/ace.min.js"></script>

        
        <!--inline scripts related to this page-->
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.min.js"></script>


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/ckfinder/ckfinder.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/date_time.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body class="navbar-fixed skin-2">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="<?php echo base_url('admin'); ?>" class="brand">
                        <small>
                            <i class="icon-leaf"></i>
                            Ci Demo
                        </small>
                    </a><!--/.brand-->

                    <ul class="nav ace-nav pull-right">
                        <li class="light-blue" style="background: #C6487E;">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo base_url(); ?>assets/admin/avatars/user.png" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->session->userdata('username'); ?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                                <li>
                                    <a href="<?php echo base_url(); ?>admin/settings">
                                        <i class="icon-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <!--                                <li>
                                                                    <a href="<?php // echo base_url();  ?>admin/profile">
                                                                        <i class="icon-user"></i>
                                                                        Profile
                                                                    </a>
                                                                </li>-->

                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo base_url(); ?>admin/home/logout">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!--/.ace-nav-->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>

        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>