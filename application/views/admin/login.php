<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login Page - Admin</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <!--ace styles-->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ace-skins.min.css" />

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!--inline styles related to this page-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

    <body class="login-layout">
        <div class="main-container container-fluid">
            <div class="main-content">
                <div class="space"></div>
                <div class="space"></div>
                <div class="space"></div>
                <div class="space"></div>
                <div class="space"></div><div class="space"></div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="login-container">
                            <div class="row-fluid">
                                <div class="center">
                                    <h1>
                                        <i class="icon-leaf green"></i>
                                        <span class="red">CI</span>
                                        <span class="white">Admin</span>
                                    </h1>
                                </div>
                            </div>

                            <div class="space-6"></div>

                            <div class="row-fluid">
                                <div class="position-relative">
                                    <div id="login-box" class="login-box visible widget-box no-border">
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <?php
                                                    if($this->session->flashdata('item')) {
                                                    $message = $this->session->flashdata('item');
                                                ?>

                                                <div class="alert alert-block alert-<?php echo $message['message_type'] ?>">
                                                        <button data-dismiss="alert" class="close" type="button">
                                                            <i class="icon-remove"></i>
                                                        </button>
                                                        <?php if($message['message_type'] == 'success'){ ?>
                                                        <i class="icon-ok green"></i>
                                                        <?php }else{ ?>
                                                        <i class="icon-remove red"></i>
                                                        <?php } ?>
                                                        <span id="message"><?php echo $message['message'] ?></span>
                                                    </div>
                                                <?php } ?>
                                                <h4 class="header blue lighter bigger">
                                                    <i class="icon-coffee green"></i>
                                                    Please Enter Admin Information
                                                </h4>

                                                <div class="space-6"></div>

                                                <?= form_open('admin/home/do_login',array('id'=>'login','name'=>'login')); ?>
                                                <fieldset>
                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <?php echo form_input(array('class'=>'span12','placeholder'=>'Username','name'=>'username','id'=>'username','value'=>set_value('username'))); ?>
                                                            <i class="icon-user"></i>
                                                        </span>
                                                    </label>

                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <?php echo form_password(array('class'=>'span12','placeholder'=>'Password','name'=>'password','id'=>'password','value'=>set_value('password'))); ?>
                                                            <i class="icon-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            <?php echo form_checkbox(array('name'=>'remember','id'=>'remember')); ?>
                                                            <span class="lbl"> Remember Me</span>
                                                        </label>
                                                        
                                                        <?php echo form_button(array('type'=> 'submit','value'=>'true','name'=>'login','id'=>'admin_login','class'=>'width-35 pull-right btn btn-small btn-primary','content' => '<i class="icon-key"></i>Login')); ?>
                                                        
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                                </form>

                                                
                                            </div><!--/widget-main-->

                                            <div class="toolbar clearfix">
                                                <div></div>
                                                <div>
                                                    <a href="#" onclick="show_box('forgot-box');
                                                            return false;" class="user-signup-link">
                                                        I forgot my password
                                                        <i class="icon-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!--/widget-body-->
                                    </div><!--/login-box-->

                                    <div id="forgot-box" class="forgot-box widget-box no-border">
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h4 class="header red lighter bigger">
                                                    <i class="icon-key"></i>
                                                    Retrieve Password
                                                </h4>

                                                <div class="space-6"></div>
                                                <p>
                                                    Enter your email and to receive instructions
                                                </p>

                                                <form />
                                                <fieldset>
                                                    <label>
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="span12" placeholder="Email" />
                                                            <i class="icon-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button onclick="return false;" class="width-35 pull-right btn btn-small btn-danger">
                                                            <i class="icon-lightbulb"></i>
                                                            Send Me!
                                                        </button>
                                                    </div>
                                                </fieldset>
                                                </form>
                                            </div><!--/widget-main-->

                                            <div class="toolbar center">
                                                <a href="#" onclick="show_box('login-box');
                                                        return false;" class="back-to-login-link">
                                                    Back to login
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div><!--/widget-body-->
                                    </div><!--/forgot-box-->
                                </div><!--/position-relative-->
                            </div>
                        </div>
                    </div><!--/.span-->
                </div><!--/.row-fluid-->
            </div>
        </div><!--/.main-container-->

        <!--basic scripts-->

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

        <!--ace scripts-->

        <script src="<?php echo base_url(); ?>assets/admin/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/ace.min.js"></script>

        <!--inline scripts related to this page-->

        <script type="text/javascript">
            function show_box(id) {
                $('.widget-box.visible').removeClass('visible');
                $('#' + id).addClass('visible');
            }
        </script>
    </body>
</html>
