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
                            <h3 class="title-5 m-b-35">Furniture Type</h3>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                    <thead>
                                            <tr>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th></th>
                                            <th></th>
                                                                                 
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            foreach($type as $row)

                                            {
                                                ?>
                                                <form action='<?php echo site_url("Adminctrl/del_type");?>' method='post'>
                                                <?php

                                                $id=$row->type_id;
                                                echo "<tr>";
                                                echo "<td>".$row->t_name."</td>";
                                                echo "<td>".$row->c_name."</td>";

                                            

                                                echo "<td><input type='hidden' name='typeid' value='$id'></td>";
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
                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">Add Type</button>

                                   
                                   
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

                        <!-- modal body -->
						<div class="modal-body">
                       
                            <form action='<?php echo site_url("Adminctrl/add_type");?>' method='post'>
                            
                            
                            <select name="category" required>
                            <option value="">Select Category</option>
                            <?php
                        foreach($category as $val)
                            {?>
                            <option val="<?php echo $val->category_id; ?>" > <?php echo $val->c_name; ?></option>
                            <?php
                                
                            }
                            ?>
                            </select>

                           
                            <br><br><br>
                            <label class="errortext" style="display:none; color:red" id="type_1"></label><br>

                            <input  type="text" name="type" id="type" placeholder="Enter Type" onkeyup="capitalizel(this.id, this.value);" onchange="Type();" autocomplete="off" required>
                            <br><br><br>

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
                                        function Type()
                                        {
                                            var val = document.getElementById('type').value;
                                            // alert(val);
                                            if (!val.match(/^[A-Z][A-Za-z" "]{2,}$/))
                                            {
                                                $("#type_1").html('Min. 3 and Only Alphabets Allowed..!').fadeIn().delay(4000).fadeOut();
                                                document.getElementById('type').value="";
                                                return false;
                                            }
                                            return true;
                                        }
                                        </script>
                            <input type='submit' class=' btn btn-success btn-sm' name='add_type' value='Add'></td>
                                        
                            </form>
                            
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<!-- <button type="button" class="btn btn-primary">Add</button> -->
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