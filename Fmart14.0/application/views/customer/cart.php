<?php

$CI =&get_instance();
$a=$CI->sessionin();
$cust_id=$CI->cust_id();
$pro_status=$CI->profile_status();
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
                                                    <!-- <span class="qty-minus"  onclick="var effect = document.getElementById('qty<?php echo $i; ?>'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span> -->
                                                    <input type="number" class="qty-text" id="qty<?php echo $i; ?>" step="1" name="quantity" value="<?php echo $q; ?>" onchange="Change_quantity(<?php echo $f_id; ?>,<?php echo $i; ?>,<?php echo $cust_id; ?>,<?php echo $price;?>)" min="1" max="10" >
                                                    <!-- <span class="qty-plus" onclick="var effect = document.getElementById('qty<?php echo $i; ?>'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span> -->
                                                </div>
                                                
                                                <a href="<?php echo site_url().'/Custctrl/delete_cart/'.$f_id;?>"><img  src="<?php echo base_url(); ?>img/core-img/remove.png" alt="Product"></a>

                                            </div>
                                        </td>
                                                                    <!-- <script>
                                                                    window.onload = () => {
                            //add event listener to prevent the default behavior
                            const mouseOnlyNumberInputField = document.getElementById("qty<?php echo $i; ?>");
                            mouseOnlyNumberInputField.addEventListener("keypress", (event) => {
                                event.preventDefault();
                            });
                            }</script> -->

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
                    function Change_quantity(f_id,val,cust_id,price)
                    {
                    var q=document.getElementById('qty'+val).value;
                    // alert(cust_id);
                    // alert(f_id);
                    // alert(price);
                    // var item = {'f_id': f_id,'val':val,'cust_id':cust_id};
                                var data=new FormData();
                                data.append('cust_id',cust_id);
                                data.append('f_id',f_id);
                                data.append('q',q);
                                data.append('price',price);
                                    $.ajax({
                                    method:'post',
                                    url:"<?php echo site_url("Custctrl/update_cart"); ?>",
                                    processData: false,
                                    contentType: false,
                                    data: data,
                                    success:function(result){
                                        // alert(result);
                                        $('#sub_total').html("");
                                        $('#sub_total').append(result);
                                        $('#total').html("");
                                        $('#total').append(result);
                                        // window.location.reload();
                                    }
                                        
                                });

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
                        <div class="cart-summary" id="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span id="sub_total" name="sub_total"><?php echo $a; ?></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span id="total" name="total"><?php echo $a; ?></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                            <form action="<?php echo site_url("Custctrl/checkout"); ?>" method="post">
                                    <input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
                                    <input type="hidden" name="total" value="<?php echo $a; ?>">
                                    <input type="hidden" name="pro_status" value="<?php echo $pro_status; ?>">
                                    <input type="submit" name="checkout" value="Checkout" class="btn amado-btn w-100">
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
		</div>
        <script src="<?php echo base_url(); ?>js/jquery/jquery-2.2.4.min.js"></script>

        <script>
                             $(document).ready(function(){
$('input[type="number"]').keydown(false);
                             });          
                            </script>
    <!-- ##### Main Content Wrapper End ##### -->

    <?php
include('cust_footer.php');
}else{
    $CI->login();
}
?> 