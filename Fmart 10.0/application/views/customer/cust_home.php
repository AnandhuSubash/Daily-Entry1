<?php

$CI =&get_instance();
$a=$CI->sessionin();
// $cust_id=$CI->cust_id();

if($a==1)
{
    include('cust_header.php');
?>
 <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
                <?php
                    foreach($items as $row)
                    {
                        $image=$row->image;
                        $name=$row->name;
                        $price=$row->price;
                        $fid=$row->furniture_id;
                        ?>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href='<?php echo site_url().'/Custctrl/product_view/'.$fid;?>'>
                        <img src="<?php echo base_url(); ?>images/home/<?php echo $image; ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From Rs <?php echo $price; ?></p>
                            <h4><?php echo $name; ?></h4>
                        </div>
                    </a>
                </div>
                <?php
                    }
                    ?>

               
            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
       
<?php
include('cust_footer.php');
}else{
    $CI->login();
}
?>