<?php

$CI =&get_instance();
$a=$CI->approve_count();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url(); ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url(); ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?php echo site_url("Adminctrl/admin_home1")?>">
                    <img src="<?php echo base_url(); ?>images/icon/admin.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                                       
                       
                        <li>
                            <a href="<?php echo site_url("Adminctrl/cust_list")?>">
                                <i class="fas fa-table"></i>Customers</a>
                                

                        </li>
                        <li>
                            <a href="<?php echo site_url("Adminctrl/deal_list")?>">
                                <i class="fas fa-table"></i>Dealers</a>

                        </li>

                        <li>
                            <a href="<?php echo site_url("Adminctrl/deal_approval")?>">
                                <i class="fas fa-table zmdi zmdi-notifications noti__item"><span class="quantity"><?php echo $a; ?></span></i>Approval</a>
                                
                        </li>
                        <li>
                            <a href="<?php echo site_url("Adminctrl/category")?>">
                                <i class="fas fa-table"></i>Categories</a>

                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>x
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="hidden" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo base_url(); ?>images/icon/admin-img.png" alt="Admin" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo base_url(); ?>images/icon//admin-img.png" alt="Admin" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Admin</a>
                                                    </h5>
                                                    <span class="email"><?php echo $this->session->userdata('email'); ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo site_url("Fmartctrl/logout") ?> ">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

</body>
</html>            
