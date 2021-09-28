<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li class="active">Product Search</li>
    </ul>
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 special-product">
            <h3 class="btn btn-success btn-lg">Special Products</h3>
            <br/><br/>
            <?php
            foreach ($special_product as $v_product) {
                ?>
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="thumbnail">
                        <div class="add-to">
                            <h5 style="color: purple;"><?php echo $v_product->product_name; ?></h5>
                            <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>" class="btn btn-warning" style="margin-top: 2%;">Details</a>
                        </div>
                        <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                            <img src="<?php echo base_url() . $v_product->product_image_0; ?>" class="img-responsive" style="height: 156px;">
                        </a>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9">
            <?php
            foreach ($search_product as $v_product) {
                ?>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <div class="add-to">
                            <button type="button" class="btn btn-success cart-button" data-toggle="modal" data-target="#addCart" onclick="addToCart(<?php echo $v_product->product_id; ?>);">Buy</button>
                            <?php
                            $customer_name = $this->session->userdata('customer_name');
                            if ($customer_name == NULL) {
                                ?>
                            <button type="button" class="btn btn-danger cart-button" onclick="login();">Wish</button>
                                <?php
                            } else {
                                ?>
                                <button type="button" class="btn btn-danger cart-button" data-toggle="modal" data-target="#addWish" onclick="addToWishlist(<?php echo $v_product->product_id; ?>);">Wish</button>
                                <?php
                            }
                            ?>
                            <div class="space"></div>
                            <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>" class="btn btn-warning">Details</a>
                        </div>
                        <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                            <img src="<?php echo base_url() . $v_product->product_image_0; ?>" class="img-responsive" style="height: 156px;">
                        </a>
                        <div class="caption">
                            <div class="row" style="height:60px;">
                                <div class="col-xs-12">
                                    <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                                        <h5><?php echo $v_product->product_name; ?></h5>
                                    </a>
                                </div>
                            </div>
                            <div style="height:31px;">
                                <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                                    <span class="" style="color: #8C8C8C; text-decoration: line-through;">&#2547; <?php echo $v_product->product_old_price; ?></span>
                                    <span class="" style="color: #f96d10;">&#2547; <?php echo $v_product->product_price; ?></span>
                                </a>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>