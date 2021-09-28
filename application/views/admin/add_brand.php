<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Brand
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_brand"> Manage Brand</a></li>
            <li class="active">Add New Brand</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_brand');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_brand');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>ecommerce/save_brand" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Item</label>
                                        <select name="item_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Item</option>
                                            <?php
                                            foreach ($all_item as $v_item) {
                                                ?>
                                                <option value="<?php echo $v_item->item_id; ?>"><?php echo $v_item->item_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control">
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