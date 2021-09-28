<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>customer">Dashboard</a></li>
        <li><a href="">Shopping Cart</a></li>
    </ul>
    <div class="row">   
        <div id="content" class="col-sm-12">
            <h1>Shopping Cart</h1>
            <br/>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contents = $this->cart->contents();
                        foreach ($contents as $v_contents) {
                            ?>
                            <tr>
                                <td class="text-center" style="width: 200px; height: 100px;"> 
                                    <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_contents['id']; ?>"><img src="<?php echo base_url() . $v_contents['image']; ?>" class="img-thumbnail"></a>
                                </td>
                                <td class="text-left">
                                    <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_contents['id']; ?>">
                                        <?php echo $v_contents['name']; ?>
                                        <br/>
                                        <?php
                                        if ($v_contents['options'] !== NULL) {
                                            ?>
                                            <small>Color : <?php echo $v_contents['options']['colour']; ?></small>,
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if ($v_contents['options']['size'] !== NULL) {
                                            ?>
                                            <small>Size : <?php echo $v_contents['options']['size']; ?></small>
                                            <?php
                                        }
                                        ?>
                                    </a>
                                </td>
                                <td class="text-left">
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        <form action="<?php echo base_url(); ?>cart/update_cart" method="POST">
                                            <input type="hidden"  value="<?php echo $v_contents['rowid']; ?>" name="rowid"/>
                                            <input type="number" name="product_quantity" value="<?php echo $v_contents['qty']; ?>" class="form-control" style="width: 60px;">
                                            &nbsp;<button type="submit" class="btn btn-primary form-group" title="Update"><i class="fa fa-refresh"></i></button>
                                            <a href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>" title="Remove" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                        </form>
                                    </div>
                                </td>
                                <td class="text-right"><?php echo $v_contents['price']; ?></td>
                                <td class="text-right"><?php echo $v_contents['subtotal']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
            $amount = $this->session->userdata('coupon_amount');
            $total = $this->cart->total();
            $grand_total = $total - $amount;
            $sdata = array();
            $sdata['grand_total'] = $grand_total;
            $this->session->set_userdata($sdata);
            ?>
            <div class="row">
                <div class="col-xs-6 pull-right">
                    <form action="<?php echo base_url(); ?>store/coupon_check" method="POST" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="coupon_code" placeholder="Enter your coupon here" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Apply Coupon</button>
                    </form><br/>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="text-right"><strong>Sub-Total:</strong></td>
                                    <td class="text-right"><?php echo $total; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Coupon:</strong></td>
                                    <td class="text-right"><?php echo $amount; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Shipping Charge:</strong></td>
                                    <td class="text-right">Inside Dhaka <b><?php echo $this->session->userdata('inside_dhaka'); ?></b> And Outside Dhaka <b><?php echo $this->session->userdata('outside_dhaka'); ?></b></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Total:</strong></td>
                                    <td class="text-right"><?php echo $grand_total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <div class="pull-left"><a href="javascript:history.go(-1)" class="btn btn-success">Continue Shopping</a></div>
                <?php
                if ($grand_total > 0) {
                    ?>
                    <div class="pull-right"><a href="<?php echo base_url(); ?>checkout" class="btn btn-primary">Checkout</a></div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<br/>