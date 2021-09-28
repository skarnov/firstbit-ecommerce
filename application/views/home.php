<!--Start Slider-->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-9">
        <div id="owl-demo" class="owl-carousel owl-theme">
            <?php foreach ($all_slide as $v_slide) { ?>
                <div class="item"><a href="<?php echo $v_slide->slide_url; ?>"><img src="<?php echo base_url() . $v_slide->slide_image; ?>"></a></div>
            <?php } ?>
        </div>
    </div>
    <!--Start Banner 1-->
    <div class="col-xs-12 col-md-3">
        <?php
        foreach ($all_banner as $v_banner) {
            if ($v_banner->banner_position == 1) {
                ?>
        <a href="<?php echo $v_banner->banner_link; ?>"><img src="<?php echo base_url() . $v_banner->banner_image; ?>" class="img-responsive" style="width: 100%;" /></a>
                <?php
            }
        }
        ?>
    </div>
    <!--End Banner 1-->
    <!--Start Banner 2-->
    <div class="col-xs-12 col-md-3">
        <?php
        foreach ($all_banner as $v_banner) {
            if ($v_banner->banner_position == 2) {
                ?>
                <a href="<?php echo $v_banner->banner_link; ?>"><img src="<?php echo base_url() . $v_banner->banner_image; ?>" class="img-responsive" style="width: 100%;" /></a>
                <?php
            }
        }
        ?>
    </div>
    <!--End Banner 2-->
    <!--Start Banner 3-->
    <div class="col-xs-12 col-md-3">
        <?php
        foreach ($all_banner as $v_banner) {
            if ($v_banner->banner_position == 3) {
                ?>
                <a href="<?php echo $v_banner->banner_link; ?>"><img src="<?php echo base_url() . $v_banner->banner_image; ?>" class="img-responsive" style="width: 100%;" /></a>
                <?php
            }
        }
        ?>
    </div>
    <!--End Banner 3-->
</div>
<!--End Slider-->
<!--Start Advertisement-->
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <?php
        foreach ($all_banner as $v_banner) {
            if ($v_banner->banner_position == 4) {
                ?>
        <a href="<?php echo $v_banner->banner_link; ?>"><img src="<?php echo base_url() . $v_banner->banner_image; ?>" class="img-responsive" style="width: 100%;" /></a>
                <?php
            }
        }
        ?>
    </div>
</div>
<!--End Advertisement-->
<!--Start Category Product-->
<?php
foreach ($all_home_category as $v_category) {
    ?>
    <div class="space"></div>
    <hr/>
    <div class="row home-product">
        <div class="col-xs-12 col-sm-3 col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo base_url(); ?>store/subcategory_product_listing/<?php echo $v_category->subcategory_id; ?>"><?php echo $v_category->subcategory_name; ?></a></li>
                <?php
                foreach ($select_home_item[$v_category->subcategory_id] as $v_item) {
                    ?> 
                    <li><a href="<?php echo base_url(); ?>store/item_product_listing/<?php echo $v_category->category_id; ?>/<?php echo $v_category->subcategory_id; ?>/<?php echo $v_item->item_id; ?>"><?php echo $v_item->item_name; ?></a></li>
                    <?php
                }
                ?>
                <div class="space"></div>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10">
            <?php
            foreach ($select_home_product[$v_category->subcategory_id] as $v_product) {
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
            <?php } ?>
        </div>
    </div>
<?php } ?>
<hr/>
<!--End Category Product-->
<!-- WELCOME POPUP -->
<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Welcome To 1stbit</h4>
                <small>Press The Image Where You Want To Go</small>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 item-image">
                        <a href="http://1stbitbd.com/"><img src="<?php echo base_url(); ?>asset/public/img/E.jpg" class="img-rounded" width="200" height="200"></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 item-image">
                        <a href="http://1stbitbd.com/"><img src="<?php echo base_url(); ?>asset/public/img/T.jpg" class="img-rounded" width="200" height="200"></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 item-image">
                        <a href="http://1stbitbd.com/"><img src="<?php echo base_url(); ?>asset/public/img/C.jpg" class="img-rounded" width="200" height="200"></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 item-image">
                        <a href="http://1stbitbd.com/"><img src="<?php echo base_url(); ?>asset/public/img/H.jpg" class="img-rounded" width="200" height="200"></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-success" onclick="removeWishlist();">Continue with Ecommerce</button>
            </div>
        </div>
    </div>
</div>
<!-- END WELCOME POPUP -->
<script>
    // Start Slider
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: false, // Show next and prev buttons
            autoPlay: 3000,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true
        });
    });
    // End Slider
    // Welcome POPUP
    $(window).load(function () {
        $('#welcome').modal('show');
    });
    // End Welcome POPUP
</script>