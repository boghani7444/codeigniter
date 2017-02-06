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
                <a href="<?= base_url('admin/properties'); ?>">Properties</a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Add/Edit Properties</li>
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
            <h1>Add/Edit Properties</h1>
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

                <?= form_open('admin/properties/update_properties',array('id'=>'addeditproperties','name'=>'addeditproperties','class'=>'form-horizontal','enctype'=>"multipart/form-data")); ?>
                <?= form_hidden(array('id'=>$id)); ?>
                <?= form_hidden(array('old_image'=>$properties['properties_image'])); ?>
                <div style="float: right; position: absolute; left: 90%;" class="col-md-2">
                    <img style="background: #000;margin-right: 15px;" width="100" src="<?= base_url('upload/properties/'.$properties['properties_image']); ?>">
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Category</label>
                    <div class="controls">
                        <?php 
                        $array = array();
                        $array[''] = ' --- Select Category --- ';
                        foreach ($category as $row_cate){
                            $array[$row_cate->id] = $row_cate->name;
                        }
                        ?>
                        <?= form_dropdown('categories_id',$array,$properties['categories_id'],array('id'=>'categories_id',"class"=>"input-xxlarge")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Property Type</label>
                    <div class="controls">
                        <?php 
                        $array_pro = array();
                        $array_pro[''] = ' --- Select Property Type --- ';
                        foreach ($property as $row_property){
                            $array_pro[$row_property->id] = $row_property->pname;
                        }
                        ?>
                        <?= form_dropdown('property_type_id', $array_pro, $properties['property_type_id'], array('id'=>"property_type_id","class"=>"input-xxlarge")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Properties Name</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"properties_name",'name'=>"properties_name",'value'=>$properties['properties_name'],'placeholder'=>"Properties Name")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Properties Photo</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"file",'id'=>"properties_image",'name'=>"properties_image")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Image Alt</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"image_alt",'name'=>"image_alt",'value'=>$properties['image_alt'],'placeholder'=>"Image Alt Tag")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Image Title</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-xxlarge",'type'=>"text",'id'=>"image_title",'name'=>"image_title",'value'=>$properties['image_title'],'placeholder'=>"Image Title Tag")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">State</label>
                    <div class="controls">
                        <?php 
                        $array_state = array();
                        $array_state[''] = ' --- Select State --- ';
                        foreach ($state as $row_state){
                            $array_state[$row_state->id] = $row_state->statename;
                        }
                        ?>
                        <?= form_dropdown('state', $array_state, $properties['state'],array('id'=>'state',"class"=>"input-xxlarge",'onchange'=>'getcity(this.value);')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">City</label>
                    <div class="controls">
                        <?php 
                        $array_city = array();
                        $array_city[''] = ' --- Select City --- ';
                        foreach ($city as $row_city){
                            $array_city[$row_city->id] = $row_city->city;
                        }
                        ?>
                        <?= form_dropdown('city', $array_city, $properties['city'] , array('id'=>'city',"class"=>"input-xxlarge")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Display Order</label>
                    <div class="controls">
                        <?= form_input(array('class'=>"input-large",'id'=>"sequence",'name'=>"sequence",'value'=>$properties['sequence'],'placeholder'=>"Display Order")); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <div class="row-fluid">
                            <div class="span3">
                                <label>
                                    <?php 
                                    if($properties['status'] == '1'){
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
                <div class="control-group">
                    <label class="control-label" for="form-field-4">Description</label>
                    <div class="controls">
                        <?= form_textarea(array('name'=>"description",'id'=>"description",'cols'=>"55",'rows'=>"5",'wrap'=>"physical"),$properties['description']); ?>
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
        $('#properties_image').ace_file_input({
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
    $('#addeditproperties').validate({
        errorElement: 'span',
        errorClass: 'help-inline error',
        focusInvalid: false,
        rules: {
            categories_id: { required: true },
            property_type_id: { required: true },
            properties_name: { required: true },
            state: { required: true },
            city: { required: true },
        },
        messages: {
            categories_id: {
                required: "Please Select Category.",
            },
            property_type_id: {
                required: "Please Select Property Type.",
            },
            properties_name: {
                required: "Please specify a Properties Name.",
            },
            state: {
                required: "Please Select State.",
            },
            city: {
                required: "Please Select City.",
            },
        },
    });
</script>
<script type="text/javascript">
function getcity(id){
    $.ajax({
        url: '<?php echo base_url(); ?>admin/properties/view_city',
        type: 'POST',
        data: { 'id' : id },
        success: function(response) {
            $('#city').html(response['city']);
        }            
    });
}
</script>