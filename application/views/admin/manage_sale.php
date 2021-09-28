<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Sale
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>super_admin/sales_report">Sales Report</a></li>
            <li class="active">Manage Sale</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header"></div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Sale Amount</th>
                            <th>Sale Date</th>
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
                        foreach ($all_sale as $v_sale) {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->customer_name; ?></td>
                                <td><?php echo $v_sale->order_total; ?></td>
                                <td><?php echo $v_sale->invoice_date; ?></td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/invoice/<?php echo $v_sale->order_id; ?>/<?php echo $v_sale->customer_id; ?>/<?php echo $v_sale->shipping_id; ?>/<?php echo $v_sale->payment_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Invoice"><i class="fa fa-envelope"></i></a>
                                        <a href="<?php echo base_url(); ?>super_admin/delete_sale/<?php echo $v_sale->order_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sale" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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