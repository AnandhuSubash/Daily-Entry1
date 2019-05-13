<?php

$CI =&get_instance();
$a=$CI->sessionin();
$cust_id=$CI->cust_id();

if($a==1)
{
    include('cust_header.php');
?>

<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

<?php 
foreach($cust as $row)
{
    $fname=$row->fname;
    $lname=$row->lname;
    $mobile=$row->mobile;
    $house=$row->house;
    $town=$row->town;
    $place=$row->place;
    $district=$row->district;
    $state=$row->state;
    $pin=$row->pincode;
}
?>
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="fname"  placeholder="First Name" value="<?php echo $fname; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="lname"  placeholder="Last Name" value="<?php echo $lname; ?>" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="mobile" placeholder="Mobile"value="<?php echo $mobile; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="h_name" placeholder="House Name" value="<?php echo $house; ?>">
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="town" placeholder="Town" value="<?php echo $town; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="place" placeholder="Place" value="<?php echo $place; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="district" placeholder="District" value="<?php echo $dist_name; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="state" placeholder="State" value="<?php echo $state_name; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode" value="<?php echo $pin; ?>">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <script src="<?php echo base_url(); ?>vendor/jquery-3.2.1.min.js"></script>
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                        </div>
                                    </div>
                                    <script>
                                    $(document).ready(function() {
                                    //set initial state.
                                    $('#fname').val('<?php echo $fname; ?>');
                                    $('#lname').val('<?php echo $lname; ?>');
                                    $('#mobile').val('<?php echo $mobile; ?>');
                                    $('#h_name').val('<?php echo $house; ?>');
                                    $('#town').val('<?php echo $town; ?>');
                                    $('#place').val('<?php echo $place; ?>');
                                    $('#district').val('<?php echo $dist_name; ?>');
                                    $('#state').val('<?php echo $state_name; ?>');
                                    $('#pincode').val('<?php echo $pin; ?>');

                                    $('#customCheck3').change(function() {
                                        $('#fname').val('');
                                        $('#lname').val('');
                                        $('#mobile').val('');
                                        $('#h_name').val('');
                                        $('#town').val('');
                                        $('#place').val('');
                                        $('#district').val('');
                                        $('#state').val('');
                                        $('#pincode').val('');
                                    });

                                    // $('#customCheck3').click(function() {
                                    //     if (!$(this).is(':checked')) {
                                    //         $('#comment').val('<?php echo $fname; ?>');
                                    //     }
                                    // });
                                    });</script>
         
                                  
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span><?php echo $total; ?></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span><?php echo $total; ?></span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="<?php echo base_url(); ?>img/core-img/paypal.png" alt=""></label>
                                </div>
                            </div>

                            <div class="cart-btn mt-100">
                                <a href="#" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
include('cust_footer.php');
}else{
    $CI->login();
}
?> 