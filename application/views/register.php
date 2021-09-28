<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="">Register</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <div style="background-color:red; color:white;"><?php echo validation_errors(); ?></div>
            <h3 style="color:green">
                <?php
                $msg = $this->session->userdata('save_customer');
                if (isset($msg)) {
                    echo $msg;
                    $this->session->unset_userdata('save_customer');
                }
                ?>
            </h3>
            <form action="<?php echo base_url(); ?>store/save_customer" method="POST" class="form-horizontal">
                <fieldset id="account">
                    <legend>Register Account</legend>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label" for="input-firstname">Name</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_name" placeholder="Customer Name" id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label" for="input-email">E-Mail</label>
                        <div class="col-xs-9">
                            <input type="email" name="customer_email" placeholder="E-Mail" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label" for="input-password">Password</label>
                        <div class="col-xs-9">
                            <input type="password" name="customer_password" placeholder="Password" id="input-password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label" for="input-confirm">Password Confirm</label>
                        <div class="col-xs-9">
                            <input type="password" name="confirm_password" placeholder="Password Confirm" id="input-confirm" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label" for="input-telephone">Mobile</label>
                        <div class="col-xs-9">
                            <input type="tel" name="customer_mobile" placeholder="Mobile" id="input-telephone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label" for="input-address-1">Address</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_address" placeholder="Address" id="input-address-1" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Create" class="btn btn-primary">
                    </div>
                </div>
            </form>
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
<br/>