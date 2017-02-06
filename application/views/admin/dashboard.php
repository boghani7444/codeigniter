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
            <li class="active">Dashboard</li>
        </ul><!--.breadcrumb-->
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
                </div>
                <div class="space-6"></div>
                <div class="row-fluid">
                    <div class="span12 infobox-container">
                        <div class="infobox infobox-green  ">
                            <div class="infobox-icon">
                                <i class="icon-comments"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">32</span>
                                <div class="infobox-content">comments + 2 reviews</div>
                            </div>
                        </div>
                        <div class="infobox infobox-orange2">
                            <div class="infobox-icon">
                                <i class="icon-beaker"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">32</span>
                                <div class="infobox-content">pageviews</div>
                            </div>
                        </div>
                        <div class="infobox infobox-blue2  ">
                            <div class="infobox-icon">
                                <i class="icon-globe"></i>
                            </div>
                            <div class="infobox-data">
                                <span class="infobox-data-number">32</span>
                                <div class="infobox-content">traffic used</div>
                            </div>
                        </div>
                        <div class="space-6"></div>
                    </div>
                    <div class="vspace"></div>
                </div><!--/row-->

                <div class="hr hr32 hr-dotted"></div>
            </div>
        </div>
</div>    
	<div class="profile-user-info profile-user-info-striped">
        <div class="widget-header header-color-blue">
            <h5 class="bigger lighter">
                <i class="icon-table"></i>
                Last Login History Details
            </h5>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Date </div>

            <div class="profile-info-value">
                <span class="editable" id="username"><?php echo date('d-m-Y H:i:s',strtotime($this->session->userdata('last_login_datetime'))); ?></span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Location </div>

            <div class="profile-info-value">
                <?php 
                $ip = $this->session->userdata('ipaddress');
                $details = json_decode($location = file_get_contents('http://freegeoip.net/json/'.$ip));		
                ?>
                <i class="icon-map-marker light-orange bigger-110"></i>
                <span class="editable" id="city"><?php echo $details->city; ?></span>
                <span class="editable" id="country"><?php echo $details->region_name; ?></span>
                <span class="editable" id="country"><?php echo $details->country_name; ?></span>                
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> IP Address </div>

            <div class="profile-info-value">
                <span class="editable" id="age"><?php echo $this->session->userdata('ipaddress'); ?></span>
            </div>
        </div>
        
</div>
<div class="page-content">
        <div class="page-header position-relative">
            <h4 class="pink">
                <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                <a href="#modal-table" role="button" class="green" data-toggle="modal"> Latest 10 Inquiry </a>
            </h4>

        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <div class="row-fluid">
                    <div class="span12">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                               <?php $i = 1; if($homeinquiry){ foreach($homeinquiry as $inquiry_row){ ?>
                                <tr>
                                    <td class="center"><?= $i ?></td>
                                    <td><?= $inquiry_row->fullname; ?></td>
                                    <td><?= $inquiry_row->email; ?></td>
                                    <td><?= $inquiry_row->mobile_no; ?></td>
                                    <td class="td-actions">
                                        <div class="hidden-phone visible-desktop action-buttons" id="<?= $inquiry_row->id; ?>">
                                            <a class="green tooltip-success" data-rel="tooltip" data-placement="top" title="View" href="<?= base_url('admin/inquiry/view_inquiry').'/'.$inquiry_row->id ?>"><i class="icon-eye-open bigger-130"></i></a>
                                            <a onclick="return confirm(' Are you sure want to Delete Inquiry ?')" class="red tooltip-error" data-rel="tooltip" data-placement="top" title="Delete" href="<?= base_url('admin/inquiry/delete_inquiry').'/'.$inquiry_row->id ?>"><i class="icon-trash bigger-130"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                                <?php }else{ ?>
                                <tr><td colspan="5" class="center red">No Record Founds.</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!--/span-->
                </div><!--/row-->

                <div class="hr hr-18 dotted hr-double"></div>


            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
</div><!--/.main-content-->
