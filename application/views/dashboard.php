<style>
    .panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-globe"></span> Dashboard
                    </h3>
                </div>
                <div class="panel-body" style="padding:5%;">
                    <div class="row">
                        <div class="col-xs-12 col-md-9">
                            <a href="<?php echo base_url(); ?>cart/show_cart" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> <br/>My Cart</a>
                            <a href="<?php echo base_url(); ?>wishlist/show_wishlist" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-heart"></span> <br/>My Wishlist</a>
                            <a href="<?php echo base_url(); ?>customer/my_order" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>My Orders</a>
                            <a href="<?php echo base_url(); ?>customer/order_history" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-folder-close"></span> <br/>History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-9">
            <h3 style="color:green">
                <?php
                $msg = $this->session->userdata('save_customer');
                if (isset($msg)) {
                    echo $msg;
                    $this->session->unset_userdata('save_customer');
                }
                ?>
            </h3>
            <form action="<?php echo base_url(); ?>customer/update_customer" method="POST" class="form-horizontal">
                <fieldset id="account">
                    <legend>Update Your Details</legend>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">Name</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_name" value="<?php echo $customer->customer_name; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">E-Mail</label>
                        <div class="col-xs-9">
                            <input type="email" name="customer_email" value="<?php echo $customer->customer_email; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Current Password</label>
                        <div class="col-xs-9">
                            <input type="password" name="customer_password" placeholder="Enter Current Password" id="input-password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">New Password</label>
                        <div class="col-xs-9">
                            <input type="password" name="confirm_password" placeholder="Enter New Password" id="input-confirm" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Confirm New Password</label>
                        <div class="col-xs-9">
                            <input type="password" name="confirm_password" placeholder="Confirm Password" id="input-confirm" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Mobile</label>
                        <div class="col-xs-9">
                            <input type="tel" name="customer_mobile"  value="<?php echo $customer->customer_mobile; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-xs-3 control-label">Address</label>
                        <div class="col-xs-9">
                            <input type="text" name="customer_address" value="<?php echo $customer->customer_address; ?>" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>  
    </div>
</div>
<br/>