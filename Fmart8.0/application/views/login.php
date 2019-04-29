<?php
include('fmart_header.php');
?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Login..</h2>
                            </div>

                            <form method="post"action="<?php echo site_url("Fmartctrl/login_check"); ?>">
                                <div class="row">
                                   
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="" required >
                                    </div>
                                   
                                    <div class="col-12 mb-3">
                                        <input type="Submit" class="btn amado-btn mb-15" name="login" placeholder="Login" value="Login" required>
                                    </div>
                                    <?php
                                    $this->session->flashdata("error");
                                    ?>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <?php
include('fmart_footer.php');
?>  