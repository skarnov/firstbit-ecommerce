<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Coupon
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_coupon"> Manage Coupon</a></li>
            <li class="active">Add New Coupon</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_coupon');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_coupon');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>ecommerce/save_coupon" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Coupon Code</label>
                                    <input type="text" name="coupon_code" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Coupon Amount</label>
                                    <input type="number" name="coupon_amount" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Coupon Validity</label>
                                    <input type="text" name="coupon_validity" value="<?php echo date("d-m-Y"); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Status</label>
                                        <select name="coupon_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Coupon Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>