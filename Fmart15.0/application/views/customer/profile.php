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
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );

}
</script>
   
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
                                        <input type="text" class="form-control" id="district" placeholder="District" value="<?php echo $dist_name; ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <label style="font-size: 14px;  color: #fbb710;">State</label>
                                        <input type="text" class="form-control" id="state" placeholder="State" value="<?php echo $state_name; ?>" disabled>
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
      <form action="<?php echo site_url("Custctrl/update_profile"); ?>" method="post">
             <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">First Name</label>
                <input type="text" class="form-control" id="fname" name="fnames"  placeholder="First Name" value="<?php echo $fname; ?>" >
            </div>
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lnames"  placeholder="First Name" value="<?php echo $lname; ?>" >
            </div>
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobiles" placeholder="Mobile"value="<?php echo $mobile; ?>" >
            </div>
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">House Name</label>
                <input type="text" class="form-control" id="h_name" name="h_names" placeholder="House Name" value="<?php echo $house; ?>" >
            </div>
                                    
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Town</label>
                <input type="text" class="form-control mb-3" id="town" name="towns" placeholder="Town" value="<?php echo $town; ?>" >
            </div>
             <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Place</label>
                <input type="text" class="form-control" id="place" name="places" placeholder="Place" value="<?php echo $place; ?>" >
              </div>
            
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">State</label>
                <select name="states" id="states" class="form-control" onchange="Sel_district();" required>
                    <option value="">Select State</option>
                    <?php
                    foreach($states as $row)
                     {
                        ?>
                     
                     <option value="<?php echo $row->id; ?>"> <?php echo $row->sname; ?></option>
                    <?php
                                                    
                    }
                    ?>
                    </select>
            </div>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">District</label>
                <select name="districts" id="districts" class="form-control" required>                         
                </select>
            </div>
            <script>

                                            function Sel_district()
                                            {
                                                var state=document.getElementById('states').value;
                                                // alert(state);
                                                var data=new FormData();
                                                data.append('state',state);
                                                    $.ajax({
                                                    method:'post',
                                                    url:"<?php echo site_url("Custctrl/sel_district"); ?>",
                                                    processData: false,
                                                    contentType: false,
                                                    data: data,
                                                    success:function(result){
                                                        // alert(result);
                                                        var r=JSON.parse(result);
                                                            // alert(r[0].did);
                                                            $('#districts').html("<option value=0>"+"Select District"+"</option>");

                                                            for(i=0;i<r.length;i++){
                                                                $('#districts').append("<option value="+r[i].id+">"+r[i].name+"</option>");
                                                            }
                                                                //$('#district').append("<option value="+result+">"+result+"</option>");
                                                                //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
                                                                }
                                                });
                                                
                                                
                                            }

                                            </script>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Zipcode</label>
                <input type="number" class="form-control" id="pincode" name="pincodes" placeholder="Pincode" value="<?php echo $pin; ?>" >
             </div>
      </div>
      <input type="hidden" name="custid" value="<?php echo $cust_id; ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>

        <input type="submit" class="btn btn-primary waves-effect waves-light" name="update" Value="Save Changes">
      </div>
      </form>
    </div>
  </div>
</div>
<?php
}else{
    $CI->login();
}
?> 