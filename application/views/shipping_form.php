<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="">Shipping Form</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>Shipping Form</h1>
            <form action="<?php echo base_url(); ?>checkout/save_shipping_form" method="POST" class="form-horizontal">
                <fieldset id="account">
                    <legend>Enter Your Shipping Address. Edit This If You Need</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_name" value="<?php echo $shipping_info->customer_name; ?>" placeholder="Name" id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="shipping_email" value="<?php echo $shipping_info->customer_email; ?>" placeholder="E-Mail" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Mobile</label>
                        <div class="col-sm-10">
                            <input type="tel" name="shipping_mobile" value="<?php echo $shipping_info->customer_mobile; ?>" placeholder="Mobile" id="input-telephone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Alternate Mobile</label>
                        <div class="col-sm-10">
                            <input type="tel" name="shipping_mobile_2" placeholder="Alternate Mobile" id="input-telephone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Location</label>
                        <div class="col-sm-10">
                            <select name="shipping_charge" class="form-control select2" style="width: 100%;">
                                <option value="<?php echo 'Inside Dhaka:  '. $this->session->userdata('inside_dhaka'); ?>">Inside Dhaka</option>
                                <option value="<?php echo 'Outside Dhaka: '. $this->session->userdata('outside_dhaka'); ?>">Outside Dhaka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-1">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_address" value="<?php echo $shipping_info->customer_address; ?>" placeholder="Address" id="input-address-1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Landmark</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_landmark" placeholder="Some near by place name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label">Special Note</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_note" placeholder="Instruction" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Done" class="btn btn-primary">
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