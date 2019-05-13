<?php

    include('fmart_header.php');
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );

}
</script>
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Set Quotation</h2>
                                <p>You can search for your ideal furniture based on your rooms</p>
                                <p>Just select the type of room and the type of furniture you need</p>
                                <p>But before that please measure the <strong>Length</strong>, <strong>Width</strong> and <strong>Height</strong> of your room</p>
                            </div>

                                   <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#gridSystemModal">Click Here</button>
                              
                                   
                                </div>
                            </form>
                            <img src="<?php echo base_url();?>images/icon/rdimensions.png" alt="">
                        </div>
                     </div>
                </div>
            </div>
           
</div>
        <?php
include('fmart_footer.php');
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
      <form action="<?php echo site_url("Fmartctrl/search_quotation"); ?>" method="post">
     
            <div class="col-12 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Choose your Room</label>
                <select name="category" id="category" class="form-control" onchange="sel_type()">
                <option value="">Select Room</option>
                <?php
                foreach($cat as $row)
                {
                ?>
                                        
                    <option value="<?php echo $row->category_id; ?>"> <?php echo $row->c_name; ?></option>
                    <?php
                                                                        
                }
                    ?>
                </select>
            </div>
            <div class="col-12 mb-3">
                 <label for="ftype" style="font-size: 14px;  color: #fbb710;">Furniture Type</label><br>
                  <select name="type" id="type" class="form-control" required>
                  <option value="">Please select</option>
                                                            
                  </select>                                    
            </div>
                     <script>
                            function sel_type()
                                {
                                var category=document.getElementById('category').value;
                                // alert(category);
                                var data=new FormData();
                                data.append('category',category);
                                    $.ajax({
                                    method:'post',
                                    url:"<?php echo site_url("Fmartctrl/sel_type"); ?>",
                                    processData: false,
                                    contentType: false,
                                    data: data,
                                    success:function(result)
                                    {
                                        // alert(result);
                                            var r=JSON.parse(result);
                                            // alert(r[0].id);
                                            $('#type').html("<option value=''>"+"Select Type"+"</option>");
                                            for(i=0;i<r.length;i++)
                                            {
                                                $('#type').append("<option value="+r[i].id+">"+r[i].name+"</option>");
                                            }
                                    }
                                });
                            }
                            
                    </script>
                    <hr>
            <p>Room details</p>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Height (cm)</label>
                <input type="number" name="height" class="form-control" id="height" placeholder="Height" value="">
            </div>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Width (cm)</label>
                <input type="number" name="width" class="form-control" id="width" placeholder="Width" value="" >
            </div>
            <div class="col-md-6 mb-3">
                <label style="font-size: 14px;  color: #fbb710;">Depth (cm)</label>
                <input type="number" name="depth" class="form-control" id="depth" placeholder="Depth" value="" >
            </div>
            
        <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>

        <input type="submit" class="btn btn-primary waves-effect waves-light" name="search" Value="Search">
      </div>
      </form>
    </div>
  </div>
</div>


