<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="">Payment Form</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-9">
            <h1>Payment Method</h1>
            <div class="checkout-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel_default">
                            <form action="<?php echo base_url(); ?>login/save_payment_form" method="POST">
                                <div id="payment-address" class="collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-12">
                                                <fieldset id="address">
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="payment_method" value="Bkash" checked=""> Bkash
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="payment_method" value="Bank"> Bank Transfer
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" name="payment_method" value="Cash on Delivery"> Cash on Delivery
                                                        </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-xs-12 col-xs-offset-1 col-md-8 ">
                                                <div class="form-group">
                                                    <label class="col-xs-12 control-label">Terms & Conditions</label>
                                                    <div class="col-xs-9">
                                                        <div style="border: 1px solid #e5e5e5; height: 200px; overflow: auto; padding: 10px;">
                                                            <p><?php echo $terms_and_conditions->setting; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-8 col-xs-offset-3">
                                                        <div class="checkbox">
                                                            <label style="color:red;">
                                                                <input type="checkbox" required /> Agree with the terms and conditions
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-9 col-xs-offset-3">
                                                        <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>