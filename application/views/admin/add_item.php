<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_item"> Manage Item</a></li>
            <li class="active">Add New Item</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_item');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_item');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>ecommerce/save_item" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Subcategory</label>
                                        <select name="subcategory_id" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Subcategory</option>
                                            <?php
                                            foreach ($all_subcategory as $v_subcategory) {
                                                ?>
                                                <option value="<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" name="item_name" class="form-control">
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