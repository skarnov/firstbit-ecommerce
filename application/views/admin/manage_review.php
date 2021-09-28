<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Review
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Review</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Review Title</th>
                            <th>Review</th>
                            <th>Rating</th>
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
                        foreach ($all_review as $v_review) {
                            ?>
                            <tr>
                                <td><?php echo $v_review->customer_name; ?></td>
                                <td><?php echo $v_review->product_name; ?></td>
                                <td><?php echo $v_review->review_title; ?></td>
                                <td><?php echo $v_review->review; ?></td>
                                <td><?php echo $v_review->review_rating; ?></td>
                                <?php
                                $admin_type = $this->session->userdata('admin_type');
                                if ($admin_type == '1') {
                                    ?>
                                    <td>
                                        <a href="<?php echo base_url(); ?>ecommerce/delete_review/<?php echo $v_review->review_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Review" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>