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
            <li class="active">Properties Image</li>
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
                        Properties Image Record 
                        <a href="<?= base_url(); ?>admin/properties/add_properties_image/<?= $properties_id; ?>" style="float: right; text-decoration: none;color: #fff;margin-right: 15px;"><i class="icon-plus"></i> Add Image</a>
                    </div>

                    <table id="record_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th>Image Title</th>
                                <th class="hidden-480">Sequence</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
</div><!--/.main-content-->
<script type="text/javascript">
    var oTable;
    $(document).ready(function() {
        //initialize the javascript
//        App.init();

        oTable = $('#record_table').dataTable({
            "bJQueryUI": true,
            "bProcessing": true,
            "bServerSide": true,
            "bRedraw": true,
            "sAjaxSource": "<?php echo base_url(); ?>admin/properties/image_list/<?= $properties_id; ?>",
            "stateSave": true,
            "aoColumns": [
                {"mDataProp": "no", width: '5%'},
                {"mDataProp": "title", width: '12%'},
                {"mDataProp": "sequence", width: '12%'},
                {"mDataProp": "operation", width: '10%'}
            ],
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}                
            ],
            "aaSorting": [[0, "asc"]]
        });

        $('#record_table').on('click', '.status_btn', function() {
            var id = $(this).attr('id');
            var r = confirm("Are You Sure Change Status?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/properties/status_image",
                    data: { id: id },
                    beforeSend: function() {
                        //$('#wait').html("Wait for checking");
                    },
                    success: function() {
                        oTable.fnDraw();
                    }
                });
            } else {

            }
        });

        $('#record_table').on('click', '.delete_btn', function() {
            var id = $(this).attr('id');
            var r = confirm("Are you sure delete this content?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/properties/delete_image",
                    data: { id: id },
                    beforeSend: function() {
                        $('.alert-success, .alert-danger, alert-warning').addClass('hide');
                        $('.alert-success, .alert-danger, alert-warning').hide();
                    },
                    success: function(resp) {
                        var obj = jQuery.parseJSON(resp);
                        if (obj.status) {
                            $('.alert-success').removeClass('hide');
                            $('.alert-success').show();
                            $(".msg-content").html(obj.message);
                        } else {
                            $('.alert-danger').removeClass('hide');
                            $('.alert-danger').show();
                            $(".msg-content").html(obj.message);
                        }
                        oTable.fnDraw();
                    }
                });
            } else {

            }
        });
    });

</script>
<script src="<?= base_url('assets/admin/flyimage/main.js'); ?>" type="text/javascript" ></script>
<link href="<?= base_url('assets/admin/flyimage/style.css'); ?>" rel="stylesheet" type="text/css" />


<script type="text/javascript">
function abc(){
    xOffset = 10;
    yOffset = 30;
    $("a.screenshot").hover(function(e){
        this.t = this.title;
        this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='screenshot'><img src='"+ this.rel +"' alt='url preview' width='200' />"+ c +"</p>");								 
		$("#screenshot")
                    .css("top",(e.pageY - xOffset) + "px")
                    .css("left",(e.pageX + yOffset) + "px")
                    .fadeIn("fast");						
    },
    function(){
        this.title = this.t;	
        $("#screenshot").remove();
    });	
    $("a.screenshot").mousemove(function(e){
        $("#screenshot")
        .css("top",(e.pageY - xOffset) + "px")
        .css("left",(e.pageX + yOffset) + "px");
    });	
}
</script>