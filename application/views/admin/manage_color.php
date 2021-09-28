<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Color
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/add_color">Add New Color</a></li>
            <li class="active">Manage Color</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_color');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_color');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Color Name</th>
                            <?php
                            $admin_type = $this->session->userdata('admin_type');
                            if ($admin_type == '1') {
                                ?>
                                <th>Action</th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_color as $v_color) {
                            ?>
                            <tr>
                                <td><?php echo $v_color->color_name; ?></td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/edit_color/<?php echo $v_color->color_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Color"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_color/<?php echo $v_color->color_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Color" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>