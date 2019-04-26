<?php
include('admin_header.php');
$CI =&get_instance();
$a=$CI->sessionin();
$b=$CI->approve_count();
if($a==1)
{

?>

    <!-- MAIN CONTENT-->
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                            <?php 
                            if($b>0)
                            {
                            ?>
                            <h3 class="title-5 m-b-35">Approval</h3>

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                    <thead>
                                            <tr>
                                                <th>Fname</th>
                                                <th>Lname</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th></th>
                                                <th>Approve</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            foreach($list as $row)
                                            {
                                                $log_id=$row->log_id;
                                                $approval=$row->approval;
                                                $fname=$row->fname;
                                                $lname=$row->lname;
                                                $mobile=$row->mobile;
                                                $email=$row->email;
                                                ?>
                                                <form action='<?php echo site_url("Adminctrl/approve");?>' method='post'>
                                                <?php
                                                if($approval==2)
                                                {
                                                echo "<tr>";
                                                echo "<td>".$fname."</td>";
                                                echo "<td>".$lname."</td>";
                                                echo "<td>".$mobile."</td>";
                                                echo "<td>".$email."</td>";
                                                echo "<td><input type='hidden' name='logid' value='$log_id'></td>";

                                                echo "<td><input type='submit' class='role member' name='submit' value='Approve'></td>  ";
                                                //  echo "<td><a href='approve?id=".$row->log_id."'>Approve</a></td>";
                                                echo "</tr>";
                                                }
                                                ?>
                                                </form>
                                                <?php
                                              
                                            }
                                            ?>    
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <?php 
                            }
                            else
                            {
                                ?>
                                <h3 class="title-5 m-b-35">No Approval</h3>
                                <?php 
                            }
                            ?>
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