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
            <li class="active">Setting</li>
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
                </div>
                <div>
                    <div id="user-profile-3" class="user-profile row-fluid">
                        <div class="offset1 span10">
                            <div class="space"></div>

                            <div class="tabbable">
                                <ul class="nav nav-tabs padding-16">
                                    <li class="active">
                                        <a data-toggle="tab" href="#edit-basic">
                                            <i class="green icon-edit bigger-125"></i>
                                            Basic Info
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#edit-settings">
                                            <i class="purple icon-cog bigger-125"></i>
                                            Settings
                                        </a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#edit-password">
                                            <i class="blue icon-key bigger-125"></i>
                                            Password
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content profile-edit-tab-content">
                                    <div id="edit-basic" class="tab-pane in active">
                                        <?= form_open('admin/settings/do_setting',array('id'=>'usersetting','name'=>'usersetting','class'=>"form-horizontal")); ?>
                                        <div class="space"></div>
                                        <h4 class="header blue bolder smaller">Contact</h4>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="form-field-email">User Name</label>

                                            <div class="controls">
                                                <span class="input-icon input-icon-right">
                                                    <?php echo form_input(array('placeholder'=>'User Name','name'=>'username','id'=>'username','value'=>$user_details['username'])); ?>
                                                    <i class="icon-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="form-field-email">Email</label>

                                            <div class="controls">
                                                <span class="input-icon input-icon-right">
                                                    <?php echo form_input(array('placeholder'=>'Email','name'=>'email','id'=>'email','value'=>$user_details['email'])); ?>
                                                    <i class="icon-envelope"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-website">Website</label>

                                            <div class="controls">
                                                <span class="input-icon input-icon-right">
                                                    <?php echo form_input(array('placeholder'=>'website','name'=>'website','id'=>'website','value'=>$user_details['website'])); ?>
                                                    <i class="icon-globe"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-phone">Phone</label>

                                            <div class="controls">
                                                <span class="input-icon input-icon-right">
                                                    <?php echo form_input(array('placeholder'=>'phone','name'=>'phone','id'=>'phone','value'=>$user_details['phone_no'])); ?>
                                                    <i class="icon-phone icon-flip-horizontal"></i>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="form-field-phone">Address</label>

                                            <div class="controls">
                                                <span class="input-icon input-icon-right">
                                                    <?php echo form_textarea(array('style'=>'width: auto;','rows'=>'3','cols'=>'29','placeholder'=>'Address','name'=>'address','id'=>'address','value'=>$user_details['address'])); ?>
                                                    <i class="icon-map-marker icon-flip-horizontal"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="space"></div>
                                        <h4 class="header blue bolder smaller">Social</h4>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-facebook">Facebook</label>

                                            <div class="controls">
                                                <span class="input-icon">
                                                    <?php echo form_input(array('placeholder'=>'facebook','name'=>'facebook','id'=>'facebook','value'=>$user_details['facebook'])); ?>
                                                    <i class="icon-facebook"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-twitter">Twitter</label>

                                            <div class="controls">
                                                <span class="input-icon">
                                                    <?php echo form_input(array('placeholder'=>'twitter','name'=>'twitter','id'=>'twitter','value'=>$user_details['twitter'])); ?>
                                                    <i class="icon-twitter"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-gplus">Google+</label>

                                            <div class="controls">
                                                <span class="input-icon">
                                                    <?php echo form_input(array('placeholder'=>'gplus','name'=>'gplus','id'=>'gplus','value'=>$user_details['google'])); ?>
                                                    <i class="icon-google-plus"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <?php echo form_button(array('type'=> 'submit','value'=>'true','name'=>'submit','id'=>'submit','class'=>'btn btn-info','content' => '<i class="icon-ok bigger-110"></i>Save')); ?>
                                            &nbsp; &nbsp; &nbsp;
                                            <?php echo form_button(array('type'=> 'reset','value'=>'true','class'=>'btn','content' => '<i class="icon-undo bigger-110"></i>Reset')); ?>
                                        </div>
                                        </form>
                                    </div>

                                    <div id="edit-settings" class="tab-pane">
                                        <div class="space-10"></div>
                                        <?= form_open('admin/settings/defultmetatag',array('id'=>'defultmetatag','name'=>'defultmetatag','class'=>"form-horizontal")); ?>
                                        <div class="space-10"></div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-pass1">Meta Title</label>

                                            <div class="controls">
                                                <?php echo form_input(array('class'=>"input-xxlarge",'name'=>'meta_title','id'=>'meta_title','value'=>$user_details['meta_title'])); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="form-field-pass1">Meta Keyword</label>

                                            <div class="controls">
                                                <?php echo form_input(array('class'=>"input-xxlarge",'name'=>'meta_keyword','id'=>'meta_keyword','value'=>$user_details['meta_keyword'])); ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="form-field-pass1">Meta Description</label>

                                            <div class="controls">
                                                <?php echo form_textarea(array('class'=>"input-xxlarge",'name'=>'meta_description','id'=>'meta_description','value'=>$user_details['meta_description'])); ?>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <?php echo form_button(array('type'=> 'submit','value'=>'true','name'=>'metatag','id'=>'metatag','class'=>'btn btn-info','content' => '<i class="icon-ok bigger-110"></i>Save')); ?>
                                            &nbsp; &nbsp; &nbsp;
                                            <?php echo form_button(array('type'=> 'reset','value'=>'true','class'=>'btn','content' => '<i class="icon-undo bigger-110"></i>Reset')); ?>
                                        </div>
                                        </form>
                                    </div>

                                    <div id="edit-password" class="tab-pane">
                                        <?= form_open('admin/settings/do_changepassword',array('id'=>'changepassword','name'=>'changepassword','class'=>"form-horizontal")); ?>
                                        <div class="space-10"></div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-pass1">New Password</label>

                                            <div class="controls">
                                                <?php echo form_password(array('name'=>'password','id'=>'password','value'=>set_value('password'))); ?>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-pass2">Confirm Password</label>

                                            <div class="controls">
                                                <?php echo form_password(array('name'=>'cpassword','id'=>'cpassword','value'=>set_value('cpassword'))); ?>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <?php echo form_button(array('type'=> 'submit','value'=>'true','name'=>'csubmit','id'=>'csubmit','class'=>'btn btn-info','content' => '<i class="icon-ok bigger-110"></i>Change Password')); ?>
                                            &nbsp; &nbsp; &nbsp;
                                            <?php echo form_button(array('type'=> 'reset','value'=>'true','class'=>'btn','content' => '<i class="icon-undo bigger-110"></i>Reset')); ?>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!--/span-->
                    </div><!--/user-profile-->
                </div>
            </div>
        </div>
</div>    
</div><!--/.main-content-->
