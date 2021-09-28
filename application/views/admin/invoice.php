<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Invoice
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_order"> Manage Order</a></li>
            <li class="active">Invoice</li>
        </ol>
    </section>
    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Invoice ID: FE# <?php echo $total_order->order_id; ?>
                    <small class="pull-right">Date: <?php echo $total_order->invoice_date; ?></small>
                </h2>
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Customer Address
                <address>
                    <strong><?php echo $customer->customer_name; ?></strong>
                    <?php
                        $customer_address=$customer->customer_address;
                        if($customer_address !=NULL)
                        {
                            echo '<br>'.$customer_address;
                        }
                    ?>             
                    <br>Mobile: <?php echo $customer->customer_mobile; ?>
                    <?php
                        $customer_email=$customer->customer_email;
                        if($customer_email !=NULL)
                        {
                            echo '<br>'.'Email: '.$customer_email;
                        }
                    ?>
                </address>
            </div>
            <div class="col-sm-4 col-sm-offset-4 invoice-col">
                Shipping Address
                <address>
                    <strong><?php echo $shipping_info->shipping_name; ?></strong><br>
                    <?php echo $shipping_info->shipping_address; ?><br>
                    <strong>Landmark: </strong><?php echo $shipping_info->shipping_landmark; ?>
                    <?php
                        $note=$shipping_info->shipping_note;
                        if($note !=NULL)
                        {
                            echo '<br>'.'<strong>'.'Note:'. $note .'</strong>';
                        }
                    ?>    
                    <br/>
                    Mobile: <?php echo $shipping_info->shipping_mobile; ?><br>
                    Mobile 2: <?php echo $shipping_info->shipping_mobile_2; ?><br>
                    Email: <?php echo $shipping_info->shipping_email; ?>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Sales Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($order_info as $v_order) {
                            ?>
                            <tr>
                                <td><?php echo $v_order->product_name; ?></td>
                                <td><?php echo $v_order->product_price; ?></td>
                                <td><?php echo $v_order->product_sales_quantity; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <p class="lead">Payment Methods: <?php echo $payment_info->payment_method; ?></p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <div class="col-xs-6">
                <p class="lead">
                    Payment Status:
                    <?php
                    $payment = $total_order->order_status;
                    if ($payment == 0) {
                        echo '<span style="color:red">Unpaid</span>';
                    } else {
                        echo '<span style="color:green">Paid</span>';
                    }
                    ?>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?php echo $total_order->order_total; ?></td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td><?php echo $total_order->shipping_charge; ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><span style="border: 2px dotted red; padding: 2%;"><?php echo $total_order->order_total + $total_order->shipping_charge;; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>