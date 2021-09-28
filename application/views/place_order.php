<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="">Place Order</a></li>
    </ul>
    <div class="row">
        <div class="col-xs-12">
            <h1>Place Order</h1>
            <form action="<?php echo base_url(); ?>login/save_place_order" method="POST" class="form-horizontal">
                <fieldset class="col-xs-12 col-md-5" id="customer">
                    <legend>Basic Information</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="customer_name" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-10">
                            <input type="tel" name="customer_mobile" placeholder="Mobile" class="form-control">
                        </div>
                    </div>
                    <br/>
                    <legend>Shipping Address</legend>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_name" placeholder="Name" id="input-firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="shipping_email" placeholder="E-Mail" id="input-email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Mobile</label>
                        <div class="col-sm-10">
                            <input type="tel" name="shipping_mobile" placeholder="Mobile" id="input-telephone" class="form-control">
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
                                <option value="<?php echo 'Inside Dhaka:  ' . $this->session->userdata('inside_dhaka'); ?>">Inside Dhaka</option>
                                <option value="<?php echo 'Outside Dhaka: ' . $this->session->userdata('outside_dhaka'); ?>">Outside Dhaka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-address-1">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="shipping_address" placeholder="Address" id="input-address-1" class="form-control">
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
                <fieldset class="col-xs-12 col-md-7" id="payment">
                    <legend>Payment Method</legend>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label class="control-label">
                                <input type="radio" name="payment_method" value="Bkash" checked=""> Bkash
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <input type="radio" name="payment_method" value="Bank"> Bank Transfer
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <input type="radio" name="payment_method" value="Cash on Delivery"> Cash on Delivery
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label class="col-xs-12 control-label">Terms & Conditions</label>
                            <div class="col-xs-12">
                                <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                                    <p><?php echo $terms_and_conditions->setting; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="checkbox">
                                    <label style="color:red;">
                                        <input type="checkbox" required /> Agree with the terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" value="Place Order" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br/>