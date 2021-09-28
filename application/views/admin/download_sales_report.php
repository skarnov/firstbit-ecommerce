<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                height: 842px;
                width: 595px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>

    <body>
        <div>
            <center>
                <table>
                    <tr>
                        <td><img src="<?php echo base_url(); ?>asset/public/img/logo/logo.png" style="width:100px; height:80px;"/></td>
                        <td style="width:400px;">
                            <div>
                                <h3 style="margin:0; text-align: center">Sales Report</h3>
                                <h4 style="margin:0; text-align: center">(Sales Report From <?php echo $start ?> To <?php echo $end ?>)</h4>
                            </div>
                        </td>
                    </tr><br/>
                </table>
                <br/>
                <table align="center" style="width:595px;">
                    <thead>
                        <tr>
                            <th style="border:1px solid black;">Date</th>
                            <th style="border:1px solid black;">Customer Name</th>
                            <th style="border:1px solid black;">Sale ID</th>
                            <th style="border:1px solid black;">Sale Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sales_report as $v_info) {
                            ?>
                            <tr>
                                <td style="border:1px solid black;"><?php echo $v_info->invoice_date; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_info->customer_name; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_info->order_id; ?></td>
                                <td style="border:1px solid black;"><?php echo $v_info->order_total; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table><br/><br/>
                <p style="margin:0;">Total Amount : <?php echo $total_amount->total; ?></p>
            </center>
        </div>       
    </body>
</html>