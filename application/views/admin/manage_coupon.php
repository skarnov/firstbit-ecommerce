<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Coupon
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/add_coupon">Add New Coupon</a></li>
            <li class="active">Manage Coupon</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_coupon');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_coupon');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Coupon Code</th>
                            <th>Coupon Amount</th>
                            <th>Coupon Validity</th>
                            <th>Coupon Status</th>
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
                        foreach ($all_coupon as $v_coupon) {
                            ?>
                            <tr>
                                <td><?php echo $v_coupon->coupon_code; ?></td>
                                <td><?php echo $v_coupon->coupon_amount; ?></td>
                                <td><?php echo $v_coupon->coupon_validity; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_coupon->coupon_status == '1') {
                                            echo 'Active';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">   
                                        <?php
                                        if ($v_coupon->coupon_status == 0) {
                                            echo 'Inactive';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/edit_coupon/<?php echo $v_coupon->coupon_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Coupon"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_coupon/<?php echo $v_coupon->coupon_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Coupon" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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