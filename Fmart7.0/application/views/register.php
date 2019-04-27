<?php
include('fmart_header.php');
?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Register | Customer</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="fname" value="" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="mobile" class="form-control" name="mobile"  placeholder="Phone No" required>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control"  name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="cod"  onclick="myFunction()">
                                            <label class="custom-control-label" for="cod">Show Password</label>

                                            <script>
                                            function myFunction() {
                                            var x = document.getElementById("password");
                                            if (x.type === "password") {
                                                x.type = "text";
                                            } else {
                                                x.type = "password";
                                            }
                                            }
                                            </script>
                                        </div>
                                </div>
                                    

                                   
                                    <div class="col-12 mb-3">
                                        <input type="Submit" class="btn amado-btn mb-15" name="register"  value="Register">
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-lg-4"> -->
                        <!-- <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul> -->

                            <!-- <div class="payment-method"> -->
                                <!-- Cash on delivery -->
                                <!-- <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div> -->
                                <!-- Paypal -->
                                <!-- <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="<?php echo base_url(); ?>img/core-img/paypal.png" alt=""></label>
                                </div> -->
                            <!-- </div>

                            <div class="cart-btn mt-100">
                                <a href="#" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

<?php
include('fmart_footer.php');
?>