<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/skin-green.css">
        <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="<?php echo base_url(); ?>asset/private/js/jQuery-2.1.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/private/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>asset/private/js/app.min.js"></script>
    </head>

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo base_url(); ?>ecommerce" class="logo">
                    <span class="logo-mini"><b>1st</b></span>
                    <span class="logo-lg"><b>1stbit E-Commerce</b></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span><?php echo $this->session->userdata('admin_name'); ?> <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header bg-light-blue">
                                        <img src="<?php echo base_url(); ?>asset/public/img/logo/logo.png" />
                                        <p>
                                            <?php echo $this->session->userdata('admin_name'); ?>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>ecommerce/edit_admin/<?php echo $this->session->userdata('admin_id'); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>ecommerce/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <li class="active treeview">
                            <a href="<?php echo base_url(); ?>ecommerce">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>" target="_blank">
                                <i class="fa fa-home"></i> <span>View Website</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>ecommerce/manage_news">
                                <i class="fa fa-newspaper-o"></i> <span>News Manager</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-desktop"></i> <span>Slider Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_slide"> Add New Slide</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_slider"> Manage Slider</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-suitcase"></i> <span>Banner Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_banner"> Add New Banner</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_banner"> Manage Banner</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-certificate"></i> <span>Coupon Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_coupon"> Add New Coupon</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_coupon"> Manage Coupon</a></li>
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bars"></i> <span>Inventory Manager</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_category"> Add New Category</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_subcategory"> Add New Subcategory</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_item"> Add New Item</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_brand"> Add New Brand</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_color"> Add New Color</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_size"> Add New Size</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/add_product"> Add New Product</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_category"> Manage Category</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_subcategory"> Manage Subcategory</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_item"> Manage Item</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_brand"> Manage Brand</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_color"> Manage Color</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_size"> Manage Size</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_product"> Manage Product</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>ecommerce/manage_customer">
                                <i class="fa fa-male"></i> <span>Customer Manager</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>ecommerce/manage_review">
                                <i class="fa fa-comment"></i> <span>Review Manager</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cart-arrow-down"></i> <span>Sales Management</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>ecommerce/sales_report"> Sales Report</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_sale"> Manage Sales</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_order"> Order Management</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-newspaper-o"></i> <span>Newsletter Subscription</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>ecommerce/send_newsletter"> Send Newsletter</a></li>
                                <li><a href="<?php echo base_url(); ?>ecommerce/manage_subscription"> Manage Subscription</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>ecommerce/settings">
                                <i class="fa fa-cogs"></i> <span>Settings</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>ecommerce/about">
                                <i class="fa fa-adjust"></i> <span>About</span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
            <?php echo $dashboard; ?>
            <footer class="main-footer">
                <strong>Copyright © <a href="<?php echo base_url(); ?>">1stbit</a></strong> All Rights Reserved.
            </footer>
            <script>
                function check_delete()
                {
                    var chk = confirm('Are You Want To Delete This');
                    if (chk)
                    {
                        return true;
                    } else
                    {
                        return false;
                    }
                }
            </script>
        </div>
    </body>
</html>