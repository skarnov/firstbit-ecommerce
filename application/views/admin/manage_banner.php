<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/add_banner">Add New Banner</a></li>
            <li class="active">Manage Banner</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Position</th>
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
                        foreach ($all_banner as $v_banner) {
                            ?>
                            <tr>
                                <td><img src="<?php echo base_url() . $v_banner->banner_image; ?>" style="height:200px; width:200px;" /></td>
                                <td><?php echo $v_banner->banner_link; ?></td>
                                <td>
                                    <div class='activation_color'>
                                        <?php
                                        if ($v_banner->banner_position == '1') {
                                            echo 'E - Ticket';
                                        } elseif ($v_banner->banner_position == '2') {
                                            echo 'E - Courier';
                                        } elseif ($v_banner->banner_position == '3') {
                                            echo 'E - Service';
                                        } elseif ($v_banner->banner_position == '4') {
                                            echo 'Banner';
                                        }
                                        ?>   
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $admin_type = $this->session->userdata('admin_type');
                                    if ($admin_type == '1') {
                                        ?>
                                        <a href="<?php echo base_url(); ?>ecommerce/edit_banner/<?php echo $v_banner->banner_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Banner"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_banner/<?php echo $v_banner->banner_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Banner" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                            <?php
                                        }
                                        ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>