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
            <li class="active">Inquiry</li>
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
                        Inquiry Record
                    </div>

                    <table id="record_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th class="hidden-phone">Mobile No</th>
                                <th class="hidden-phone">Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; foreach($inquiry as $inquiry_row){ ?>
                            <tr>
                                <td class="center"><?= $i ?></td>
                                <td><?= $inquiry_row->fullname; ?></td>
                                <td><?= $inquiry_row->email; ?></td>
                                <td class="hidden-phone"><?= $inquiry_row->mobile_no; ?></td>
                                <td class="hidden-phone"><?= $inquiry_row->location; ?></td>
                                <td class="td-actions">
                                    <div class="action-buttons" id="<?= $inquiry_row->id ?>">
                                        <!---------hidden-phone visible-desktop -----View--------------->
                                        <a class="green" href="<?= base_url('admin/inquiry/view_inquiry').'/'.$inquiry_row->id ?>"><i class="icon-eye-open bigger-130"></i></a>
                                        <!--------------Delete--------------->
                                        <a onclick="return confirm(' Are you sure want to Delete Inquiry ?')" class="red" href="<?= base_url('admin/inquiry/delete_inquiry').'/'.$inquiry_row->id ?>"><i class="icon-trash bigger-130"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
</div><!--/.main-content-->
<script type="text/javascript">
    $(function () {
        var oTable = $('#record_table').dataTable({
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "bRetrieve": true
        });
    });
</script>