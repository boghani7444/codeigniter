<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="<?= base_url('admin/dashboard'); ?>">Home</a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Gallery</li>
        </ul><!--.breadcrumb-->
        <ul class="nav pull-right">
            <li class="dropdown" style="color: #000;padding: 10px;font-size: 12px;">
                <span id="date_time"></span>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </li>
        </ul>
    </div>

    <div class="page-content">
        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->
                <div class="row-fluid">
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
                    <div class="table-header">
                        Gallery Record
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <!--PAGE CONTENT BEGINS-->
                            <div class="row-fluid">
                                <div class="header">
                                    Home Slider
                                </div>
                                <ul class="ace-thumbnails">
                                    <?php foreach($gallery_home_slider as $gallery_home_slider_row){ ?>
                                    <li>
                                        <a href="<?= base_url('upload/logo/'.$gallery_home_slider_row->image); ?>" data-rel="colorbox">
                                            <img style="width: 150px;height: 150px;" alt="150x150" src="<?= base_url('upload/home-slider/'.$gallery_home_slider_row->image); ?>" />
                                            <div class="text"><div class="inner"><?= $gallery_home_slider_row->title; ?></div></div>
                                        </a>
                                        <div class="tools tools-bottom">
                                            <?php if($gallery_home_slider_row->status == 'Y'){ ?>
                                                <a onclick="return confirm(' Are you sure want to Inactive Image ?')" href="<?= base_url('admin/gallery/status_gallery').'/'.$gallery_home_slider_row->id ?>"><i class="icon-ok green"></i></a>
                                            <?php }else{ ?>
                                                <a onclick="return confirm(' Are you sure want to Active Image ?')" href="<?= base_url('admin/gallery/status_gallery').'/'.$gallery_home_slider_row->id ?>"><i class="icon-remove red"></i></a>
                                            <?php } ?>
                                            <a href="<?= base_url('admin/gallery/edit_gallery').'/'.$gallery_home_slider_row->id; ?>"><i class="icon-pencil"></i></a>
                                            <a onclick="return confirm(' Are you sure want to Delete Image ?')" href="<?= base_url('admin/gallery/delete_gallery').'/'.$gallery_home_slider_row->id; ?>"><i class="icon-trash red"></i></a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="row-fluid">
                                <div class="header">
                                    Portfolio
                                </div>
                                <ul class="ace-thumbnails">
                                    <?php foreach($gallery_portfolio as $gallery_portfolio_row){ ?>
                                    <li>
                                        <a href="<?= base_url('upload/logo/'.$gallery_portfolio_row->image); ?>" data-rel="colorbox">
                                            <img style="width: 150px;height: 150px;" alt="150x150" src="<?= base_url('upload/portfolio/'.$gallery_portfolio_row->image); ?>" />
                                            <div class="text"><div class="inner"><?= $gallery_portfolio_row->title; ?></div></div>
                                        </a>
                                        <div class="tools tools-bottom">
                                            <?php if($gallery_portfolio_row->status == 'Y'){ ?>
                                                <a href="<?= base_url('admin/gallery/status_gallery').'/'.$gallery_portfolio_row->id ?>"><i class="icon-ok green"></i></a>
                                            <?php }else{ ?>
                                                <a href="<?= base_url('admin/gallery/status_gallery').'/'.$gallery_portfolio_row->id ?>"><i class="icon-remove red"></i></a>
                                            <?php } ?>
                                            <a href="<?= base_url('admin/gallery/edit_gallery').'/'.$gallery_portfolio_row->id; ?>"><i class="icon-pencil"></i></a>
                                            <a href="<?= base_url('admin/gallery/delete_gallery').'/'.$gallery_portfolio_row->id; ?>"><i class="icon-trash red"></i></a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
</div><!--/.main-content-->