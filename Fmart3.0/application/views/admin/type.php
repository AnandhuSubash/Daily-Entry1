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
                            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">
											Small
										</button>
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
                                                <form action='<?php echo site_url("Adminctrl/del_type");?>' method='post'>
                                                <?php

                                                $id=$row->type_id;
                                                echo "<tr>";
                                                echo "<td>".$row->t_name."</td>";
                                            

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
                                    <form action='<?php echo site_url("Adminctrl/add_cat");?>' method='post'>

                                    <input  type="text" name="category" placeholder="Enter category" required>
                                    <input type='submit' class=' btn btn-success btn-sm' name='add_cat' value='Add'></td>
                                                
                                    </form>
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
						<div class="modal-body">
							<p>
								There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
								zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
								resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
								genus Equus, along with other living equids.
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary">Confirm</button>
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