<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="">Success!</a></li>
    </ul>
    <div class="row">
        <div class="col-xs-12">
            <h1>Success!</h1>
        </div>
        <div class="col-xs-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Invoice Date</th>
                        <th>Shipping Charge</th>
                        <th>Order Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FE# <?php echo $select_invoice->order_id; ?></td>
                        <td><?php echo $select_invoice->invoice_date; ?></td>
                        <td><?php echo $select_invoice->shipping_charge; ?></td>
                        <td><?php echo $select_invoice->order_total; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>