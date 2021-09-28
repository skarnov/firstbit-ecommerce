<div class="container">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <?php
        if (isset($category_name)) {
            ?>
            <li><a href="<?php echo base_url(); ?>store/category_product_listing/<?php echo $category_name->category_id; ?>"><?php echo $category_name->category_name; ?></a></li>
            <?php
        }
        ?>
        <?php
        if (isset($subcategory_name)) {
            ?>
            <li><a href="<?php echo base_url(); ?>store/subcategory_product_listing/<?php echo $subcategory_name->subcategory_id; ?>"><?php echo $subcategory_name->subcategory_name; ?></a></li>
            <?php
        }
        ?>
        <?php
        if (isset($item_name)) {
            ?>
            <li class="active"><?php echo $item_name->item_name; ?></li>
            <?php
        }
        ?>
    </ul>
    <div class="row">
        <div class="col-xs-12 col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="active"><a href="#">See More</a></li>
                <?php
                if ($select_home_item != NULL) {
                    foreach ($select_home_item as $v_item) {
                        ?> 
                        <li><a href="<?php echo base_url(); ?>store/item_product_listing/<?php echo $category_name->category_id; ?>/<?php echo $subcategory_name->subcategory_id; ?>/<?php echo $v_item->item_id; ?>"><?php echo $v_item->item_name; ?></a></li>
                        <?php
                    }
                }
                ?>
                <?php
                if ($select_home_item == NULL) {
                    foreach ($select_subcategory as $v_subcategory) {
                        ?> 
                        <li><a href="<?php echo base_url(); ?>store/subcategory_product_listing/<?php echo $v_subcategory->subcategory_id; ?>"><?php echo $v_subcategory->subcategory_name; ?></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10">
            <?php
            foreach ($product_listing as $v_product) {
                ?>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <div class="add-to">
                            <button type="button" class="btn btn-success cart-button" data-toggle="modal" data-target="#addCart" onclick="addToCart(<?php echo $v_product->product_id; ?>);">Buy</button>
                            <?php
                            $customer_name = $this->session->userdata('customer_name');
                            if ($customer_name == NULL) {
                                ?>
                            <button type="button" class="btn btn-danger cart-button" onclick="login();">Wish</button>
                                <?php
                            } else {
                                ?>
                                <button type="button" class="btn btn-danger cart-button" data-toggle="modal" data-target="#addWish" onclick="addToWishlist(<?php echo $v_product->product_id; ?>);">Wish</button>
                                <?php
                            }
                            ?>
                            <div class="space"></div>
                            <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>" class="btn btn-warning">Details</a>
                        </div>
                        <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                            <img src="<?php echo base_url() . $v_product->product_image_0; ?>" class="img-responsive" style="height: 156px;">
                        </a>
                        <div class="caption">
                            <div class="row" style="height:60px;">
                                <div class="col-xs-12">
                                    <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                                        <h5><?php echo $v_product->product_name; ?></h5>
                                    </a>
                                </div>
                            </div>
                            <div style="height:31px;">
                                <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                                    <span class="" style="color: #8C8C8C; text-decoration: line-through;">&#2547; <?php echo $v_product->product_old_price; ?></span>
                                    <span class="" style="color: #f96d10;">&#2547; <?php echo $v_product->product_price; ?></span>
                                </a>
                            </div>
                            <br/>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Start Pagination Area -->
        <div class="col-xs-12" style="padding:3%;">
            <!-- Start Pagination -->
            <form name="pagination">
                <?php
                $number_of_pages = ceil($total_product / $limit);
                ?>
                <div class="col-xs-2">
                    <?php if (($start - $limit) >= 0) { ?>
                        <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>" class='btn btn-sm btn-success'><</a>
                        <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start - $limit); ?>" class='btn btn-sm btn-success'><<</a>
                    <?php } ?>
                </div>
                <div class='col-xs-8'>
                    <?php for ($i = 0; $i < $number_of_pages;) { ?>
                        <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($i * $limit); ?>" class='btn btn-sm btn-warning <?php
                        if ($start == ($i * $limit)) {
                            echo "btn-danger";
                        }
                        ?>'><?php echo ++$i; ?> </a>
                       <?php } ?>
                </div>
                <div class="col-xs-2">
                    <?php if ($start + $limit < $total_product) { ?>
                        <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start + $limit); ?>" class='btn btn-sm btn-default'>></a>
                        <a href="<?php echo base_url(); ?>store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . (($number_of_pages - 1) * $limit); ?>" class='btn btn-sm btn-success'>>></a>
                    <?php } ?>
                </div>
                <script type="text/javascript">
                    document.forms['pagination'].elements['per_page'].value = '<?php echo $limit ?>';
                </script>
            </form>
            <!-- End Pagination -->
        </div>
        <!-- End Pagination Area -->
    </div>
</div>