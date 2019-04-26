<?php

$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{
    include('cust_header.php');
?>

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                    <?php 
                    foreach($cat as $row)
                    {
                        ?>
                        <li><a href="#" onclick="return catFunction(<?php echo $row->category_id; ?>);"><?php echo $row->c_name; ?></a></li>
                        <?php 
                    }
                    ?>
                    </ul>
                </div>
            </div>
    </div>

    <script>
function catFunction(cid)
{
var cat_id=cid;
    //  alert(cat_id);
    var data=new FormData();
data.append('cid',cat_id);
$.ajax({
    method:'post',
    url:"<?php echo site_url("Custctrl/f_select"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result)
    {
        // alert(result);
    var r=JSON.parse(result);
    // alert(r[1]);

    $('#f_type').html("");

    for(i=0;i<r.length;i++)
        {
            $('#f_type').append('<form action="<?php echo site_url('Custctrl/show_furniture') ?>" method="post"> <input type="hidden" name="tid" value="'+r[i].type_id+'" > <input type="hidden" name="cid" value="'+r[i].category_id+'" > <div class="catagories-menu"> <ul> <li><input type="submit" class="amado-nav" name="type" value="'+r[i].t_name+'" ></li></ul></div>');
        }
    // alert(r[0]);
    
    }

});


}
</script>
    <div class="shop_sidebar_area">
        <div name="f_type" id="f_type" class="widget catagory mb-50">
            
        </div>
    </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

               

                

                
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <?php
include('cust_footer.php');
}else{
    $CI->login();
}
?>
   