<?php

$CI =&get_instance();
$a=$CI->sessionin();
$cust_id=$CI->cust_id();

if($a==1)
{
    include('cust_header.php');
?>

<div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
<?php 
if($res==0)
{
    ?>
    <h1>No items!!</h1>
    <img src="<?php echo base_url(); ?>images/home/bg.jpg" alt="">
    <?php
}
else
{

    foreach($products as $row)
    {
        $fid=$row->furniture_id;
        $did=$row->deal_id;
        $name=$row->name;
        $price=$row->price;
        $image=$row->image;

    ?>
    
    <form action='<?php echo site_url("Custctrl/product") ?>' method='post'>
    <input type="hidden" name="fid" value="<?php echo $fid; ?>">
    <input type="hidden" name="deal_id" value="<?php echo $did; ?>">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                <!-- <a href=""> -->
                <!-- <input type="submit" name> -->
                    <!-- <button type="submit" name="submit" style="background:none, border:none"> -->
                    <button type="submit" name="submit">
                        <img src="<?php echo base_url(); ?>images/home/<?php echo $image; ?>" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From Rs <?php echo $price; ?></p>
                            <h4><?php echo $name; ?></h4>
                        </div>
                        <!-- </a> -->
                        </button>
                </div>
    </form>
                <?php
    
}
}
?>
               
            </div>
</div>

<?php
include('cust_footer.php');
}else{
    $CI->login();
}
?>