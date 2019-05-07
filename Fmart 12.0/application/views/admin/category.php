<?php
include('admin_header.php');
$CI =&get_instance();
$a=$CI->sessionin();
if($a==1)
{

?>


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row m-t-30">
                            <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Categories</h3>

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                    <thead>
                                            <!-- <tr>
                                                <th>Category</th>
                                                                                 
                                            </tr> -->
                                        </thead>
                                        <tbody>

                                        <?php 
                                            foreach($data as $row)

                                            {
                                                ?>
                                                <form action='<?php echo site_url("Adminctrl/del_cat");?>' method='post'>
                                                <?php

                                                $id=$row->category_id;
                                                echo "<tr>";
                                                echo "<td>".$row->c_name."</td>";
                                            

                                                echo "<td><input type='hidden' name='logid' value='$id'></td>";
                                                echo "<td><input type='submit' class=' btn btn-danger btn-sm' name='delete' value='Delete'></td>  ";
                                                
                                                echo "</tr>";
                                                ?>
                                                <?php
                                               echo "</form>";
                                               
                                            }
                                        ?>
                                       

                                        </tbody>
                                        
                                    </table>
                                    <br><br>
                                    <form action='<?php echo site_url("Adminctrl/add_cat");?>' method='post'>
                                    <label class="errortext" style="display:none; color:red" id="cat_1"></label><br>

                                    <input  type="text" name="category" id="category" placeholder="Enter category" onkeyup="capitalizel(this.id, this.value);" onchange="Category();" autocomplete="off" required>
                                    <input type='submit' class=' btn btn-success btn-sm' name='add_cat' value='Add'></td>

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
                                        function Category()
                                        {
                                            var val = document.getElementById('category').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#cat_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('category').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>

                                    </form>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

<?php
include('admin_footer.php');
}else{
    $CI->login();
}
?>