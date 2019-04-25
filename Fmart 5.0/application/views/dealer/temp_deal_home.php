<?php
include('temp_deal_header.php');
$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{
?>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Enter The Details</strong>
                                    </div>
                                    <div class="card-body card-block">
                                    
                                    <?php 
                                    
                                    foreach($user as $row)
                                    {
                                        $d_id=$row->deal_id;
                                        ?>
                                    <form action="<?php echo site_url("Dealerctrl/deal_request"); ?>" method="post" >

                                        <div class="form-group">
                                            <label for="pan" class=" form-control-label">PAN number</label>
                                            <input type="number" name="pan" placeholder="Enter your PAN number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="shop" class=" form-control-label">Store Name</label>
                                            <input type="text" name="shop_name" placeholder="Enter shop name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="shop" class=" form-control-label">State</label>
                                            <select name="state" class="form-control" required>
                                            <option value="">Select State</option>
                                            <option>Kerala</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="shop" class=" form-control-label">District</label>
                                            <select name="district" class="form-control" required>
                                            <option value="">Select District</option>
                                            <option>Kottayam</option>
                                            <option>Ernakulam</option>
                                            <option>Kollam</option>
                                            <option>Alappuzha</option>
                                            <option>Idukki</option>
                                            <option>Pathanamthitta</option>
                                            <option>Palakkad</option>
                                            <option>Wayanad</option>
                                            <option>Kannur</option>
                                            <option>Alappuzha</option>
                                            <option>Kozhikodu</option>
                                            <option>Malappuram</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="town" class=" form-control-label">Town</label>
                                            <input type="text" name="shop_town"  required placeholder="Shop Town" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="place" class=" form-control-label">Place</label>
                                            <input type="text" name="shop_place" placeholder="Shop Place"  class="form-control" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="pin" class=" form-control-label">Pincode</label>
                                            <input type="text" name="pincode" placeholder="Enter pincode" class="form-control" required>
                                        </div>
                                        <input type="hidden" name="deal_id"  value="<?php echo $d_id; ?>">
                                        <input type="hidden" name="log_id"  value="<?php echo $this->session->userdata('id'); ?>">


                                        <div class="form-group">
                                            <input type="submit" name="request" value="Submit" class="btn btn-primary btn-sm">
                                        </div>
                                    </form>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>


<?php
include('temp_deal_footer.php');
}else{
    $CI->login();
}
?>