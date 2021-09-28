<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/manage_item"> Manage Item</a></li>
            <li class="active">Edit Item</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url(); ?>ecommerce/update_item" method="POST" name="item">
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
                                    <input type="text" name="item_name" value="<?php echo $item_info->item_name; ?>" class="form-control">
                                    <input type="hidden" name="item_id" value="<?php echo $item_info->item_id; ?>">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['item'].elements['subcategory_id'].value = '<?php echo $item_info->subcategory_id; ?>';
</script>