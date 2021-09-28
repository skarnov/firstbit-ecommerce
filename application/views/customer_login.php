<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>cart/show_cart">Shopping Cart</a></li>
        <li><a href="">Checkout</a></li>
    </ul>
    <div class="row"> 
        <div class="col-sm-9">
            <h1>Login</h1>
            <div class="panel-group">
                <div class="panel panel-default"> 
                    <div class="panel-body">
                        <div class="row">
                            <form action="<?php echo base_url(); ?>login/checkout_type" method="POST">
                                <div class="col-sm-6">
                                    <h2>New Customer</h2>
                                    <p>Checkout Options:</p>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type" value="account" checked="checked">
                                            Register Account
                                        </label>
                                        <br/>
                                        <label>
                                            <input type="radio" name="type" value="order">
                                            Place Order
                                        </label>
                                    </div>
                                    <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                    <br/>
                                    <button type="submit" class="btn btn-primary">Continue</button>
                                </div>
                            </form>
                            <div class="col-sm-6">
                                <h3 style="color:red">
                                    <?php
                                    $exc = $this->session->userdata('exception');
                                    if (isset($exc)) {
                                        echo $exc;
                                        $this->session->unset_userdata('exception');
                                    }
                                    ?>
                                </h3>
                                <form action="<?php echo base_url(); ?>login/customer_login_check" method="POST">
                                    <h2>Returning Customer</h2>
                                    <p>I am a returning customer</p>
                                    <div class="form-group">
                                        <label class="control-label" for="input-email">E-Mail</label>
                                        <input type="text" name="customer_email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-password">Password</label>
                                        <input type="password" name="customer_password" value="" placeholder="Password" id="input-password" class="form-control">
                                        <a href="">Forgotten Password</a>
                                    </div>
                                    <input type="submit" value="Login" id="button-login" data-loading-text="Loading..." class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</div>