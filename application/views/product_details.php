<link href="<?php echo base_url(); ?>asset/public/plugin/bzoom/jqzoom.css" rel="stylesheet">
<div class="row">
    <div class="col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="<?php echo base_url(); ?>store/category_product_listing/<?php echo $product_info->category_id; ?>"><?php echo $product_info->category_name; ?></a></li>
            <li><a href="<?php echo base_url(); ?>store/subcategory_product_listing/<?php echo $product_info->subcategory_id; ?>"><?php echo $product_info->subcategory_name; ?></a></li>
            <li><a href="<?php echo base_url(); ?>store/item_product_listing/<?php echo $product_info->category_id; ?>/<?php echo $product_info->subcategory_id; ?>/<?php echo $product_info->item_id; ?>"><?php echo $product_info->item_name; ?></a></li>
            <li class="active"><?php echo $product_info->product_name; ?></li>
        </ol>
    </div>
    <div class="col-xs-12 col-md-3">
        <div class="special-product">
            <h3 class="btn btn-success btn-lg">You May Like Also</h3>
            <br/><br/>
            <?php
            foreach ($special_product as $v_product) {
                ?>
                <div class="col-xs-12 special-product">
                    <br/><br/>
                    <div class="col-xs-12">
                        <div class="thumbnail">
                            <div class="add-to">
                                <h5 style="color: purple;"><?php echo $v_product->product_name; ?></h5>
                                <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>" class="btn btn-warning" style="margin-top: 2%;">Details</a>
                            </div>
                            <a href="<?php echo base_url(); ?>store/product_details/<?php echo $v_product->product_id; ?>">
                                <img src="<?php echo base_url() . $v_product->product_image_0; ?>" class="img-responsive" style="height: 156px;">
                            </a>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="col-xs-12 col-md-9">
        <div class="col-xs-12 col-md-5" style="height: 505px; border-left: 1px solid black;">
            <div class="col-xs-12 img-responsive">
                <div class="bzoom_wrap">
                    <ul id="bzoom">
                        <li>
                            <img class="bzoom_thumb_image" src="<?php echo base_url() . $product_info->product_image_0; ?>" />
                            <img class="bzoom_big_image" src="<?php echo base_url() . $product_info->product_image_0; ?>"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="<?php echo base_url() . $product_info->product_image_1; ?>" />
                            <img class="bzoom_big_image" src="<?php echo base_url() . $product_info->product_image_1; ?>"/>
                        </li>                
                        <li>
                            <img class="bzoom_thumb_image" src="<?php echo base_url() . $product_info->product_image_2; ?>" />
                            <img class="bzoom_big_image" src="<?php echo base_url() . $product_info->product_image_2; ?>"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="<?php echo base_url() . $product_info->product_image_3; ?>" />
                            <img class="bzoom_big_image" src="<?php echo base_url() . $product_info->product_image_3; ?>"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="<?php echo base_url() . $product_info->product_image_4; ?>" />
                            <img class="bzoom_big_image" src="<?php echo base_url() . $product_info->product_image_4; ?>"/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <div class="product-name"><h3><?php echo $product_info->product_name; ?></h3></div>
            <div class="col-xs-12">
                <hr/>
                <span style="color: #f96d10; font-size: 25px;">&#2547; <?php echo $product_info->product_price; ?></span><br/> <span class="line-through" style="text-decoration: line-through;"><?php echo $product_info->product_old_price; ?></span>
                <hr/>
            </div>
            <div class="col-xs-12">
                <div class="rating">
                    <p>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                    </p>
                    <a href="" onclick=""><?php echo count($review); ?> reviews</a> / <a href="" onclick="">Write a review</a>
                    <br/><br/>
                    <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_facebook_like at300b" fb:like:layout="button_count">
                            <div class="fb-like fb_iframe_widget" data-layout="button_count" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-height="25" data-font="arial" data-href="http://ogence2.demo.towerthemes.com/index.php?route=product/product&amp;product_id=53" data-send="false" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=172525162793917&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=http%3A%2F%2Fogence2.demo.towerthemes.com%2Findex.php%3Froute%3Dproduct%2Fproduct%26product_id%3D53&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90">
                                <span style="vertical-align: bottom; width: 79px; height: 20px;"><iframe name="fb15fca5f385b" width="90px" height="25px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.6/plugins/like.php?action=like&amp;app_id=172525162793917&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FLcj5EtQ5qmD.js%3Fversion%3D42%23cb%3Dfeadfdcd6edd7%26domain%3Dogence2.demo.towerthemes.com%26origin%3Dhttp%253A%252F%252Fogence2.demo.towerthemes.com%252Ff1de24a79f958a4%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;height=25&amp;href=http%3A%2F%2Fogence2.demo.towerthemes.com%2Findex.php%3Froute%3Dproduct%2Fproduct%26product_id%3D53&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" style="border: none; visibility: visible; width: 79px; height: 20px;"></iframe></span>
                            </div>
                        </a>        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <div class="col-xs-12 product-info" style="line-height: 11px;">
                <hr/>
                <?php
                if ($product_info->brand_id != 0) {
                    ?>
                    <p><b>Brand:</b> <?php echo $brand_info->brand_name; ?></p>
                    <?php
                }
                ?>
                <p><b>Code:</b> <?php echo $product_info->product_code; ?></p>
                <p><b>Delivery Time:</b> <?php echo $product_info->delivery_time; ?></p>
                <p><b>Delivery Area:</b> <?php echo $product_info->delivery_area; ?></p>
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <div class="col-xs-12">
                <p><b>Delivery Charge:</b> Inside Dhaka: <?php echo $product_info->delivery_charge_inside; ?> BDT & Outside Dhaka <?php echo $product_info->delivery_charge_outside; ?> BDT</p>
            </div>
        </div>
        <?php
        if ($product_info->color != 0 && $product_info->size != 0) {
            ?>
            <div class="col-xs-12 col-md-7">
                <hr/>
                <?php
                if ($product_info->color != 0) {
                    ?>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <select id="color" class="form-control">
                                <option value="Default">Select Color</option>
                                <?php
                                $product_color = explode(",", $product_info->color);
                                foreach ($product_color as $v_color) {
                                    echo "<option value='$v_color'>" . $v_color . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                }
                if ($product_info->size != 0) {
                    ?>
                    <div class="col-xs-12 col-md-6">    
                        <div class="form-group">
                            <select id="size" class="form-control">
                                <option value="Default">Select Size</option>
                                <?php
                                $product_size = explode(",", $product_info->size);
                                foreach ($product_size as $v_size) {
                                    echo "<option value='$v_size'>" . $v_size . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
        <?php
        if ($product_info->extra_information != NULL) {
            ?>
            <div class="col-xs-12 col-md-7 col-md-offset-5">
                <hr/>
                <?php echo $product_info->extra_information; ?>
                <hr/>
            </div>        
            <?php
        }
        ?>
        <div class="col-xs-12 col-md-7 col-md-offset-5">
            <div class="col-xs-12 col-md-3">
                <div class="form-group">
                    <input type="hidden" id="product_id" value="<?php echo $product_info->product_id; ?>">
                    <input type="number" id="qty" value="1" id="input-quantity" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-md-9">
                <div class="form-group">
                    <button type="button" class="btn btn-success col-xs-5" data-toggle="modal" data-target="#addCart" onclick="addToCartAttribute();"><i class="fa fa-shopping-cart"></i> Buy</button>
                    <?php
                    $customer_name = $this->session->userdata('customer_name');
                    if ($customer_name == NULL) {
                        ?>
                        <button type="button" class="btn btn-danger col-xs-5 col-xs-offset-1" onclick="login();"><i class="fa fa-heart"></i> Wish</button>
                        <?php
                    } else {
                        ?>
                        <button type="button" class="btn btn-danger col-xs-5 col-xs-offset-1" data-toggle="modal" data-target="#addWish" onclick="addToWishlist(<?php echo $product_info->product_id; ?>);"><i class="fa fa-heart"></i> Wish</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-12">
                <div class="tab-view">
                    <ul class="nav nav-tabs">
                        <br/>
                        <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                        <li class=""><a href="#tab-review" data-toggle="tab">Reviews (<?php echo count($review); ?>)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-description">
                            <br/>
                            <?php echo $product_info->product_description; ?>
                        </div>
                        <div class="tab-pane" id="tab-review">
                            <br/>
                            <form action="<?php echo base_url(); ?>store/save_review" method="POST" class="form-horizontal">
                                <?php
                                if ($review == NULL) {
                                    ?>
                                    <div id="review"><p>There are no reviews for this product.</p></div>
                                    <?php
                                } else {
                                    foreach ($review as $v_review) {
                                        ?> 
                                        <div class="col-xs-12" style="border-bottom: 1px solid purple;">
                                            <div class="post-heading">
                                                <div class="pull-left meta">
                                                    <div class="title h5">
                                                        <h3><b><?php echo $v_review->customer_name; ?></b></h3><br/>
                                                        <p><?php echo $v_review->review_title; ?></p><br/>
                                                        <?php echo $v_review->review; ?>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <br/><br/>
                                        <?php
                                    }
                                }
                                ?>
                                <h2>Write a review</h2>
                                <div class="form-group required">
                                    <div class="col-xs-12">
                                        <label class="control-label">Review Title</label>
                                        <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>" class="form-control">
                                        <input type="text" name="review_title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-xs-12">
                                        <label class="control-label">Review</label>
                                        <textarea name="review" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-xs-12">
                                        <strong>Bad</strong>
                                        <input name="review_rating" type="radio" value="1">
                                        <input name="review_rating" type="radio" value="2">
                                        <input name="review_rating" type="radio" value="3">
                                        <input name="review_rating" type="radio" value="4">
                                        <input name="review_rating" type="radio" value="5">
                                        <strong>Excellent</strong>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-danger">Submit</button>
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
<script type="text/javascript" src="<?php echo base_url(); ?>asset/public/plugin/bzoom/jqzoom.js"></script>
<script type="text/javascript">
    $("#bzoom").zoom({
        zoom_area_width: 300,
        autoplay_interval: 3000,
        small_thumbs: 4,
        autoplay: false
    });
</script>