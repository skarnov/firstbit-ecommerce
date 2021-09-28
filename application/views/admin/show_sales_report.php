<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Sales Report Sheet
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/sales_report"> Search Sales Report</a></li>
            <li class="active">Download Expense Report Sheet</li>
        </ol>
    </section>
    <section class="content">
        <?php
        if ($sales_report == !NULL) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="col-xs-12">
                            <div class="box-body">
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url(); ?>ecommerce/download_sales_report/<?php echo $start ?>/<?php echo $end ?>" class="btn btn-success">Download PDF</a>
                                </div>
                                <div class="col-xs-12">
                                    <table class="table">
                                        <div class="text-center">
                                            <h3 text-center>Sales Report</h3>
                                            <h4>(Sales Report From <?php echo $start ?> To <?php echo $end ?>)</h4><hr/>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Sale ID</th>
                                                <th>Sale Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($sales_report as $v_info) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $v_info->invoice_date; ?></td>
                                                    <td><?php echo $v_info->customer_name; ?></td>
                                                    <td><?php echo $v_info->order_id; ?></td>
                                                    <td><?php echo $v_info->order_total; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr/>
                                    <h4 style="text-align: center;">Total Amount : <?php echo $total_amount->total; ?></h4>
                                </div> 
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h3 style="color:red">No Record Found in This Date</h3>
        <?php } ?>
    </section>
</div>