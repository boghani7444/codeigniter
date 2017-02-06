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
                <a href="<?= base_url('admin/properties/properties_image/'.$image['properties_id']); ?>">Properties Image</a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Add/Edit Properties Image</li>
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
            <h1>Add/Edit Properties Image</h1>
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

                <?= form_open('admin/properties/update_properties_image',array('id'=>'addeditimage','name'=>'addeditimage','class'=>'form-horizontal','enctype'=>"multipart/form-data")); ?>
                <?= form_hidden(array('id'=>$id)); ?>
                <?= form_hidden(array('properties_id'=>$image['properties_id'])); ?>
                <?= form_hidden(array('old_image'=>$image['image'])); ?>
                <div style="float: right; position: absolute; left: 90%;" class="col-md-2">
                    <img style="background: #000;margin-right: 15px;" width="100" src="<?= base_url('upload/properties/'.$image['image']); ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Image Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"title",'name'=>"title",'value'=>$image['title'],'placeholder'=>"Properties Name")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Image</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'multiple'=>'','type'=>"file",'id'=>"image",'name'=>"image")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Display Order</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-large",'id'=>"sequence",'name'=>"sequence",'value'=>$image['sequence'],'placeholder'=>"Display Order")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <div class="row-fluid">
                            <div class="span3">
                                <label>
                                    <?php 
                                    if($image['status'] == '1'){
                                        $a = TRUE;
                                    }else{
                                        $a = FALSE;
                                    }
                                    ?>
                                    <?= form_checkbox(array('class'=>"ace-switch ace-switch-7",'id'=>"status",'name'=>"status",'checked'=>$a,'value'=>'1')); ?>
                                    <span class="lbl"></span>
                                </label>
                            </div>
                        </div>
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
<script type="text/javascript">
    $('#addeditimage').validate({
        errorElement: 'span',
        errorClass: 'help-inline error',
        focusInvalid: false,
        rules: {
            title: { required: true },
        },
        messages: {
            title: {
                required: "Please specify a Image Title.",
            },
        },
    });
</script>