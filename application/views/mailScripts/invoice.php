<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
            }
            .container{
                width: 595px;
                height: 842px;
                margin:0 auto;
            }
            .address{
                width: 230px;
                position: absolute;
                top: 20px;
                left: 420px;
            }
            .title{
                text-align: center;
            }
            td,th{
                padding:7px;
                font-size: 12px;
            }
            footer{
                font-size: 13px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <header>
                <div class="logo">
                    <img src="<?php echo base_url(); ?>asset/public/img/logo/logo.png" style="height: 123px; width: 190px;"/>
                </div>
                <div class="address">
                    <p>
                        <strong>Email:</strong> sales@1stbitbd.com<br/>
                        <strong>Website:</strong> www.1stbitbd.com<br/>
                        <strong>Date:</strong> 28-78-2016
                    </p>
                </div>
            </header>
            <div class="main">
                <h1 class="title">Invoice - FE# <?php echo $order_info->order_id; ?></h1>
                <div class="customer">
                    <p>
                        <strong>Name of Client:</strong> <?php echo $customer_info->customer_name; ?><br>
                        <strong>Address:</strong> <?php echo $customer_info->customer_address; ?><br>
                        <strong>Phone:</strong> <?php echo $customer_info->customer_mobile; ?><br/>
                        <strong>Email:</strong> <?php echo $customer_info->customer_email; ?>
                    </p>
                </div>
                <table  border="1" style="border-collapse: collapse;">
                    <tr>
                        <th>S.L</th>
                        <th>Name of Accessories</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    $contents = $this->cart->contents();
                    $i = 1;
                    foreach ($contents as $values) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $values['name'] . ' (Colour:- ' . $values['options']['colour'] . ') (Size:- ' . $values['options']['size'] . ')'; ?></td>
                            <td><?php echo $values['qty']; ?></td>
                            <td><?php echo $values['price']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    <tr>
                        <td colspan="4"><span style="margin-left:400px;">Subtotal: <?php echo $order_info->order_total; ?> BDT</span></td>
                    </tr>
                    <tr>
                        <td colspan="4"><span style="margin-left:400px;">Shipping: <?php echo $order_info->shipping_charge; ?> BDT</span></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <span style="margin-left:400px;">Total: 
                                <strong>
                                    <?php echo $order_info->order_total + $order_info->shipping_charge; ?> BDT
                                    <?php
                                    $payment = $order_info->order_status;
                                    if ($payment == 0) {
                                        echo '<span style="color:red">(Unpaid)</span>';
                                    } else {
                                        echo '<span style="color:green">(Paid)</span>';
                                    }
                                    ?>
                                </strong>
                            </span>
                        </td>
                    </tr>
                </table>
                <p><b>In Word:</b> <?php echo convert_number_to_words($order_info->order_total) . ' Taka Only.'; ?></p><br>
            </div><br/><br/>
            <aside>
                Quotation prepared by:<br>
                <br><br>Md. Jahid Hasan<br>
                Managing Director<br>
                Cell: 01716138136
            </aside>
            <footer>
                <p>Our Services: E-Commerce, E-Ticketing, E-Courier, Servicing(Auto Mobiles & IT Products)</p><hr>
                <address>
                    Office Address: 86/6, 5th floor(Right Side), Road # 6, Shekhertek, Mohammadpur, Dhaka-1207.<br>
                    Cell: +880 1716138136, +880 1712385066, +880 1717152797, +880 1716243607
                </address>
            </footer>
        </div>
    </body>
</html>