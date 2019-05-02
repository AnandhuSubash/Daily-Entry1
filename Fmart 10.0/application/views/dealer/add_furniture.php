<?php

$CI =&get_instance();
$a=$CI->sessionin();
// $did=$CI->deal_id();
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
                        <div class="card-header">Add new furniture</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add</h3>
                                </div>
                                <hr>

                                <form action='<?php echo site_url("Dealerctrl/add"); ?>' method='post' onsubmit='return' enctype='multipart/form-data' >

                                    <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="name" class=" form-control-label">Name</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="name" name="name" placeholder="Product name" onkeyup="capitalize(this.id, this.value);"  onchange="Pname();" required autocomplete="off" class="form-control">
                                                        <label class="errortext" style="display:none; color:red" id="p_name1"></label><br>
                                                    </div>
                                        

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
                                        function Pname()
                                        {
                                            var val = document.getElementById('name').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#p_name1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('name').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                                    </div>
                                    
                                        <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="select" class=" form-control-label">Category</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="category" id="category1" required onchange="sel_type()" class="form-control" >
                                                                <option value="0">Please select</option>
                                                                <?php
                                                                foreach($category as $val)
                                                                {?>
                                                                <option value="<?php echo $val->category_id; ?>" > <?php echo $val->c_name; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                        </div>
                                    <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="type" class=" form-control-label">Type</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="type" id="type" required class="form-control" >
                                                            <option value="0">Please select</option>
                                                            
                                                        </select>
                                                    </div>
                                    </div>
                                    <script>

                            function sel_type()
                            {
                                var category=document.getElementById('category1').value;
                                // alert(category);
                                var data=new FormData();
                                data.append('category',category);
                                    $.ajax({
                                    method:'post',
                                    url:"<?php echo site_url("Dealerctrl/sel_type"); ?>",
                                    processData: false,
                                    contentType: false,
                                    data: data,
                                    success:function(result){
                                        // alert(result);
                                            var r=JSON.parse(result);
                                            // alert(r[0].type_id);
                                            $('#type').html("<option value=0>"+"Select Type"+"</option>");

                                            for(i=0;i<r.length;i++){
                                                $('#type').append("<option value="+r[i].id+">"+r[i].name+"</option>");
                                            }
                                                //$('#district').append("<option value="+result+">"+result+"</option>");
                                                //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
                                                }
                                });
                            }
                            
                            </script>
                                    <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="material" class=" form-control-label">Material</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="material" id="material" class="form-control" >
                                                        <?php
                                                            foreach($material as $val)
                                                            {?>
                                                            <option value="<?php echo $val->material_id; ?>" > <?php echo $val->material; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="height" class=" form-control-label">Height</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="height" name="height" placeholder="in centimeter" min="1" required class="form-control">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="width" class=" form-control-label">Width</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="width" name="width" placeholder="in centimeter" min="1" required class="form-control">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="depth" class=" form-control-label">Depth</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="depth" name="depth" placeholder="in centimeter" min="1" required class="form-control">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="weight" class=" form-control-label">Weight</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="weight" name="weight" placeholder="in kilogram" min="1" required class="form-control">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="price" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="price" name="price" placeholder="price per piece in Rupees" min="1" required class="form-control">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="quantity" class=" form-control-label">Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" class="qty-text" id="quantity" step="1" min="1" max="100" name="quantity" value="1">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="description" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description" id="description" rows="9" placeholder="Description..." class="form-control"></textarea>
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="image" class=" form-control-label">Pictures</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" name="image1" id="image1" accept=".png, .jpg, .jpeg,.JPG" class="form-control-file" required onchange="ValidateFileUpload();">
                                                    <label class="errortext" style="display:none; color:red" id="pic_1"></label><br>
                                                </div>

                           <script>
                            function ValidateFileUpload() {
                                var fuData = document.getElementById('image1');
                                var FileUploadPath = fuData.value;
                        
                        //To check if user upload any file
                                if (FileUploadPath == '') {
                                    $("#pic_1").html('Select An Image..!').fadeIn().delay(4000).fadeOut();
                        
                                } else {
                                    var Extension = FileUploadPath.substring(
                                            FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
                        
                        //The file uploaded is an image
                        
                        if (Extension == "png" || Extension == "JPG" || Extension == "jpeg" || Extension == "jpg") {
                                            }
                        
                        
                        //The file upload is NOT an image
                        else {
                            $("#pic_1").html('Photo only allows file types of PNG, JPG, JPEG...!').fadeIn().delay(4000).fadeOut();
                            document.getElementById('image1').value = "";
                        
                                }
                                }
                            }
                        </script>


                                    </div>
                                    <input type="hidden" name="lid" value="<?php $a=$this->session->userdata('id'); echo $a; ?>">

                                    <div>
                                         <input type="submit" name="add" value="Add" class="btn btn-lg btn-info btn-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>     
        </div>         
</div>

        

<?php
include('dealer_footer.php');
}
else{
    $CI->login();
}
?>