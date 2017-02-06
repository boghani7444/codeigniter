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
                <a href="<?= base_url('admin/property_type'); ?>"><?= $page_title; ?></a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Add <?= $page_title; ?></li>
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
            <h1>Add/Edit <?= $page_title; ?></h1>
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

                <?= form_open('admin/property_type/update_property_type',array('id'=>'addeditproperty_type','name'=>'addeditproperty_type','class'=>'form-horizontal')); ?>
                <?= form_hidden(array('id'=>$id)); ?>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Name</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"pname",'name'=>"pname",'value'=>set_value('pname'),'placeholder'=>"Property Name")); ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Display Order</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-large",'id'=>"sequence",'name'=>"sequence",'value'=>set_value('sequence'),'placeholder'=>"Display Order")); ?>
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
    $('#addeditproperty_type').validate({
        errorElement: 'span',
        errorClass: 'help-inline error',
        focusInvalid: false,
        rules: {
            pname: {
                required: true,
            },
        },
        messages: {
            pname: {
                required: "Please specify a Property Type Name.",
            },
        },
    });
</script>