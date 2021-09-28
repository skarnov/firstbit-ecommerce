<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>ecommerce/add_item">Add New Item</a></li>
            <li class="active">Manage Item</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Subcategory Name</th>
                            <th>Item Name</th>
                            <?php
                            $admin_type = $this->session->userdata('admin_type');
                            if ($admin_type == '1') {
                                ?>
                                <th>Action</th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_item as $v_item) {
                            ?>
                            <tr>
                                <td><?php echo $v_item->subcategory_name; ?></td>
                                <td><?php echo $v_item->item_name; ?></td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/edit_item/<?php echo $v_item->item_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Item"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_item/<?php echo $v_item->item_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Item" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>