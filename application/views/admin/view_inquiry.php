<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="<?= base_url('admin'); ?>">Home</a>
                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li>
                <a href="<?= base_url('admin/inquiry'); ?>">Inquiry</a>
                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active"><?= $inquiry['fullname']; ?></li>
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
                    <div id="user-profile-1" class="user-profile row-fluid">
                        <div class="span12">
                            <div class="space-12"></div>
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Full Name </div>
                                    <div class="profile-info-value">
                                        <i class="icon-user light-blue"></i>
                                        <span class="editable"> <?= $inquiry['fullname']; ?> </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Email </div>
                                    <div class="profile-info-value">
                                        <i class="icon-envelope light-blue"></i>
                                        <span class="editable"><?= $inquiry['email']; ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Mobile No </div>
                                    <div class="profile-info-value">
                                        <i class="icon-mobile-phone light-blue"></i>
                                        <span class="editable"><?= $inquiry['mobile_no']; ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Location </div>
                                    <div class="profile-info-value">
                                        <i class="icon-map-marker light-blue"></i>
                                        <span class="editable"> <?= $inquiry['location']; ?> </span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Website </div>
                                    <div class="profile-info-value">
                                        <i class="icon-globe light-blue"></i>
                                        <span class="editable"><?= $inquiry['website']; ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Requirement </div>
                                    <div class="profile-info-value">
                                        <i class="icon-phone light-blue"></i>
                                        <span class="editable"><?= $inquiry['requirement']; ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Information </div>
                                    <div class="profile-info-value">
                                        <i class="icon-comments light-blue"></i>
                                        <span class="editable"><?= $inquiry['project_information']; ?></span>
                                    </div>
                                </div>
                                <?php if($inquiry['inquiry_file']){ ?>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Inquiry File </div>
                                    <div class="profile-info-value">
                                        <i class="icon-comments light-blue"></i>
                                        <span class="editable"><a class="iframe" href="<?= base_url('upload/inquiry/'.$inquiry['inquiry_file']); ?>">VIEW FILE</a></span>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-actions">
                                    <a href="javascript:void(0);" onclick='javascript:history.go(-1)' class="btn btn-info">
                                                <i class="icon-reply bigger-110"></i>
                                                Back
                                        </a>
                                </div>
                            </div>
                                
                            
                            <div class="space-20"></div>
                        </div>
                    </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
</div><!--/.main-content-->
<script src="<?= base_url('assets/admin/js/jquery.colorbox-min.js'); ?>"></script>
<script type="text/javascript">
	$(".iframe").colorbox({iframe:true});
</script>