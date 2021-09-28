<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Settings</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header"></div>
            <div class="box-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Add Home Product</a></li>
                    <li><a data-toggle="tab" href="#manage">Manage Home Product </a></li>
                    <li><a data-toggle="tab" href="#mobile">Call Us</a></li>
                    <li><a data-toggle="tab" href="#terms">Terms &  Conditions</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <form action="<?php echo base_url(); ?>ecommerce/save_home_product" method="POST">
                            <h3 style="color:green">
                                <?php
                                $msg = $this->session->userdata('settings');
                                if (isset($msg)) {
                                    echo "<p style='margin-left:2%;'>$msg</p>";
                                    $this->session->unset_userdata('settings');
                                }
                                ?>
                            </h3>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Select Home Product Category</label>
                                            <select name="subcategory_id" id="subcategories" class="form-control select2" style="width: 100%;">
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
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info pull-right">Done</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="manage" class="tab-pane fade">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th>Home Product Categories</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($all_home_product as $v_home_product) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v_home_product->subcategory_name; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>ecommerce/delete_home_product/<?php echo $v_home_product->home_product_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Home Product" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="mobile" class="tab-pane fade">
                        <br/>
                        <form action="<?php echo base_url(); ?>ecommerce/update_settings" method="POST">
                            <div class="form-group col-xs-8">
                                <input type="text" name="setting" value="<?php echo $call_us->setting; ?>" class="form-control">
                                <input type="hidden" name="setting_id" value="<?php echo $call_us->setting_id; ?>">
                            </div>
                            <div class="form-group col-xs-8">
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                    <div id="terms" class="tab-pane fade">
                        <br/>
                        <form action="<?php echo base_url(); ?>ecommerce/update_settings" method="POST">
                            <div class="form-group col-xs-8">
                                <input type="text" name="setting" value="<?php echo $terms_and_conditions->setting; ?>" class="form-control">
                                <input type="hidden" name="setting_id" value="<?php echo $terms_and_conditions->setting_id; ?>">
                            </div>
                            <div class="form-group col-xs-8">
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>