<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Fmart | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url(); ?>img/core-img/f.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/core-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>style.css">
    
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?php echo base_url(); ?>img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="<?php echo base_url(); ?>img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo site_url('Fmartctrl/home')?>"><img src="<?php echo base_url(); ?>img/core-img/logo.jpg" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                 <li><a href="<?php echo site_url('Fmartctrl/home')?>">Home</a></li>
                 <li><a href="<?php echo site_url('Fmartctrl/login')?>">Login</a></li>

                    <!-- <li><a href="shop.html">Shop</a></li> -->
                  
               
                <!-- <li><a href="#">Cart</a></li> -->
                <li><a href="<?php echo site_url('Fmartctrl/shop')?>">Shop</a></li>
                <li><a href="<?php echo site_url('Fmartctrl/quotation')?>">Quotation</a></li>


                <li>
                    <div class="dropdownbtn">
                        <button class="dropbtn btn amado-btn mb-15">Register</button>
                        <div class="dropdownbtn-content">
                           <a href="<?php echo site_url('Fmartctrl/register_deal')?>">Dealer</a>
                           <a href="<?php echo site_url('Fmartctrl/register_cust')?>">Customer</a>
                            
                        </div>
                    </div>
                </li>

                </ul>
            </nav>
            <!-- Button Group -->
            <!-- <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> -->
            <!-- Cart Menu -->
           
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        
        <!-- Product Catagories Area End -->
   
</body>

</html>