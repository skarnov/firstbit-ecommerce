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
                <?php
                function convert_number_to_words($number) {
                    $hyphen = '-';
                    $conjunction = ' and ';
                    $separator = ', ';
                    $negative = 'negative ';
                    $decimal = ' point ';
                    $dictionary = array(
                        0 => 'zero',
                        1 => 'one',
                        2 => 'two',
                        3 => 'three',
                        4 => 'four',
                        5 => 'five',
                        6 => 'six',
                        7 => 'seven',
                        8 => 'eight',
                        9 => 'nine',
                        10 => 'ten',
                        11 => 'eleven',
                        12 => 'twelve',
                        13 => 'thirteen',
                        14 => 'fourteen',
                        15 => 'fifteen',
                        16 => 'sixteen',
                        17 => 'seventeen',
                        18 => 'eighteen',
                        19 => 'nineteen',
                        20 => 'twenty',
                        30 => 'thirty',
                        40 => 'fourty',
                        50 => 'fifty',
                        60 => 'sixty',
                        70 => 'seventy',
                        80 => 'eighty',
                        90 => 'ninety',
                        100 => 'hundred',
                        1000 => 'thousand',
                        1000000 => 'million',
                        1000000000 => 'billion',
                        1000000000000 => 'trillion',
                        1000000000000000 => 'quadrillion',
                        1000000000000000000 => 'quintillion'
                    );
                    if (!is_numeric($number)) {
                        return false;
                    }
                    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
                        // overflow
                        trigger_error(
                                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING
                        );
                        return false;
                    }
                    if ($number < 0) {
                        return $negative . convert_number_to_words(abs($number));
                    }
                    $string = $fraction = null;
                    if (strpos($number, '.') !== false) {
                        list($number, $fraction) = explode('.', $number);
                    }
                    switch (true) {
                        case $number < 21:
                            $string = $dictionary[$number];
                            break;
                        case $number < 100:
                            $tens = ((int) ($number / 10)) * 10;
                            $units = $number % 10;
                            $string = $dictionary[$tens];
                            if ($units) {
                                $string .= $hyphen . $dictionary[$units];
                            }
                            break;
                        case $number < 1000:
                            $hundreds = $number / 100;
                            $remainder = $number % 100;
                            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                            if ($remainder) {
                                $string .= $conjunction . convert_number_to_words($remainder);
                            }
                            break;
                        default:
                            $baseUnit = pow(1000, floor(log($number, 1000)));
                            $numBaseUnits = (int) ($number / $baseUnit);
                            $remainder = $number % $baseUnit;
                            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                            if ($remainder) {
                                $string .= $remainder < 100 ? $conjunction : $separator;
                                $string .= convert_number_to_words($remainder);
                            }
                            break;
                    }
                    if (null !== $fraction && is_numeric($fraction)) {
                        $string .= $decimal;
                        $words = array();
                        foreach (str_split((string) $fraction) as $number) {
                            $words[] = $dictionary[$number];
                        }
                        $string .= implode(' ', $words);
                    }
                    return $string;
                }
                ?>
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