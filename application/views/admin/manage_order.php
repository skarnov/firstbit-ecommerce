<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Order</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Payment Method</th>
                            <th>Order Amount</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
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
                        foreach ($all_order as $v_order) {
                            ?>
                            <tr>
                                <td><?php echo $v_order->order_id; ?></td>
                                <td><?php echo $v_order->customer_name; ?></td>
                                <td><?php echo $v_order->payment_method; ?></td>
                                <td><?php echo $v_order->order_total; ?></td>
                                <td><?php echo $v_order->invoice_date; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_order->order_status == '1') {
                                            echo 'Paid';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_order->order_status == 0) {
                                            echo 'Pending';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/invoice/<?php echo $v_order->order_id; ?>/<?php echo $v_order->customer_id; ?>/<?php echo $v_order->shipping_id; ?>/<?php echo $v_order->payment_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Invoice"><i class="fa fa-envelope"></i></a>
                                        <?php
                                        if ($v_order->order_status == 0) {
                                            ?>
                                            <a href="<?php echo base_url(); ?>ecommerce/paid_order/<?php echo $v_order->order_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Paid"><i class="fa fa-credit-card"></i></a>
                                            <?php
                                        }
                                        ?>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_order/<?php echo $v_order->order_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sale" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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