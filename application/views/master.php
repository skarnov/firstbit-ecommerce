<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <!-- Start CSS -->
        <link href="<?php echo base_url(); ?>asset/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/public/css/style.css" rel="stylesheet">
        <!-- Important Owl Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/plugin/owl-carousel/owl.carousel.css">
        <!-- Default Theme -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/public/plugin/owl-carousel/owl.theme.css">
        <!-- End Owl Stylesheet -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- End CSS -->
        <!-- Start jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/public/js/bootstrap.min.js"></script>
        <!-- Include JS Plugin -->
        <script src="<?php echo base_url(); ?>asset/public/plugin/owl-carousel/owl.carousel.js"></script>
        <!-- End JS Plugin -->
        <!-- End jQuery -->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!--Start Container-->
        <div class="container-fluid">
            <!--Start Top Nav-->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse account">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ecommerce <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="http://eticket.1stbitbd.com" target="_blank"><img src="<?php echo base_url(); ?>asset/public/img/bit.png"/>E- Ticket</a></li>
                                    <li><a href="http://ecourier.1stbitbd.com"><img src="<?php echo base_url(); ?>asset/public/img/bit.png"/>E- Courier</a></li>
                                    <li><a href="http://eservice.1stbitbd.com"><img src="<?php echo base_url(); ?>asset/public/img/bit.png"/>E - Service</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav update">
                            <li><a href=""><b>Recent News: </b></a></li>
                            <li><a href="" style="font-weight: bold;"><marquee class="news" behavior="scroll" direction="left"><?php echo $all_news->news_title; ?></marquee></a></li>
                        </ul>                        
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            $customer_id = $this->session->userdata('customer_name');
                            if ($customer_id == NULL) {
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>login">Login</a></li>
                                        <li><a href="<?php echo base_url(); ?>store/register">Register</a></li>
                                        <li><a href="<?php echo base_url(); ?>cart/show_cart">My Cart</a></li>
                                        <li><a href="<?php echo base_url(); ?>login">My Wishlist</a></li>
                                        <li><a href="<?php echo base_url(); ?>login">My Ticket</a></li>
                                        <li><a href="<?php echo base_url(); ?>login">My Courier</a></li>
                                        <li><a href="<?php echo base_url(); ?>login">My Services</a></li>
                                        <li><a href="<?php echo base_url(); ?>checkout">Checkout</a></li>
                                    </ul>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>customer">Dashboard</a></li>
                                        <li><a href="<?php echo base_url(); ?>cart/show_cart">My Cart</a></li>
                                        <li><a href="<?php echo base_url(); ?>wishlist/show_wishlist">My Wishlist</a></li>
                                        <li><a href="<?php echo base_url(); ?>">My Ticket</a></li>
                                        <li><a href="<?php echo base_url(); ?>">My Courier</a></li>
                                        <li><a href="<?php echo base_url(); ?>">My Services</a></li>
                                        <li><a href="<?php echo base_url(); ?>checkout">Checkout</a></li>
                                        <li><a href="<?php echo base_url(); ?>store/logout">Logout</a></li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--End Top Nav-->
            <!--Start Logo Area-->
            <div class="row header">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/public/img/logo/logo.png" class="img-responsive" alt="Logo"/></a>
                    </div>
                </div>
                <div class="search-box">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1 col-lg-4">
                        <form action="<?php echo base_url(); ?>store/search_product/" method="POST">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <div class="form-group">
                                        <select class="form-control" name="product_category" style="width: 65px; border-radius: 0px;">
                                            <option value="">All</option>
                                            <?php foreach ($all_category as $v_category) { ?>
                                                <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="text" name="product_search" placeholder="Search Products" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-lg-offset-2">
                    <div class="call-support">
                        <p><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> Call Us: <?php echo $call_us->setting; ?></p>
                    </div>
                    <ul class="home-cart" id="cart">
                        <?php
                            $amount = $this->session->userdata('coupon_amount');
                            $total = $this->cart->total();
                            $grand_total = $total - $amount;
                            $sdata = array();
                            $sdata['grand_total'] = $grand_total;
                            $this->session->set_userdata($sdata);
                        ?>
                        <li class="dropdown" style="list-style-type: none;">
                            <span>SHOPPING CART</span><br/>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span><?php echo $rows = count($this->cart->contents()); ?>  Items- &#2547; <?php echo $grand_total; ?></span></a>
                            <ul class="dropdown-menu dropdown-cart" role="menu">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contents = $this->cart->contents();
                                        foreach ($contents as $v_contents) {
                                            ?>
                                            <tr>
                                                <td><img src="<?php echo base_url() . $v_contents['image']; ?>" style="height: 50px; width: 50px;"/></td>
                                                <td><?php echo $v_contents['name']; ?></td>
                                                <td><?php echo $v_contents['price']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <li><a class="text-center" href="<?php echo base_url(); ?>cart/show_cart">View Cart</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End Logo Area-->
            <!--Start Mega Menu-->
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <?php foreach ($all_category as $v_category) { ?>
                            <ul class="nav navbar-nav">
                                <li class="dropdown mega-dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" onclick="categoryLink(<?php echo $v_category->category_id; ?>);"><?php echo $v_category->category_name; ?></a>
                                    <ul class="dropdown-menu mega-dropdown-menu row">
                                        <?php
                                        foreach ($all_subcategory as $v_subcategory) {
                                            if ($v_subcategory->category_id == $v_category->category_id) {
                                                ?>
                                                <li class="col-sm-2">
                                                    <ul>
                                                        <li class="dropdown-header"><a href="<?php echo base_url(); ?>store/subcategory_product_listing/<?php echo $v_subcategory->subcategory_id; ?>" style="color: #428bca;font-size: 14px;font-weight: bold; margin-left: -22%; width: 130%;"><?php echo $v_subcategory->subcategory_name; ?></a></li>
                                                            <?php
                                                            foreach ($all_item as $v_item) {
                                                                if ($v_item->subcategory_id == $v_subcategory->subcategory_id) {
                                                                    ?>
                                                                <li><a href="<?php echo base_url(); ?>store/item_product_listing/<?php echo $v_category->category_id; ?>/<?php echo $v_subcategory->subcategory_id; ?>/<?php echo $v_item->item_id; ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $v_item->item_name; ?></a></li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </nav>
            </div>
            <span style="color:green">
                <?php
                $msg = $this->session->userdata('save_newsletter');
                if (isset($msg)) {
                    echo "<p style='margin-left:2%;'>$msg</p>";
                    $this->session->unset_userdata('save_newsletter');
                }
                ?>
            </span>
            <!--End Mega Menu-->
            <?php echo $home; ?>
            <!--Start Footer-->
            <footer class="row">    
                <div class="footer" id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>About Us</h3>
                                <p>1stbitbd.com started in August 10, 2016 as one of the best e-commerce portal in Bangladesh. 1stbitbd.com is an online marketplace where almost everything is available. As a world-class technology infrastructure 1stbitbd.com enables & simplifies e-commerce for Bangladesh's ever expanding online community. 1stbitbd.com is proud to help many people established successful online businesses that make a living out of it.</p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>Contact Us</h3>
                                <ul>
                                    <li><a href="#">86/6 (5th floor, Right Side), Road # 06 Shekhertek, Mohammadpur, Dhaka- 1207.</a></li>
                                    <li><a href="#">8801716138136, 8801717152797, 8801716243607, 8801712385066</a></li>
                                    <li><a href="#">support@1stbitbd.com</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>Keep In Touch</h3>
                                <div class="thumbnail center well well-sm text-center">
                                    <h4>Newsletter</h4>
                                    <p>Subscribe to our weekly Newsletter and stay tuned.</p><br/>
                                    <form action="<?php echo base_url(); ?>store/save_newsletter" method="POST" role="form">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" name="subscription_email" placeholder="your@email.com" class="form-control">
                                        </div><br/>
                                        <input type="submit" value="Subscribe" class="btn btn-large btn-primary" />
                                    </form>
                                </div>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul><br/><br/>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <h3>Company Profile</h3>
                                <ul>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                </ul>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <p class="pull-left"> Copyright © <b>1stbitbd</b> 2016. All Right Reserved.</p>
                        <div class="pull-right">
                            <ul class="nav nav-pills payments">
                                <li><i class="fa fa-truck"></i></li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </footer>
            <!--End Footer-->       
        </div>
        <!--End Container-->
        <!-- SHOPPING CART MODAL -->
        <div class="modal fade" id="addCart" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add To Cart</h4><hr/>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center" style="margin-top: -11%;">Product Successfully Add To Your Cart</h3>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url(); ?>checkout" type="button" class="btn btn-danger">Checkout</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SHOPPING CART MODAL -->
        <!-- WISHLIST MODAL -->
        <div class="modal fade" id="addWish" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add To Wishlist</h4><hr/>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center" style="margin-top: -11%;">Product Successfully Add To Your Wishlist</h3>
                    </div>
                    <div class="modal-footer">
                        <a href="<?php echo base_url(); ?>wishlist/show_wishlist" type="button" class="btn btn-danger">Your Wishlist</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SHOPPING CART MODAL -->
        <script>
            // Start Autodropdown
            $(function () {
                $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                        $(this).toggleClass('open');
                        $('b', this).toggleClass("caret caret-up");
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                        $(this).toggleClass('open');
                        $('b', this).toggleClass("caret caret-up");
                    }
                );
            });
            // End Autodropdown
            // Start Ajax Shopping Cart
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
                xmlhttp = new XMLHttpRequest();
            }
            function addToCart(productId)
            {
                if (productId) {
                    serverPage = '<?php echo base_url(); ?>cart/add_to_cart/' + productId + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('cart').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
            function addToCartAttribute()
            {
                var product_id = document.getElementById("product_id").value;
                var qty = document.getElementById("qty").value;
                var color = document.getElementById("color").value;
                var size = document.getElementById("size").value;
                serverPage = '<?php echo base_url() . 'cart/add_cart/'; ?>' + product_id + '/' + qty + '/' + color + '/' + size + '/';
                var xmlhttp1 = xmlhttp;
                xmlhttp1.open("GET", serverPage);
                xmlhttp1.onreadystatechange = function () {
                    document.getElementById('cart').innerHTML = xmlhttp1.responseText;
                };
                xmlhttp1.send(null);
            }
            // End Ajax Shopping Cart
            // Start Wishlist
            function addToWishlist(productId)
            {
                if (productId) {
                    serverPage = '<?php echo base_url(); ?>wishlist/add_to_wishlist/' + productId + '/';
                    xmlhttp.open("GET", serverPage);
                    xmlhttp.onreadystatechange = function ()
                    {
                        document.getElementById('wish').innerHTML = xmlhttp.responseText;
                    };
                    xmlhttp.send(null);
                }
            }
            function login()
            {
                window.location.href = '<?php echo base_url(); ?>login';
            }
            // End Wishlist
            // Start Product Listing
            function categoryLink(iD)
            {
                window.location.href = '<?php echo base_url(); ?>store/category_product_listing/' + iD + '/';
            }
            // End Product Listing
            // Start Product Hover
            $(document).ready(function () {
                $("[rel='tooltip']").tooltip();
                $('.thumbnail').hover(
                    function () {
                        $(this).find('.add-to').slideDown(250); //.fadeIn(250)
                    },
                    function () {
                        $(this).find('.add-to').slideUp(250); //.fadeOut(205)
                    }
                );
            });
            // End Product Hover
        </script>
    </body>
</html>