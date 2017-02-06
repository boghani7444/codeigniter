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
            <li class="active">Menu Page Text</li>
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
                        Menu Page Text Record
                    </div>

                    <table id="record_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th>Menu Name</th>
                                <th>URL</th>
                                <th class="hidden-480">Sequence</th>
                                <th class="hidden-phone"><i class="icon-time bigger-110 hidden-phone"></i>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; foreach($site_info as $site_info_row){ ?>
                            <tr>
                                <td class="center"><?= $i; ?></td>

                                <td><?= $site_info_row->title; ?></td>
                                <td><?= $site_info_row->page_link; ?></td>
                                <td class="hidden-480"><?= $site_info_row->sequence; ?></td>
                                <td class="hidden-phone"><?= date('M d',strtotime($site_info_row->datetime)); ?></td>
                                <td class="td-actions">
                                    <div class="action-buttons" id="<?= $site_info_row->id ?>">
                                        <!------hidden-phone visible-desktop --------Status--------------->
                                        <?php if($site_info_row->status == 'Y'){ ?>
                                        <a onclick="return confirm(' Are you sure want to Inactive Menu & Text ?')" class="status1 green" href="<?= base_url('admin/page_data/status_page_data').'/'.$site_info_row->id ?>"><i class="icon-ok bigger-130"></i></a>
                                        <?php }else{ ?>
                                        <a onclick="return confirm(' Are you sure want to Active Menu & Text ?')" class="status1 red" href="<?= base_url('admin/page_data/status_page_data').'/'.$site_info_row->id ?>"><i class="icon-remove bigger-130"></i></a>
                                        <?php } ?>
                                        <!--------------Edit--------------->
                                        <a class="green" href="<?= base_url('admin/page_data/edit_page_data').'/'.$site_info_row->id ?>"><i class="icon-pencil bigger-130"></i></a>
                                        <!--------------Delete--------------->
                                        <a onclick="return confirm(' Are you sure want to Delete Menu & Text ?')" class="red" href="<?= base_url('admin/page_data/delete_page_data').'/'.$site_info_row->id ?>"><i class="icon-trash bigger-130"></i></a>
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