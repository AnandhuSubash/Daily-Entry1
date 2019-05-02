<?php

$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{
    include('dealer_header.php');
?>


            <!-- MAIN CONTENT-->
<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Profile                     
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mediumModal">Update</button>

                        </div>

                            <div class="card-body">

                            <?php
                            foreach($reg as $row)
                            {
                                $deal_id=$row->deal_id;
                                $fname=$row->fname;
                                $lname=$row->lname;
                                $mobile=$row->mobile;
                                $pan=$row->pan;
                            }
                            foreach($addr as $row)
                            {
                                $addr_id=$row->addr_id;
                                $store=$row->store_name;
                                $town=$row->town;
                                $place=$row->place;
                                $district=$row->district;
                                $state=$row->state;
                                $pincode=$row->pincode;

                            }
                            ?>
                            <form action='#' method='post' >

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class=" form-control-label">Fname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="name" name="name" placeholder="<?php echo $fname; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="lname" class=" form-control-label">Lname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="lname" name="lname" placeholder="<?php echo $lname; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="mobile" class=" form-control-label">Mobile</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pan" class=" form-control-label">PAN</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pan" name="pan" placeholder="<?php echo $pan; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="store name" class=" form-control-label">Store Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="store" name="store" placeholder="<?php echo $store; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>
                            
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="town" class=" form-control-label">Town</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="town" name="town" placeholder="<?php echo $town; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="place" class=" form-control-label">Place</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="place" name="place" placeholder="<?php echo $place; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="district" class=" form-control-label">District</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="district" name="district" placeholder="<?php echo $district; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="state" class=" form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="state" name="state" placeholder="<?php echo $state; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pincode" class=" form-control-label">Pincode</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pincode" name="pincode" placeholder="<?php echo $pincode; ?>" disabled="" prediction="false" autocomplete="off" class="form-control">
                                            </div>
                            </div>

                            </form>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>     
        </div>         
</div>

<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						<form action='<?php echo site_url("Dealerctrl/update_profile") ?>' method='post' >

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class=" form-control-label">Fname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" onkeyup="capitalizef(this.id, this.value);" prediction="false" onchange="Fname();" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="fname_1"></label><br>

                                            </div>


                                    </div>
                                    <script>
                                    function capitalizef(textboxid, str) {
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


                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="lname" class=" form-control-label">Lname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" onkeyup="capitalizel(this.id, this.value);" prediction="false" onchange="Lname();" autocomplete="off" class="form-control">
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
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="mobile" class=" form-control-label">Mobile</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>"  onchange="Validatep();" prediction="false" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="mobile_1"></label><br>
                                           
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
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pan" class=" form-control-label">PAN</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pan" name="pan" value="<?php echo $pan; ?>" onchange="Validatepan();" prediction="false" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="pan_1"></label><br>

                                            </div>
                                            <script>
                                function Validatepan()
                                {
                                    var val = document.getElementById('pan').value;
                                    if (!val.match(/^[0-9][0-9]{11,11}$/))
                                    {
                                        $("#pan_1").html('Must. 12 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
                                        document.getElementById('pan').value ="";
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="store name" class=" form-control-label">Store Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="store" name="store" value="<?php echo $store; ?>" onkeyup="capitalizestore(this.id, this.value);" prediction="false" onchange="Storename();" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="store_1"></label><br>
                                            </div>
                                            <script>
                                    function capitalizestore(textboxid, str) {
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
                                        function Storename()
                                        {
                                            var val = document.getElementById('store').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#store_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('store').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                                            
                            </div>
                            
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="town" class=" form-control-label">Town</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="town" name="town" value="<?php echo $town; ?>" onkeyup="capitalizetown(this.id, this.value);" prediction="false" onchange="Town();" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="town_1"></label><br>
                                            </div>
                                            <script>
                                    function capitalizetown(textboxid, str) {
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
                                        function Town()
                                        {
                                            var val = document.getElementById('town').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#town_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('town').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="place" class=" form-control-label">Place</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="place" name="place" value="<?php echo $place; ?>" onkeyup="capitalizeplace(this.id, this.value);" prediction="false" onchange="Place();" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="place_1"></label><br>
                                            </div>
                                            <script>
                                    function capitalizeplace(textboxid, str) {
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
                                        function Place()
                                        {
                                            var val = document.getElementById('place').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#place_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('place').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="district" class=" form-control-label">District</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="district" name="district" value="<?php echo $district; ?>" onkeyup="capitalizedist(this.id, this.value);" onchange="District();" prediction="false" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="district_1"></label><br>
                                            </div>
                                            <script>
                                    function capitalizedist(textboxid, str) {
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
                                        function District()
                                        {
                                            var val = document.getElementById('district').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#district_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('district').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="state" class=" form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="state" name="state" value="<?php echo $state; ?>" onkeyup="capitalizestate(this.id, this.value);" onchange="State();" prediction="false" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="state_1"></label><br>
                                            </div>
                                            <script>
                                    function capitalizestate(textboxid, str) {
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
                                        function State()
                                        {
                                            var val = document.getElementById('state').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#state_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('state').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pincode" class=" form-control-label">Pincode</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pincode" name="pincode" value="<?php echo $pincode; ?>" onchange="Validatepin();" prediction="false" autocomplete="off" class="form-control">
                                                <label class="errortext" style="display:none; color:red" id="pincode_1"></label><br>

                                            </div>
                                            <script>
                                function Validatepin()
                                {
                                    var val = document.getElementById('pincode').value;
                                    if (!val.match(/^[0-9][0-9]{5,5}$/))
                                    {
                                        $("#pincode_1").html('Must. 6 and Numbers Allowed..!').fadeIn().delay(4000).fadeOut();
                                        document.getElementById('pincode').value = "";
                                        return false;
                                    }
                                    return true;
                                }
                            </script>
                            </div>
                            <input type="hidden" name="deal_id" value="<?php echo $deal_id; ?>">
                            <input type="hidden" name="addr_id" value="<?php echo $addr_id; ?>">

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<input type="submit" class="btn btn-primary" name="update" value="Update">
						</div>
                        </form>

					</div>
				</div>
			</div>
			<!-- end modal medium -->      

<?php
include('dealer_footer.php');
}
else{
    $CI->login();
}
?>