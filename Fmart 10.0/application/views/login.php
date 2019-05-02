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

                            <form name="myform" method="post" action="<?php echo site_url("Fmartctrl/login_check"); ?>">
                                <div class="row">
                                   
                                   
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" av-message="invalid email" id="email" name="email" placeholder="Email" onchange="Validateemail()"; autocomplete="off" required>
                                        <label class="errortext" style="display:nne; color:red" id="email_2"></label><br>
                                    </div>
                                               <script>
                                              function Validateemail()
                                              {
                                                   var email = document.getElementById('email');
                                                     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                                     if (!filter.test(email.value)) {
                                                      email.value="";
                                                      $("#email_2").html('Please provide a valid email address').fadeIn().delay(4000).fadeOut();
                                                      return false;
                                                      }
                                                  return false;
                                              }
                                              </script>
                                   
                                   <div class="col-12 mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password" onchange="Validatepass()"; required>
                                        <label class="errortext" style="display:nne; color:red" id="pass1"></label><br>
                                    </div>
                                    <script>  
                                        function Validatepass(){  
                                            var password=document.myform.password.value;  
                                      if(password.length<6)
                                            { 
                                                
                                                alert("Password must be at least 6 characters long.");  

                                            return false;  
                                            }  
                                        }  
                                  </script>
                                  <div class="col-12 mb-3">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="cod"  onclick="MyFunction()"; >
                                            <label class="custom-control-label" for="cod">Show Password</label>
                                        </div>
                                        
                                  </div>
                                  <script>
                                            function MyFunction(){
                                            var x = document.getElementById("password");
                                            if (x.type === "password") {
                                                x.type = "text";
                                            } else {
                                                x.type = "password";
                                            }
                                            }
                                            </script>
                                   
                                    <div class="col-12 mb-3">
                                        <input type="Submit" class="btn amado-btn mb-15" name="login" placeholder="Login" value="Login" required>
                                    </div>
                                   
                                   
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