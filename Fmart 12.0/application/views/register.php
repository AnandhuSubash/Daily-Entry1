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

                            <form action="#" name="myform"  method="post" onsubmit="return">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="fname" name="fname" onkeyup="capitalize(this.id, this.value);" placeholder="First Name" onchange="Fname();" autocomplete="off" required>
                                        <label class="errortext" style="display:none; color:red" id="fname_1"></label><br>

                                    </div>
                                    <script>
                                    function capitalize(textboxid, str) {
                                        // string with alteast one character
                                        if (str && str.length >= 1)
                                        {       
                                            var firstChar = str.charAt(0);
                                            var remainingStr = str.slice(1);
                                            str = firstChar.toUpperCase() + remainingStr;
                                        }
                                        document.getElementById(textboxid).value = str;
                                    }
                                    </script>

                                        <script>
                                        function Fname()
                                        {
                                            var val = document.getElementById('fname').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{0,}$/))
                                            {
                                                $("#fname_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('fname').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="lname" name="lname" onkeyup="capitalizel(this.id, this.value);" placeholder="Last Name" onchange="Lname();" autocomplete="off" required>
                                        <label class="errortext" style="display:none; color:red" id="lname_1"></label><br>
                                    </div>
                                    <script>
                                    function capitalizel(textboxid, str) {
                                        // string with alteast one character
                                        if (str && str.length >= 1)
                                        {       
                                            var firstChar = str.charAt(0);
                                            var remainingStr = str.slice(1);
                                            str = firstChar.toUpperCase() + remainingStr;
                                        }
                                        document.getElementById(textboxid).value = str;
                                    }
                                    </script>
                                    
                                    <script>
                                        function Lname()
                                        {
                                            var val = document.getElementById('lname').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{0,}$/))
                                            {
                                                $("#lname_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('lname').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                                    <div class="col-md-6 mb-3">
                                        <input type="mobile" class=" form-control" id="mobile" name="mobile"  placeholder="Phone No" onchange="Validatep()"; autocomplete="off" required>
                                        <label class="errortext" style="display:none; color:red" id="mobile_1"></label>

                                    </div>
                                    <script>
                                              function Validatep()
                                              {
                                                  var val = document.getElementById('mobile').value;
                                                  if (!val.match(/^[7-9][0-9]{9,9}$/))
                                                  {
                                                  $("#mobile_1").html('Must. 10 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
                                                  document.getElementById('mobile').value = "";
                                                      return false;
                                                  }
                                                  return true;
                                              }
                                              </script>
                                    
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
                                        <input type="Submit" class="btn amado-btn mb-15" name="register"  value="Register">
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
  
    <!-- ##### Main Content Wrapper End ##### -->

<?php
include('fmart_footer.php');
?>