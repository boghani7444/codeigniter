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
                <a href="<?= base_url('admin/services'); ?>">Services</a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Add Services</li>
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
            <h1>Add Services</h1>
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

                <?= form_open('admin/services/update_services',array('id'=>'addeditservices','name'=>'addeditservices','class'=>'form-horizontal','enctype'=>"multipart/form-data")); ?>
                <?= form_hidden(array('id'=>$id)); ?>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Service Name</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"service_name",'name'=>"service_name",'value'=>set_value('service_name'),'placeholder'=>"Service Name")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Service Link</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"service_link",'name'=>"service_link",'value'=>set_value('service_link'),'placeholder'=>"Service Link")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Page Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"page_title",'name'=>"page_title",'value'=>set_value('page_title'),'placeholder'=>"Page Title")); ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Sort Keyword</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"sort_keyword",'name'=>"sort_keyword",'value'=>set_value('sort_keyword'),'placeholder'=>"Sort Keyword")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Service Icon</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"file",'id'=>"service_icon",'name'=>"service_icon",'value'=>set_value(''))); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Service Image</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"file",'id'=>"service_image",'name'=>"service_image",'value'=>set_value(''))); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Meta Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"meta_title",'name'=>"meta_title",'value'=>set_value('meta_title'),'placeholder'=>"Page Meta Title")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Meta Keyword</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"meta_keyword",'name'=>"meta_keyword",'value'=>set_value('meta_keyword'),'placeholder'=>"Page Meta Keyword")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Meta Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"meta_description",'id'=>"meta_description",'class'=>"input-xxlarge",'rows'=>"5",'wrap'=>"physical",'placeholder'=>"Page Meta Description")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Display Order</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-large",'id'=>"d_order",'name'=>"d_order",'value'=>set_value('d_order'),'placeholder'=>"Display Order")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <div class="row-fluid">
                            <div class="span3">
                                <label>
                                    <?= form_checkbox(array('class'=>"ace-switch ace-switch-7",'id'=>"status",'name'=>"status",'value'=>'1')); ?>
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"description",'id'=>"description",'cols'=>"55",'rows'=>"5",'wrap'=>"physical")); ?>
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
        $('#service_image,#service_icon').ace_file_input({
            no_file: 'No File ...',
            btn_choose: 'Choose',
            btn_change: 'Change',
            droppable: false,
            onchange: null,
            thumbnail: false //| true | large
        });
    });
</script>