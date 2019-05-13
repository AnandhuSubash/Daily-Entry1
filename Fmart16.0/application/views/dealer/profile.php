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
                                $district_id=$row->district;
                                $state_id=$row->state;
                                $pincode=$row->pincode;

                            }
                            ?>
                            <form action='#' method='post' >

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class=" form-control-label">Fname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="name" name="name" placeholder="<?php echo $fname; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="lname" class=" form-control-label">Lname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="lname" name="lname" placeholder="<?php echo $lname; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="mobile" class=" form-control-label">Mobile</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pan" class=" form-control-label">PAN</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pan" name="pan" placeholder="<?php echo $pan; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="store name" class=" form-control-label">Store Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="store" name="store" placeholder="<?php echo $store; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="town" class=" form-control-label">Town</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="town" name="town" placeholder="<?php echo $town; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="place" class=" form-control-label">Place</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="place" name="place" placeholder="<?php echo $place; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="district" class=" form-control-label">District</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="district" name="district" placeholder="<?php echo $district; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="state" class=" form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="state" name="state" placeholder="<?php echo $state; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pincode" class=" form-control-label">Pincode</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pincode" name="pincode" placeholder="<?php echo $pincode; ?>" disabled="" prediction="false" autocomplete="false" class="form-control">
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
                                                <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="lname" class=" form-control-label">Lname</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="mobile" class=" form-control-label">Mobile</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pan" class=" form-control-label">PAN</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pan" name="pan" value="<?php echo $pan; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="store name" class=" form-control-label">Store Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="store" name="store" value="<?php echo $store; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="town" class=" form-control-label">Town</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="town" name="town" value="<?php echo $town; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="place" class=" form-control-label">Place</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="place" name="place" value="<?php echo $place; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="district" class=" form-control-label">District</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="district1" name="district1" value="<?php echo $district; ?>" disabled prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="state" class=" form-control-label">State</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="state1" name="state1" value="<?php echo $state; ?>" disabled prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>

                            <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="pincode" class=" form-control-label">Pincode</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="pincode" name="pincode" value="<?php echo $pincode; ?>"  prediction="false" autocomplete="false" class="form-control">
                                            </div>
                            </div>
                            <input type="hidden" name="district" value="<?php echo $district_id; ?>">
                            <input type="hidden" name="state" value="<?php echo $state_id; ?>">

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