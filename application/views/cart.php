<?php
    $amount = $this->session->userdata('coupon_amount');
    $total = $this->cart->total();
    $grand_total = $total - $amount;
    $sdata = array();
    $sdata['grand_total'] = $grand_total;
    $this->session->set_userdata($sdata);
?>
<li class="dropdown" style="list-style-type: none;">
    <span>SHOPPING CART</span><br/>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span><?php echo $rows = count($this->cart->contents()); ?>  Items- &#2547; <?php echo $grand_total; ?></span></a>
    <ul class="dropdown-menu dropdown-cart" role="menu">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contents = $this->cart->contents();
                foreach ($contents as $v_contents) {
                    ?>
                    <tr>
                        <td><img src="<?php echo base_url() . $v_contents['image']; ?>" style="height: 50px; width: 50px;"/></td>
                        <td><?php echo $v_contents['name']; ?></td>
                        <td><?php echo $v_contents['price']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <li><a class="text-center" href="<?php echo base_url(); ?>cart/show_cart">View Cart</a></li>
    </ul>
</li>