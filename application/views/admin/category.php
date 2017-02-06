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
            <li class="active">Category</li>
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
                        Category Record
                    </div>

                    <table id="record_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th>Category Name</th>
                                <th class="hidden-480">Sequence</th>
                                <th class="hidden-phone"><i class="icon-time bigger-110 hidden-phone"></i>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                        </tbody>
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
            "sAjaxSource": "<?php echo base_url(); ?>admin/category/category_list",
            "stateSave": true,
            "aoColumns": [
                {"mDataProp": "no", width: '12%'},
                {"mDataProp": "name", width: '12%'},
                {"mDataProp": "sequence", width: '12%'},
                {"mDataProp": "created_at", width: '5%'},
                {"mDataProp": "operation", width: '10%'}
            ],
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [1]},
            ],
            "aaSorting": [[0, "asc"]]
        });

        $('#record_table').on('click', '.status_btn', function() {
            var id = $(this).attr('id');
            var r = confirm("Are You Sure Change Status?");
            if (r == true) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>admin/category/status_user",
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
                    url: "<?php echo base_url(); ?>admin/category/delete_user",
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