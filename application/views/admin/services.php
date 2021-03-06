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
            <li class="active">Services</li>
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
                        Services Record
                    </div>

                    <table id="record_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th>Service Name</th>
                                <th>Service URL</th>
                                <th class="hidden-phone">Page Title</th>
                                <th class="hidden-480">Sequence</th>
                                <th class="hidden-phone"><i class="icon-time bigger-110 hidden-phone"></i>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; foreach($services as $services_row){ ?>
                            <tr>
                                <td class="center"><?= $i ?></td>
                                <td><a style="color:#393939;text-decoration: none;" href="javascript:void(0);" class="screenshot" rel="<?= base_url('upload/services/images/'.$services_row->service_image) ?>" title="<?= $services_row->service_name; ?>"><?= $services_row->service_name; ?></a></td>
                                <td><?= $services_row->service_link; ?></td>
                                <td class="hidden-phone"><?= $services_row->page_title; ?></td>
                                <td class="hidden-480"><?= $services_row->d_order; ?></td>
                                <td class="hidden-phone"><?= date('M d',strtotime($services_row->created_at)); ?></td>
                                <td class="td-actions">
                                    <div class=" action-buttons" id="<?= $services_row->id ?>">
                                        <!---------hidden-phone visible-desktop-----Status--------------->
                                        <?php if($services_row->status == '1'){ ?>
                                        <a onclick="return confirm(' Are you sure want to Inactive Services ?')" class="status1 green" href="<?= base_url('admin/services/status_services').'/'.$services_row->id ?>"><i class="icon-ok bigger-130"></i></a>
                                        <?php }else{ ?>
                                        <a onclick="return confirm(' Are you sure want to Active Services ?')" class="status1 red" href="<?= base_url('admin/services/status_services').'/'.$services_row->id ?>"><i class="icon-remove bigger-130"></i></a>
                                        <?php } ?>
                                        <!--------------Edit--------------->
                                        <a class="green" href="<?= base_url('admin/services/edit_services').'/'.$services_row->id ?>"><i class="icon-pencil bigger-130"></i></a>
                                        <!--------------Delete--------------->
                                        <a onclick="return confirm(' Are you sure want to Delete Services ?')" class="red" href="<?= base_url('admin/services/delete_services').'/'.$services_row->id ?>"><i class="icon-trash bigger-130"></i></a>
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
<script src="<?= base_url('assets/admin/flyimage/main.js'); ?>" type="text/javascript" ></script>
<link href="<?= base_url('assets/admin/flyimage/style.css'); ?>" rel="stylesheet" type="text/css" />