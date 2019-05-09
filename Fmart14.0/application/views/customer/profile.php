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
                                <h2>Profile</h2>
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
                                    <label style="font-size: 14px;  color: #fbb710;">First Name</label>
                                        <input type="text" class="form-control" id="fname"  placeholder="First Name" value="<?php echo $fname; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">Last Name</label>
                                    <input type="text" class="form-control" id="lname"  placeholder="Last Name" value="<?php echo $lname; ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Mobile"value="<?php echo $mobile; ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">House Name</label>
                                        <input type="text" class="form-control" id="h_name" placeholder="House Name" value="<?php echo $house; ?>" disabled>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">Town</label>
                                        <input type="text" class="form-control mb-3" id="town" placeholder="Town" value="<?php echo $town; ?>" disabled>
                                    </div>
                                    <div class="col-12 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">Place</label>
                                        <input type="text" class="form-control" id="place" placeholder="Place" value="<?php echo $place; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">District</label>
                                        <input type="text" class="form-control" id="district" placeholder="District" value="<?php echo $district; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">State</label>
                                        <input type="text" class="form-control" id="state" placeholder="State" value="<?php echo $state; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">Zipcode</label>
                                     <input type="number" class="form-control" id="pincode" placeholder="Pincode" value="<?php echo $pin; ?>" disabled>
                                    </div>
                                   

                                    
                                </div>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#gridSystemModal">Update</button>
                            </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <?php
include('cust_footer.php');
?>
<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="gridModalLabel">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
             <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">First Name</label>
                <input type="text" class="form-control" id="fname"  placeholder="First Name" value="<?php echo $fname; ?>" >
            </div>
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Last Name</label>
                <input type="text" class="form-control" id="lname"  placeholder="First Name" value="<?php echo $lname; ?>" >
            </div>
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Mobile</label>
                <input type="text" class="form-control" id="mobile" placeholder="Mobile"value="<?php echo $mobile; ?>" >
            </div>
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">House Name</label>
                <input type="text" class="form-control" id="h_name" placeholder="House Name" value="<?php echo $house; ?>" >
            </div>
                                    
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Town</label>
                <input type="text" class="form-control mb-3" id="town" placeholder="Town" value="<?php echo $town; ?>" >
            </div>
             <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Place</label>
                <input type="text" class="form-control" id="place" placeholder="Place" value="<?php echo $place; ?>" >
              </div>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">District</label>
                <input type="text" class="form-control" id="district" placeholder="District" value="<?php echo $district; ?>" >
            </div>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">State</label>
                <input type="text" class="form-control" id="state" placeholder="State" value="<?php echo $state; ?>" >
            </div>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Zipcode</label>
                <input type="number" class="form-control" id="pincode" placeholder="Pincode" value="<?php echo $pin; ?>" >
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
    $CI->login();
}
?> 