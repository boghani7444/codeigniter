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
                <a href="<?= base_url('admin/page_data'); ?>">Menu & Page Text </a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Edit Menu & Page Text </li>
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
            <h1>Edit Menu & Page Text </h1>
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

                <?= form_open('admin/page_data/update_page_data',array('id'=>'addeditpage_data','name'=>'addeditpage_data','class'=>'form-horizontal')); ?>
                <?= form_hidden(array('id'=>$id)); ?>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Menu Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"title",'name'=>"title",'value'=>$page_data['title'],'placeholder'=>"Menu Title")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Menu URL</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"page_link",'name'=>"page_link",'value'=>$page_data['page_link'],'placeholder'=>"Menu Page taxt")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Page Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"page_title",'name'=>"page_title",'value'=>$page_data['page_title'],'placeholder'=>"Page Title")); ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Sort Keyword</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"sort_keyword",'name'=>"sort_keyword",'value'=>$page_data['sort_keyword'],'placeholder'=>"Sort Keyword")); ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Meta Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"meta_title",'name'=>"meta_title",'value'=>$page_data['meta_title'],'placeholder'=>"Page Meta Title")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Meta Keyword</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"meta_keyword",'name'=>"meta_keyword",'value'=>$page_data['meta_keyword'],'placeholder'=>"Page Meta Keyword")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Meta Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"meta_description",'id'=>"meta_description",'class'=>"input-xxlarge",'rows'=>"5",'value'=>$page_data['meta_description'],'placeholder'=>"Page Meta Description")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Home Sort Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"sort_description",'id'=>"sort_description",'class'=>"input-xxlarge",'rows'=>"5",'value'=>$page_data['sort_description'],'placeholder'=>"Home Sort Description")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"description",'id'=>"description",'cols'=>"55",'rows'=>"5",'wrap'=>"physical",'value'=>$page_data['description'])); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Display Order</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-large",'id'=>"sequence",'name'=>"sequence",'value'=>$page_data['sequence'],'placeholder'=>"Display Order")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <div class="row-fluid">
                            <div class="span3">
                                <label>
                                    <?php 
                                    if($page_data['status'] == 'Y'){
                                        $a = TRUE;
                                    }else{
                                        $a = FALSE;
                                    }
                                    ?>
                                    <?= form_checkbox(array('class'=>"ace-switch ace-switch-7",'id'=>"status",'checked'=>$a,'name'=>"status",'value'=>'1')); ?>
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