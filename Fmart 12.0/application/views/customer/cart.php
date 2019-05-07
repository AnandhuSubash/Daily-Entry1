<?php

$CI =&get_instance();
$a=$CI->sessionin();
$cust_id=$CI->cust_id();

if($a==1)
{
    include('cust_header.php');
?>

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=0;
                                    foreach($cart as $row)
                                    {
                                        $f_id=$row->furniture_id;
                                        $q=$row->quantity;
                                        $price=$row->price;
                                        $image=$row->image;
                                        $name=$row->name;
                                ?>
                                    <tr>

                                        <td class="cart_product_img">
                                            <a href="#"><img  src="<?php echo base_url(); ?>images/home/<?php echo $image; ?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $name; ?></h5>
                                        </td>
                                        <td class="price">
                                            <span><?php echo $price; ?></span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <!-- <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span> -->
                                                    <input type="number" class="qty-text" id="qty<?php echo $i; ?>" step="1" min="1" max="10" name="quantity" value="<?php echo $q; ?>" onchange="Change_quantity(<?php echo $f_id; ?>,<?php echo $i; ?>)" >
                                                    <!-- <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
                                                </div>
                                                
                                                <a href="<?php echo site_url().'/Custctrl/delete_cart/'.$f_id;?>"><img  src="<?php echo base_url(); ?>img/core-img/remove.png" alt="Product"></a>

                                            </div>
                                        </td>
                                        
                                       
                                    </tr>
                                    <?php
                                    $i++;
                                        }
                                        ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <script>
                    function Change_quantity(f_id,val)
                    {
                        var q=document.getElementById('qty'+val).value;
                        alert(q);
                        // alert(f_id); 
                    }
                    </script>
                    <?php
                    $a=0;
                                    foreach($cart as $row)
                                    {
                                        $q=$row->quantity;
                                        $price=$row->price;
                                        $n=$q*$price;
                                        $a=$a+$n;
                                    
                                    }
                                ?>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span><?php echo $a;?></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span><?php echo $a;?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="cart.html" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
		</div>
     
        
    <!-- ##### Main Content Wrapper End ##### -->

    <?php
include('cust_footer.php');
}else{
    $CI->login();
}
?> 