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

            <li>
                <a href="<?= base_url('admin/skills'); ?>">Skills </a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Edit Skills </li>
        </ul><!--.breadcrumb-->
        <ul class="nav pull-right">
            <li class="dropdown" style="color: #000;padding: 10px;font-size: 12px;">
                <span id="date_time"></span>
                <script type="text/javascript">window.onload = date_time('date_time');</script>
            </li>
        </ul>
    </div>

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>Edit Skills </h1>
        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
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
                <!--PAGE CONTENT BEGINS-->

                <?= form_open('admin/skills/update_skills',array('id'=>'addeditskills','name'=>'addeditskills','class'=>'form-horizontal')); ?>
                <?= form_hidden(array('id'=>$id)); ?>
                <?= form_hidden(array('old_image'=>$skills['image'])); ?>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">SKill Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"title",'name'=>"title",'value'=>$skills['title'],'placeholder'=>"Skill Title")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Service Image</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"file",'id'=>"image",'name'=>"image",'value'=>'')); ?>
                        <div style="float: right; position: absolute; margin-left: 29%; margin-top: -3.3%;" class="col-md-2">
                            <img style="margin-right: 15px;" width="100" src="<?= base_url('upload/skills/'.$skills['image']); ?>">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Display Order</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-large",'id'=>"d_order",'name'=>"d_order",'value'=>$skills['d_order'],'placeholder'=>"Display Order")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <div class="row-fluid">
                            <div class="span3">
                                <label>
                                    <?php 
                                    if($skills['status'] == 'Y'){
                                        $a = TRUE;
                                    }else{
                                        $a = FALSE;
                                    }
                                    ?>
                                    <?= form_checkbox(array('class'=>"ace-switch ace-switch-7",'id'=>"status",'checked'=>$a,'name'=>"status",'value'=>'Y')); ?>
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"description",'id'=>"description",'cols'=>"55",'rows'=>"5",'wrap'=>"physical",'value'=>$skills['description'])); ?>
                    </div>
                </div>
                
                <div class="form-actions">
                    <?= form_button(array('type'=>'submit','class'=>"btn btn-info",'id'=>"submit",'name'=>"submit",'value'=>'submit','content' => '<i class="icon-ok bigger-110"></i>Submit')); ?>
                    &nbsp; &nbsp; &nbsp;
                    <?= form_button(array('type'=>'reset','class'=>"btn",'id'=>"reset",'name'=>"reset",'value'=>'RESET','content' =>'<i class="icon-undo bigger-110"></i>Reset')); ?>
                </div>
                </form>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
</div><!--/.main-content-->
<script type="text/javascript">
CKEDITOR.replace('description',{
    toolbar :
    [
      ['Source','-','Undo','Redo','-','Bold', 'Italic','Underline', '-', 'NumberedList', 'BulletedList','Outdent','Indent', '-', 'Link', 'Unlink','TextColor','BGColor', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','FontSize','-','Image','Table','Format','HorizontalRule','ShowBlocks'],
    ],
    filebrowserBrowseUrl : '<?php echo base_url(); ?>assets/admin/js/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/admin/js/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>assets/admin/js/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url(); ?>assets/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url(); ?>assets/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url(); ?>assets/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});

</script>
<style>
    .ace-file-input label{
        width: 59.7%;
        float: left;
    }
    .ace-file-input a{
        float: left;
    }
    .ace-file-input{
        width: 60%;
    }
</style>
<script type="text/javascript">
    $(function () {
        $('#image').ace_file_input({
            no_file: 'No File ...',
            btn_choose: 'Choose',
            btn_change: 'Change',
            droppable: false,
            onchange: null,
            thumbnail: false //| true | large
        });
    });
</script>