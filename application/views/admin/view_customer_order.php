<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Customer Order
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_order"> Manage Order</a></li>
            <li class="active">Customer Order</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($customer_order_info as $v_order) {
                            ?>
                            <tr>
                                <td><?php echo $v_order->order_id; ?></td>
                                <td><?php echo $v_order->invoice_date; ?></td>
                                <td><?php echo $v_order->order_total; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>ecommerce/order_details/<?php echo $v_order->order_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Order Details"><i class="fa fa-cart-arrow-down"></i></a>
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